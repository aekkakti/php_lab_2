<?php
global $conn;
require_once ('connected.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["loggedIn"] = true) {
    $dateViolation = $_POST["dateViolation"];
    $nameViolation = $_POST["nameViolation"];
    $costViolation = $_POST["costViolation"];

    $sql = "INSERT INTO violations (dateViolation, nameViolation, costViolation) VALUES ('$dateViolation', '$nameViolation', '$costViolation')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        echo "Новая запись успешно добавлена в таблицу.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
} else {
    ?>
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
        <input type="submit" value="Создать нарушение">
    </form>
<?php
}
?>




