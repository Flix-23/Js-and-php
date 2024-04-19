<?php 
include 'Main.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleList.css">
    <title>Gestión de Empleados</title>
</head>
<body>
    <h1>Gestión de Empleados</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="lastName">Apellido:</label>
        <input type="text" id="lastName" name="lastName" required><br>
        <label for="salary">Salario:</label>
        <input type="number" id="salary" name="salary" required><br>
        <label for="businessPostion">Cargo:</label>
        <input type="text" id="businessPostion" name="businessPostion" required><br>
        <button type="submit" name="submit">Agregar Empleado</button>
    </form>
    <br>
    <h2>Listado de Empleados</h2>
    <div class="employees-list">
        <?php
        if (isset($_SESSION['empresa'])) {
            $_SESSION['empresa']->employeesList();
        } else {
            echo "No hay empleados registrados.\n";
        }
        ?>
    </div>
</body>
</html>