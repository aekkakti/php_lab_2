<h2><a href="index.php">Главная</a></h2>

<?php
global $conn;
require_once ('connected.php');

$sql = "SELECT * FROM violations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Список нарушений:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<p><b> Дата и время:</b> </p> " . $row["dateViolation"];
        echo "<p><b> Вид нарушения</b> </p> " . $row["nameViolation"];
        echo "<p><b> Размер штрафа</b> </p> " . $row["costViolation"];
        echo "</li> <br>";
    }
    echo "</ul>";
} else {
    echo "Нет данных о нарушениях.";
} ?>