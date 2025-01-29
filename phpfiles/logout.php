<?php

session_start();
session_destroy();
header("Location: ../my_chata.php");
exit();


?>