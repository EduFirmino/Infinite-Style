// ================================================
// INFINITE STYLE - SCRIPT UNIFICADO
// Substitui todos os scripts repetidos nos HTMLs
// ================================================


// ================================================
// 1. MENU HAMBÚRGUER
// ================================================

var menu = document.querySelector('nav ul');

function abrirMenu() {
    menu.classList.toggle('open');
}


// ================================================
// 2. CONTADOR DO CARRINHO
// Atualiza o número na sacola em tempo real
// ================================================

function atualizarContador() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const contador = document.getElementById('contador-carrinho');
    if (contador) {
        const total = carrinho.length;
        contador.textContent = total > 0 ? total : '';
    }
}

// Atualiza o contador assim que a página carrega
atualizarContador();


// ================================================
// 3. SELEÇÃO DE TAMANHO
// Destaca o botão de tamanho selecionado
// ================================================

function selecionarBotao(event) {
    const botoes = event.target.parentElement.querySelectorAll('button');
    botoes.forEach(function(botao) {
        botao.classList.remove('selecionado');
    });
    event.target.classList.add('selecionado');
}


// ================================================
// 4. CONTROLE DE QUANTIDADE
// Botões de + e - na página do produto
// ================================================

function alterarQuantidade(delta) {
    const quantidadeInput = document.getElementById('quantidade');
    let quantidadeAtual = parseInt(quantidadeInput.value);
    quantidadeAtual = Math.max(1, quantidadeAtual + delta);
    quantidadeInput.value = quantidadeAtual;
}


// ================================================
// 5. CARRINHO - FUNÇÕES BASE
// ================================================

// Adiciona um item ao localStorage do carrinho
function adicionarAoCarrinho(item) {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    carrinho.push(item);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    // Atualiza o contador imediatamente após adicionar
    atualizarContador();
}

// Descobre automaticamente nome e preço na página do produto
function pegarDadosProduto(imagem) {
    const nome = document.querySelector('h1').textContent;
    const precoTexto = document.querySelector('.preco').textContent;
    const preco = parseFloat(precoTexto.replace('R$', '').replace(',', '.'));
    return { nome, preco, imagem };
}

// Comprar — adiciona e redireciona para o carrinho
function comprar(imagem) {
    const tamanho = document.querySelector('.tamanho button.selecionado');
    const tamanhoSelecionado = tamanho ? tamanho.textContent : null;
    const quantidade = document.getElementById('quantidade').value;

    if (!tamanhoSelecionado) {
        alert("Por favor, selecione um tamanho.");
        return;
    }

    const dados = pegarDadosProduto(imagem);

    const item = {
        nome: dados.nome,
        tamanho: tamanhoSelecionado,
        quantidade: parseInt(quantidade),
        preco: dados.preco,
        imagem: dados.imagem
    };

    adicionarAoCarrinho(item);
    window.location.href = 'indexcar.html';
}

// Adicionar ao carrinho — adiciona e mostra mensagem de confirmação
function adicionarAoCarrinhoEConfirmar(imagem) {
    const tamanho = document.querySelector('.tamanho button.selecionado');
    const tamanhoSelecionado = tamanho ? tamanho.textContent : null;
    const quantidade = document.getElementById('quantidade').value;

    if (!tamanhoSelecionado) {
        alert("Por favor, selecione um tamanho.");
        return;
    }

    const dados = pegarDadosProduto(imagem);

    const item = {
        nome: dados.nome,
        tamanho: tamanhoSelecionado,
        quantidade: parseInt(quantidade),
        preco: dados.preco,
        imagem: dados.imagem
    };

    adicionarAoCarrinho(item);

    // Mostra mensagem de confirmação por 2 segundos
    const mensagem = document.querySelector('.mensagem');
    if (mensagem) {
        mensagem.style.display = 'block';
        setTimeout(() => {
            mensagem.style.display = 'none';
        }, 2000);
    }
}