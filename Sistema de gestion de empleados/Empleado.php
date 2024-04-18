<?php
class Empleado{
    public $name;
    public $lastName;
    public $salary;
    public $businessPostion;


    public function __construct($name, $lastName, $salary, $businessPostion) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->salary = $salary;
        $this->businessPostion = $businessPostion;
        
    }

    public function viewEmployees(){
        echo "Nombre: {$this->name} Apellido: {$this->lastName} Salario: {$this->salary} Cargo: {$this->businessPostion}\n";
       
    }
}
?>