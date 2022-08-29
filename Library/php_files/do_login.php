<?php

require_once __DIR__.'/boot.php';

// проверяем наличие пользователя с указанным юзернеймом
$stmt = pdo()->prepare("SELECT * FROM `user_info` WHERE `userID` = :userID");
$stmt->execute(['userID' => $_POST['userID']]);
if (!$stmt->rowCount()) {
    flash('Пользователь с такими данными не зарегистрирован');
    header('Location: login.php');
    die;
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// проверяем пароль
if (password_verify($_POST['password'], $user['password'])) {
    // Проверяем, не нужно ли использовать более новый алгоритм
    // или другую алгоритмическую стоимость
    // Например, если вы поменяете опции хеширования
    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = pdo()->prepare('UPDATE `user_info` SET `password` = :password WHERE `userID` = :userID');
        $stmt->execute([
            'username' => $_POST['userID'],
            'password' => $newHash,
        ]);
    }
    $_SESSION['user_id'] = $user['id'];
    header('Location: /');
    die;
}

flash('Пароль неверен');
header('Location: login.php');