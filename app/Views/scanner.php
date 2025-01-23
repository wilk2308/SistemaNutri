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
            max-width: 300px;
            height: 160px;
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

    <div id="scanner-container"></div>
    <p id="feedback"></p>
    <div id="check-container">
        <button id="mark-as-checked" class="btn btn-success">Marcar como Checado</button>
    </div>
    <a href="/inventario" class="btn-custom">Cadastrar Novo Patrimônio</a>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector("#scanner-container"),
                constraints: {
                    width: 320,
                    height: 240,
                    facingMode: "environment"
                }
            },
            decoder: {
                readers: ["code_128_reader"]
            },
            locate: true,
            locator: {
                patchSize: "x-large",
                halfSample: false
            },
            frequency: 5,
            numOfWorkers: navigator.hardwareConcurrency ? Math.min(navigator.hardwareConcurrency, 4) : 2
        }, function (err) {
            if (err) {
                console.error(err);
                document.querySelector("#feedback").innerText = "Erro ao inicializar o scanner.";
                return;
            }
            Quagga.start();
        });

        Quagga.onProcessed((result) => {
            const canvas = Quagga.canvas.dom.overlay;
            const ctx = Quagga.canvas.ctx.overlay;
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            if (result && result.boxes) {
                result.boxes.forEach(box => {
                    Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, ctx, {
                        color: "green",
                        lineWidth: 2
                    });
                });
            }
        });

        Quagga.onDetected((data) => {
            const codigo = data.codeResult.code;
            console.log("Código detectado: ", codigo);

            if (codigo) {
                Quagga.offDetected();
                Quagga.stop();

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
                                </p>`;
                            document.querySelector("#check-container").style.display = "block";
                        } else {
                            document.querySelector("#feedback").innerHTML = `
                                <p class="text-danger">Patrimônio não encontrado: ${codigo}</p>`;
                            document.querySelector("#check-container").style.display = "none";
                        }
                        setTimeout(() => Quagga.start(), 1000);
                    })
                    .catch(err => {
                        console.error(err);
                        document.querySelector("#feedback").innerText = "Erro na validação.";
                        setTimeout(() => Quagga.start(), 1000);
                    });
            }
        });
    });
    </script>
</body>
</html>
