<?php
include 'Empresa.php';

$empleado1 = new Empleado("Estarlin", "German", 5000, "Dev Front-end");
$empleado2 = new Empleado("Jesus Elias", "Diaz", 6000, "Analista en ciencia de datos");
$empleado3 = new Empleado("Ismel", "Montero", 4500, "Dev Front-end");

$empresa = new Empresa();

$empresa->addEmployees($empleado1);
$empresa->addEmployees($empleado2);
$empresa->addEmployees($empleado3);

echo "Lista de empleados:\n";
$empresa->employeesList();

$empresa->totalSalary();

?>