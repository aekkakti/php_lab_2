<?php
require('connected.php');
session_start();
if (isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = $_POST['password'];
    $query  = "SELECT * FROM `infouser` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    if ($rows === 1) {
        $user = mysqli_fetch_assoc($result);
        setcookie('username', $user['username']);
        header('Location: index.php');
    } else {
        echo "<div class='form'>
                  <h1>Неверно указаны логин или пароль</h1><br/>
                  <h2><a href='login.php'>Авторизация</a></h2><br>
                  </div>";
    }
} else {
    ?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Форма авторизации</h1>
        <input type="text"  name="username" placeholder="Логин" required/><br><br>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="submit" value="Авторизоваться" name="submit"/><br><br>
        <h2><a href="index.php">Главная</a></h2><br>
        <h2><a href="registration.php">Регистрация?</a></h2><br>
    </form>
    <?php
}
ob_start();
?>
</body>
</html>
