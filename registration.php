<?php
require('connected.php');
if (isset($_REQUEST['username'])) {
    $username = $_COOKIE['username'];
    $password = stripslashes($_REQUEST['password']);
    $query    = "INSERT into `infouser` (username, password) VALUES ('$username', '$password')";
    $result   = mysqli_query($conn, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>Вы зарегистрированы</h3><br/>
                  <p class='link'><a href='login.php'>Войти</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Все поля обязательны  для заполнения</h3><br/>
                  <p class='link'>Нажмите сюда, <a href='registration.php'>registration</a> чтобы  зарегистрироваться снова</p>
                  </div>";
    }
} else {
    ?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Форма регистрации</h1>
        <input type="text"  name="username" placeholder="Логин" required/>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="submit" name="submit" value="Зарегистрироваться" class="login-button">
        <h2><a href="index.php">Главная</a></h2><br>
        <h2><a href="login.php">Уже зарегистрированы?</a></h2><br>
    </form>
    <?php
}
ob_start();
?>
</body>
</html>
