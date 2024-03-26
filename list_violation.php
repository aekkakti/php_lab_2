<h2><a href="index.php">Главная</a></h2>

<?php
global $conn;
require_once ('connected.php');

$sql = "SELECT * FROM violations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Список нарушений:</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<h3><b> Дата и время:</b> </h3> " . $row["dateViolation"];
        echo "<h3><b> Вид нарушения</b> </h3> " . $row["nameViolation"];
        echo "<h3><b> Размер штрафа</b> </h3> " . $row["costViolation"];
        echo "</li> <br>";
    }
    echo "</ul>";
} else {
    echo "Нет данных о нарушениях.";
} ?>