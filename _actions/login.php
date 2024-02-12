<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table = new UsersTable(new MySQL);
$email= $_POST['email'];
$password = $_POST['password'];


$user = $table->findByEmailAndPassword($email, $password);
if($user) {
    session_start();
    if($user->suspended) {
        HTTP::redirect("/index.php", "suspended=1");
        }
       
    $_SESSION['user'] = $user;
    HTTP::redirect("/profile.php");

 } else {
    HTTP::redirect("/index.php", "incorrect=login");
}