<?php

include 'Empresa.php';

if (!isset($_SESSION['empresa'])) {
    $_SESSION['empresa'] = new Empresa();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $salary = $_POST['salary'];
    $businessPostion = $_POST['businessPostion'];

    $empleado = new Empleado($name, $lastName, $salary, $businessPostion);
    $_SESSION['empresa']->addEmployees($empleado);
}

?>
