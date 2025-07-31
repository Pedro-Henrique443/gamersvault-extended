<?php

session_start();
session_destroy();
header('Location: ../View/login.php');
exit();

?>