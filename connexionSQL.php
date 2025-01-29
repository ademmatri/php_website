<?php
$connexion = mysqli_connect('localhost', 'root', 'mouhamedadem2004', 'members_space');
if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
}

?>