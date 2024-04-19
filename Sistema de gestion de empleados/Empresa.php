<?php
session_start();

include 'Empleado.php'; 

class Empresa {
    public function __construct() {
        if (!isset($_SESSION['empresa'])) {
            $_SESSION['empresa'] = $this;
        }
    }

    public function addEmployees($empleado) {
        $_SESSION['empresa']->empleados[] = $empleado;
    }


    public function employeesList() {
        if (!empty($_SESSION['empresa']->empleados)) {
            foreach ($_SESSION['empresa']->empleados as $empleado) {
                if ($empleado instanceof Empleado) {
                    $empleado->viewEmployees();
                }
            }
        } else {
            echo "No hay empleados registrados.\n";
        }
    }

    public function totalSalary() {
        $total_salarios = 0;
        if (!empty($_SESSION['empresa']->empleados)) {
            foreach ($_SESSION['empresa']->empleados as $empleado) {
                if ($empleado instanceof Empleado) {
                    $total_salarios += $empleado->salary;
                }
            }
        }
        echo "\nTotal de salarios pagados por la empresa: $$total_salarios\n";
    }
}

if (!isset($_SESSION['empresa'])) {
    $empresa = new Empresa();
}
?>
