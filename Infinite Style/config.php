<?php
$dbHost = 'Localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'contatos-formulario';

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if ($conn->connect_error) 
{
    echo "Erro";
}
else
{
    //echo "Conexão efetuada com sucesso";

}
?>