<?php

include('../vendor/autoload.php');

use Libs\Database\MySQl;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;


$auth = Auth::check();
$table = new UsersTable(new MySQL);
$id = $_GET['id'];

$table->suspend($id);

HTTP::redirect("/admin.php");