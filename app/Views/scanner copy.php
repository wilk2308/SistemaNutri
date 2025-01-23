<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Patrimônios</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            font-size: 1.8rem;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        #scanner-container {
            width: 100%;
            max-width: 300px; /* Largura máxima */
            height: 160px; /* Altura fixa */
            border-radius: 8px;
            border: 1px solid #ccc;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background: #fff;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        #feedback {
            font-size: 1rem;
            font-weight: bold;
            line-height: 1.4;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .btn-custom {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            font-size: 1rem;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        #check-container {
            margin-top: 20px;
            display: none;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.5rem;
            }

            #scanner-container {
                height: 140px;
            }

            .btn-custom {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <h1>Validação de Patrimônios</h1>

    <!-- Tela do scanner -->
    <div id="scanner-container"></div>

    <!-- Feedback do código escaneado -->
    <p id="feedback"></p>

    <!-- Botão para marcar patrimônio como checado -->
    <div id="check-container">
        <button id="mark-as-checked" class="btn btn-success">Marcar como Checado</button>
    </div>

    <!-- Botão para cadastro de patrimônio -->
    <a href="/inventario" class="btn-custom">Cadastrar Novo Patrimônio</a>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // Inicialização do Quagga com ajustes para melhorar desempenho
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector("#scanner-container"),
                constraints: {
                    width: 640,
                    height: 360,
                    facingMode: "environment" // Usa a câmera traseira
                }
            },
           decoder: {
    readers: [
        "ean_reader",      // Leituras para códigos numéricos
        "ean_8_reader",    // Alternativa para códigos menores
        "code_128_reader", // Manter caso outros formatos sejam usados
        "code_39_reader"
    ]
},

            locate: true,
            locator: {
                patchSize: "large", // Aumenta a área de detecção para melhorar a precisão
                halfSample: true    // Reduz a resolução do frame para acelerar a detecção
            },
            frequency: 10,         // Limita a frequência de detecção para reduzir atrasos
            numOfWorkers: 4        // Usa threads paralelos para processar frames
        }, function (err) {
            if (err) {
                console.error(err);
                document.querySelector("#feedback").innerText = "Erro ao inicializar o scanner.";
                return;
            }
            Quagga.start();
        });

        // Ajustar o tamanho do canvas ao tamanho do container
        Quagga.onProcessed(() => {
            const canvas = Quagga.canvas.dom.overlay;
            const container = document.querySelector("#scanner-container");

            canvas.style.width = container.clientWidth + "px";
            canvas.style.height = container.clientHeight + "px";
        });

        // Captura o código detectado
        Quagga.onDetected((data) => {
            const codigo = data.codeResult.code;
            console.log("Código detectado: ", codigo);

            // Evitar múltiplas detecções do mesmo código em sequência
            if (codigo && codigo.length > 0) {
                Quagga.stop(); // Pausa a captura após a primeira detecção bem-sucedida
                fetch(`/validate-patrimonio/${codigo}`)
                    .then(response => response.json())
                    .then(result => {
                        if (result.found) {
                            document.querySelector("#feedback").innerHTML = `
                                <p class="text-success">
                                    Patrimônio encontrado:<br>
                                    <strong>Descrição:</strong> ${result.data.descricao}<br>
                                    <strong>Local:</strong> ${result.data.local}<br>
                                    <strong>Condição:</strong> ${result.data.condicao}<br>
                                    <strong>Responsável:</strong> ${result.data.responsavel}
                                </p>
                            `;

                            const checkContainer = document.querySelector("#check-container");
                            checkContainer.style.display = "block";

                            document.querySelector("#mark-as-checked").onclick = () => {
                                fetch('/assets/update-checked', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({ items: [codigo] })
                                })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data);
                                        alert("Patrimônio marcado como checado!");
                                        checkContainer.style.display = "none";
                                        Quagga.start(); // Reinicia a captura para detectar outro código
                                    })
                                    .catch(err => {
                                        console.error("Erro ao marcar como checado:", err);
                                        alert("Erro ao marcar patrimônio como checado.");
                                        Quagga.start();
                                    });
                            };
                        } else {
                            document.querySelector("#feedback").innerHTML = `
                                <p class="text-danger">Patrimônio não encontrado: ${codigo}</p>
                            `;
                            document.querySelector("#check-container").style.display = "none";
                            Quagga.start(); // Reinicia a captura para tentar novamente
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        document.querySelector("#feedback").innerText = "Erro na validação.";
                        Quagga.start();
                    });
            }
        });
    });
</script>

</body>
</html>
