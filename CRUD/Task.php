<?php

class Task {
    private $tasksFile = 'tasks.json';
    private $tasks = [];

    public function __construct() {
        if (file_exists($this->tasksFile)) {
            $this->tasks = json_decode(file_get_contents($this->tasksFile), true);
        }
    }

    public function getTasks() {
        return $this->tasks;
    }

    public function addTask($description) {
        $id = uniqid();
        $task = ['id' => $id, 'description' => $description, 'completed' => false, 'editing' => false];
        $this->tasks[] = $task;
        $this->saveTasks();
    }

    public function editTask($id, $description) {
        foreach ($this->tasks as &$task) {
            if ($task['id'] == $id) {
                $task['description'] = $description;
                $task['editing'] = false;
                break;
            }
        }
        $this->saveTasks();
    }

    public function completeTask($id) {
        foreach ($this->tasks as &$task) {
            if ($task['id'] == $id) {
                $task['completed'] = true;
                break;
            }
        }
        $this->saveTasks();
    }

    public function deleteTask($id) {
        foreach ($this->tasks as $key => $task) {
            if ($task['id'] == $id) {
                unset($this->tasks[$key]);
                break;
            }
        }
        $this->saveTasks();
    }

    private function saveTasks() {
        file_put_contents($this->tasksFile, json_encode($this->tasks));
    }
}

class TaskList extends Task {
    
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    $task = new Task();

    switch ($action) {
        case 'add':
            if (isset($_POST['description'])) {
                $task->addTask($_POST['description']);
            }
            break;
        case 'edit':
            if (isset($_GET['id']) && isset($_POST['description'])) {
                $task->editTask($_GET['id'], $_POST['description']);
            }
            break;
        case 'complete':
            if (isset($_GET['id'])) {
                $task->completeTask($_GET['id']);
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $task->deleteTask($_GET['id']);
            }
            break;
        case 'cancelEdit':
            if (isset($_GET['id'])) {
                foreach ($task->getTasks() as $key => $taskItem) {
                    if ($taskItem['id'] == $_GET['id']) {
                        $task->getTasks()[$key]['editing'] = false;
                        break;
                    }
                }
                $task->saveTasks();
            }
            break;
        default:
            break;
    }

    header('Location: index.php');
    exit;
}

