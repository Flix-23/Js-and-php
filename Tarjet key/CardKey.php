<?php
session_start();

class CardKey {
    public $number;

    public function __construct(int $number) {
        $this->number = $number;
    }

    public function makeCardKey() {
        for ($indice = 1; $indice <= $this->number; $indice++) {
            $content = rand(0, 9999);

            $_SESSION['number'][$indice] = str_pad($content, (4 - strlen($content)), "0");
        }
    }
}

if (!isset($_SESSION['number']) || isset($_POST['submit'])) {
    (new CardKey(40))->makeCardKey();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        .btn {
            background-color: #4CAF50; 
            color: white; 
            padding: 10px 20px; 
            border: 10 auto; 
            cursor: pointer; 
            border-radius: 5px; 
        }

        .btn:hover {
            background-color: #453049;
        }
    </style>
    <title>Card Key</title>
</head>
<body>
    <h2>Lista de Números Generados</h2>
    <table border ="1">
        <?php
        $number = 1;
        foreach (array_chunk($_SESSION['number'], 10) as $key => $values) {
            echo "<tr>";
            foreach ($values as $valuee) {
                echo "<td> {$number} -> {$valuee} </td>";
                $number++;
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Validar Número</h2>
    <form method="post">
        <label for="usernumber">Ingrese un número de 4 dígitos:</label>
        <input type="text" id="usernumber" name="usernumber" maxlength="4" pattern="\d{4}" required>
        <button type="submit" name="validar" class= "btn">Validar</button>
    </form>

    <?php
    if (isset($_POST['validar'])) {
        $userNumber = $_POST['usernumber'];
        if (in_array($userNumber, $_SESSION['number'])) {
            echo "<p>El número es válido</p>";
        } else {
            echo "<p>El número es inválido</p>";
        }
    }
    ?>
</body>
</html>
