<?php
session_start(session_id());

require("../base_app.php");

$controller = new Controller();

$id 	= $_GET['todo_id'];
$status = $_GET['status'];

$todo_model   = $controller->loadModel('Todo_model');
$todo_model->updateTodo($id, $status);



?>