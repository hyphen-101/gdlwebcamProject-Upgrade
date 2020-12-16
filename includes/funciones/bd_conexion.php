<?php
                                //HOST      USER   PASSWRD   DB_NAME       
    $conn_dataBase = new mysqli('localhost','root','root','gdlwebcamp');
    if($conn_dataBase->$connect_error){
        echo $error -> $conn_dataBase->$connect_error;
    }
?>