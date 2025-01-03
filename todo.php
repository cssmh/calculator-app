<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern To-Do List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f4f4f9;
        }
        .todo-container {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px 30px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .todo-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .todo-container form {
            display: grid;
            gap: 15px;
        }
        .todo-container input,
        .todo-container button {
            padding: 10px 15px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .todo-container button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }
        .todo-container button:hover {
            background: #0056b3;
        }
        .todo-list {
            margin-top: 20px;
            list-style: none;
            padding: 0;
        }
        .todo-list li {
            background: #f4f4f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .todo-list li span {
            font-size: 1rem;
            color: #333;
        }
        .todo-list li button {
            background: red;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .todo-list li button:hover {
            background: darkred;
        }
    </style>
</head>
<body>
    <div class="todo-container">
        <h2>To-Do List</h2>
        <form method="POST">
            <input type="text" name="task" placeholder="Add a new task" required>
            <button type="submit">Add Task</button>
        </form>

        <ul class="todo-list">
            <?php
            session_start();
            if (!isset($_SESSION['tasks'])) {
                $_SESSION['tasks'] = [];
            }

            // Add task
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['task'])) {
                $task = htmlspecialchars($_POST['task']);
                $_SESSION['tasks'][] = $task;
            }

            // Remove task
            if (isset($_GET['remove'])) {
                $index = intval($_GET['remove']);
                unset($_SESSION['tasks'][$index]);
                $_SESSION['tasks'] = array_values($_SESSION['tasks']); // Reindex array
            }

            // Display tasks
            foreach ($_SESSION['tasks'] as $index => $task) {
                echo "<li><span>$task</span><a href='?remove=$index'><button>Delete</button></a></li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
