<?php
error_reporting(0);
require "connexionSQL.php";
$Email=mysqli_real_escape_string($connexion,$_POST["Email"]);
$res=mysqli_query($connexion,"select * from users_infos where email='$Email'");
$count = mysqli_num_rows($res);
if($count<1){
    echo "Inexistant E-mail";

}
else{
    echo "submit";
}



?>