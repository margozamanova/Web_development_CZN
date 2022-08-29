<?php

require_once __DIR__.'/boot.php';

// Проверим, не занято ли имя пользователя
$stmt = pdo()->prepare("SELECT * FROM `user_info` WHERE `userID` = :userID");
$stmt->execute(['userID' => $_POST['userID']]);
if ($stmt->rowCount() > 0) {
    flash('Это имя пользователя уже занято.');
    header('Location: /'); // Возврат на форму регистрации
    die; // Остановка выполнения скрипта
}

header('Location: login.php');