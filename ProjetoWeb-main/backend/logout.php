<?php
session_start();
session_destroy(); // Destroi todas as variáveis de sessão
header('Location: ../login.html'); // Redireciona para a página de login
exit();
?>
