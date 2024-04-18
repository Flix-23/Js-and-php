<?php
include 'Empleado.php';

class Empresa {
    public function __construct() {
        session_start();
        if (!isset($_SESSION['listaEmpleados'])) {
            $_SESSION['listaEmpleados'] = [];
        }
    }

    public function addEmployees($empleado) {
        $_SESSION['listaEmpleados'][] = $empleado;
    }

    public function employeesList() {
        if (!empty($_SESSION['listaEmpleados'])) {
            foreach ($_SESSION['listaEmpleados'] as $empleado) {
                $empleado->viewEmployees();
            }
        } else {
            echo "No hay empleados registrados.\n";
        }
    }

    public function totalSalary() {
        $total_salarios = 0;
        if (!empty($_SESSION['listaEmpleados'])) {
            foreach ($_SESSION['listaEmpleados'] as $empleado) {
                $total_salarios += $empleado->salary;
            }
        }
        echo "\nTotal de salarios pagados por la empresa: $$total_salarios\n";
    }
}
?>
