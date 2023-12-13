<?php
session_start();
    setcookie('userExist','');
    session_destroy();
header('Location: index.php');
?> 