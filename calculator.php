<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern PHP Calculator</title>
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
        .calculator {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px 30px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .calculator h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .calculator form {
            display: grid;
            gap: 15px;
        }
        .calculator input, 
        .calculator select, 
        .calculator button {
            padding: 10px 15px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .calculator button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }
        .calculator button:hover {
            background: #0056b3;
        }
        .result {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Modern PHP Calculator</h2>
        <form method="POST">
            <input type="number" name="num1" placeholder="Enter first number" required>
            <input type="number" name="num2" placeholder="Enter second number" required>
            <select name="operation" required>
                <option value="" disabled selected>Select operation</option>
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (×)</option>
                <option value="divide">Division (÷)</option>
            </select>
            <button type="submit">Calculate</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = '';

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = 'Error: Division by zero';
                    }
                    break;
                default:
                    $result = 'Invalid operation';
            }

            echo "<div class='result'>Result: $result</div>";
        }
        ?>
    </div>
</body>
</html>
