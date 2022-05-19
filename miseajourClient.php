<?php
session_start();
require_once "classes/Client.php";

if(isset($_POST['submit']))
{

    
    

    header("location: compte.php");
}
else
    header("location: index.php");