<?php
$name = $_POST['name'];
$email = $_POST['email'];
$telnum = $_POST['telnum'];
$text = $_POST['text'];


$db_host = "localhost";
$db_user = "root"; 
$db_password = ""; 
$db_base = 'bebra8'; 
$db_table = "otzivi"; 

try {
    // Бд установление соеденения
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    $db->exec("set name utf8");

    $data = array('name' => $name, 'email' => $email, 'telnum' => $telnum, 'text' => $text );
    // Запрос
    $query = $db->prepare("INSERT INTO $db_table (name, email, telnum, text) values (:name, :email, :telnum, :text)");
    // обработка запроса
    $query->execute($data);
    $result = true;
} catch (PDOException $e) {
    // Если есть ошибка
    print "Ошибка!: <br/>";
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>formfaktor</title>
</head>

    <header>
    <form action="index.html">
                <button class="btn1">вернуться</button>
            </form>
    </header>

    <body>
        <section class="form" method="POST">
            <div class="cons-panel" onload="disableSubmit()">
                <label for="name">ФИО:</label>
                <input id="name" name="name">

                <label for="email">Электронная почта:</label>
                <input type="email" id="email" name="email">

                <label for="phonenum">Номер телефона:</label>
                <input type="tel" id="phoenum" name="telnum">

                <label for="appeal">Ваш отзыв:</label>
                <input class="big-input" id="appeal" name="text">
            </div>

            <form action="styles.css">
                <button class="btn">Отправить данные</button>
            </form>
            <label class="check-label" for="check">Согласие на обработку персональных данных</label>
        <input class="check" type="checkbox">
        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer>
        <p>Уваров Владислав Николаевич<br>
        ИС-4-2<br>
        Все права защищены<br>
        Работа была выполнена с целью <br> изучения и освоения материала по ходу курсовой работы<br>"Разработка веб-сайта туристическая компания «Flying Rhinoceros»".©</p>
        </footer>
    </body>
</html>