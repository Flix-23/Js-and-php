<?php
require_once 'Task.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="agendaStyle.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Tareas</h1>
        
        <form action="task.php?action=add" method="POST">
            <input type="text" name="description" placeholder="Agregar nueva tarea..." required>
            <button type="submit">+</button>
        </form>
        
        <?php
        require_once 'task.php';
        $taskList = new TaskList();
        $tasks = $taskList->getTasks();
        
        if (!empty($tasks)) {
            echo '<ul>';
            foreach ($tasks as $task) {
                echo '<li';
                if ($task['completed']) {
                    echo ' class="completed"';
                }
                echo '>';
                echo '<span>';
                if ($task['editing']) {
                    echo '<form action="task.php?action=edit&id=' . $task['id'] . '" method="POST">';
                    echo '<input type="text" name="description" value="' . $task['description'] . '" required>';
                    echo '<button type="submit">Guardar</button>';
                    echo '</form>';
                } else {
                    echo $task['description'];
                }
                echo '</span>';
                echo '<div class="actions">';
                if ($task['editing']) {
                    echo '<a class="cancel" href="task.php?action=cancelEdit&id=' . $task['id'] . '">Cancelar</a>';
                } else {
                    echo '<a class="edit" href="task.php?action=edit&id=' . $task['id'] . '">Editar</a>';
                    echo '<a class="complete" href="task.php?action=complete&id=' . $task['id'] . '">Completar</a>';
                    echo '<a class="delete" href="task.php?action=delete&id=' . $task['id'] . '">Eliminar</a>';
                }
                echo '</div>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No hay tareas</p>';
        }
        ?>
    </div>
</body>
</html>
