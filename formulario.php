<?php
if(isset($_POST['submit']))
{
    //print_r('Email: ' .  $_POST['email']);
    //print_r('<br>');
    //print_r('Nome: ' .  $_POST['nome']);
    //print_r('<br>');
    //print_r('Endereço: ' .  $_POST['endereço']);
    //print_r('<br>');
    //print_r('Mensagem: ' .  $_POST['mensagem']);

    include_once ('config.php');

    $email= $_POST['email'];
    $nome= $_POST['nome'];
    $endereço= $_POST['endereço'];
    $mensagem= $_POST['mensagem'];

    $result= mysqli_query($conn, "INSERT INTO usuarios(email, nome, endereço, mensagem) 
    VALUES ('$email', '$nome', '$endereço', '$mensagem') ");

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    <link rel="stylesheet" href="stylecontato.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url("img/Fundo\ bom.jpg"); /* Substitua pelo caminho da sua imagem */
    background-size: cover; /* Faz a imagem cobrir toda a tela */
    background-position: center; /* Centraliza a imagem */
    background-attachment: fixed; /* Mantém a imagem fixa durante o scroll */
    background-color: #000000;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    display: flex;
    justify-content: space-between;
    max-width: 1000px;
    width: 100%;
    padding: 20px;
}


.form-section, .contact-info {
    background-color: rgba(0, 0, 0, 0.7);
    padding: 20px;
    border-radius: 10px;
}

.form-section {
    flex: 1;
    margin-right: 290px;
}

.form-section form {
    display: flex;
    flex-direction: column;
}

.form-section label {
    margin-top: 10px;
}

.form-section input, .form-section textarea {
    margin-top: 10px;
    padding: 20px;
    border: none;
    border-radius: 5px;
    background-color: #333;
    color: #fff;
}

.form-section button {
    margin-top: 15px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: rgb(22, 63, 22);
    color: #fff;
    cursor: pointer;
}

.contact-info {
    flex: 1;
    margin-left: 20px;
}

.contact-info h2 {
    margin-bottom: 10px;
    white-space: nowrap;
}

.contact-info p {
    color: rgb(72, 141, 83);

    margin-bottom: 20px;
}

.contact-info a {
    color: rgb(56, 128, 67);
    text-decoration: none;
}

footer {
    text-align: center;
    padding: 1rem;
    background-color: #000000;
    color: #fff;
    position: fixed;
    width: 100%;
    bottom: 0;
}

.customize-section {
    padding: 2rem;
    max-width: 600px;
    margin: 0 auto;
}

form label {
    display: block;
    margin-bottom: 0.5rem;
}

form select,
form input[type="file"] {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
}

/ESTILIZAÇÃO MENU/
nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    justify-content: space-between;
    background-color: #000000;
    align-items: center;
    display: flex;
    padding: 13px 5%;
    height: 75px;

}

ul {
    list-style: none;
    line-height: 0;
}

nav .logo {
    padding-top: 10px;
    width: 150px;
}

nav .logo img {
    width: 105%;
}

nav ul li {
    display: inline-block;
    padding: 20px;
}

nav ul li a {
    color: rgb(255, 255, 255);
    text-decoration: none;
    transition: 0.5s;
    font-size: 25px;
}

nav ul li a:hover {
    color: #54a062d7;
}

.menu-icon {
    display: none;
    cursor: pointer;
}

.menu-icon img {
    filter: invert(1);
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 1.2rem;
}

@media (max-width:770px) {

    .container{
        flex-direction: column;
    }

    .container .form-section {
        margin-right: 0;
        margin-bottom: 20px; 
        margin-top: 380px;
    }
    
    .container .contact-info {
        margin-left: 0;
    }

    /* MENU */
    .menu-icon{
        display: block;
        z-index: 10;
    }

    nav ul{
        position: fixed;
        top: 0;
        right: 0;
        width: 60%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        transform: translateX(100%);
        transition: transform 0.6s ease-in;
        background-color: #00000074;
    }
    nav ul.open{
        transform: translateX(0);
    }
    nav ul li{
        margin: 10px 0;
    }
    nav ul li a{
        font-size: 1.6rem;
    }

}
</style>
</head>
<body>
    <main>
        <nav>
            <div class="logo">
                <a href="index.html">
                    <img src="img/Logo.png" alt="Logo">
                </a>
            </div>
            <div class="menu-icon" onclick="abrirMenu()">
                <img src="img/menu.png" alt="Ícone do menu">
            </div>

            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="indexperso.html">Personalizar</a></li>
                <li><a href="indexsobre.html">Sobre</a></li>
                <li><a href="indxexcontato.html">Contato</a></li>
            </ul>
        </nav>
        <script>
            var menu = document.querySelector('nav ul');
            function abrirMenu() {
                menu.classList.toggle('open');
            }
        </script>
    </main>

    <div class="container">
        <div class="form-section">
            <form action="formulario.php" method="POST">
                <h2>Entre ou cadastre-se</h2>
                <label for="email">Email</label>
                <input type="email" name= "email" id="email" placeholder="Digite seu email" required>

                <label for="name">Nome</label>
                <input type="text" name= "nome" id="name" placeholder="Digite seu nome" required>

                <label for="address">Endereço</label>
                <input type="text" name="endereço" id="address" placeholder="Digite seu endereço">

                <label for="message">Mensagem</label>
                <textarea id="message" name="mensagem" placeholder="Digite sua mensagem" required></textarea>

                <button type="submit" imput type="submit" id= "submit" name="submit">Enviar</button>
                        </form>
        </div>

        <div class="contact-info">
            <h2><i class="fas fa-phone-alt"></i> NÚMERO DE TELEFONE</h2>
            <p>(21) 96780-9720</p>
        <div class="contato-info">
            <h2><i class="fab fa-instagram"></i> INSTAGRAM</h2>
            <p>@infinite_style_oficial</p>
            <h2><i class="fas fa-envelope"></i> E-MAIL</h2>
            <p><a href="mailto:hello@theme.com">style.infinite@gmail.com</a></p>
        </div>
    </div>
    <footer>
        
    </footer>
</body>
</html>