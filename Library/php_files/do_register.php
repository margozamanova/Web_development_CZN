<?php

require_once __DIR__.'/boot.php';

// ��������, �� ������ �� ��� ������������
$stmt = pdo()->prepare("SELECT * FROM `user_info` WHERE `userID` = :userID");
$stmt->execute(['userID' => $_POST['userID']]);
if ($stmt->rowCount() > 0) {
    flash('��� ��� ������������ ��� ������.');
    header('Location: /'); // ������� �� ����� �����������
    die; // ��������� ���������� �������
}

header('Location: login.php');