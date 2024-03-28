<?php
global $conn;
require_once ('connected.php');

if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $query = "SELECT user_id FROM `infouser` WHERE username = '$username'";
    $res = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($res);
    $userId = $user['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && $_POST['submit'] === 'Создать нарушение') {
        $dateViolation = $_POST["dateViolation"];
        $nameViolation = $_POST["nameViolation"];
        $costViolation = $_POST["costViolation"];

        $query = "INSERT INTO `violations` (user_id, dateViolation, nameViolation, costViolation) VALUES ('$userId', '$dateViolation', '$nameViolation', '$costViolation')";

        $res = mysqli_query($conn, $query);

        if ($res) {
            $violationId = mysqli_insert_id($conn);
            $query = "INSERT INTO `user_violation_id` (user_id, violation_id) VALUES ('$userId', '$violationId')";
            $userViolation = mysqli_query($conn, $query);

            if ($userViolation) {
                echo "<h2> Нарушение создано</h2>";
            }
            else {
                echo "<h2>Ошибка при создании нарушения: " . mysqli_error($conn) . "</h2>";
            }

            }
            else {
                echo "<h2>Ошибка при создании нарушения: " . mysqli_error($conn) . "</h2>";
            }
        }

    }
    else {
        echo "<h1>Вы не авторизировались</h1>";
        echo "<h2><a href='login.php'>Авторизация</a></h2><br>";
        exit;
    }
    ?>
     <h2><a href="index.php">Главная</a></h2><br>
        <h1>Форма создания нарушения</h1>
        <form method="POST" name="violations">
            <p>Дата и время нарушения: </p>
            <input type="datetime-local" name="dateViolation" required><br>
            <p>Выберите вид нарушения: </p>
            <select name="nameViolation" required>
                <option value="Нарушение скоростного режима">Нарушение скоростного режима</option>
                <option value="Вождение в нетрезвом состоянии">Вождение в нетрезвом состоянии</option>
                <option value="Проезд на запрещающий сигнал светофора">Проезд на запрещающий сигнал светофора</option>
            </select> <br>
            <p>Размер штрафа(минимальный - 500):</p>
            <input type="number" name="costViolation" min="500" required><br><br>
            <input type="submit" name="submit" value="Создать нарушение">
        </form>
