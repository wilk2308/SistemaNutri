// Buscar dados das metas do servidor
fetch('/api/metas')
    .then(response => response.json())
    .then(data => {
        // Atualizar os dados na interface
        console.log('Metas carregadas:', data);
        const metasContainer = document.getElementById('metas-container');
        
        // Renderizar metas na página
        data.forEach((meta, index) => {
            const metaElement = document.createElement('div');
            metaElement.innerHTML = `
                <h3>${meta.titulo}</h3>
                <p>Meta: ${meta.meta}</p>
                <p>Atual: <span id="meta-atual-${index}">${meta.atual}</span></p>
                <button onclick="incrementarMeta(${meta.id}, ${index})">Incrementar</button>
            `;
            metasContainer.appendChild(metaElement);
        });
    });

// Atualizar os dados no servidor
function atualizarMeta(id, novoValor) {
    fetch('/api/metas/' + id, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ atual: novoValor })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Meta atualizada:', data);
    });
}

// Função para incrementar o valor da meta
function incrementarMeta(id, index) {
    const atualElement = document.getElementById(`meta-atual-${index}`);
    const novoValor = parseInt(atualElement.textContent) + 1;

    atualizarMeta(id, novoValor);
    atualElement.textContent = novoValor; // Atualiza a interface
}
