<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesLogIn.css">
    <title>Авторизация</title>
</head>
<body>
<form method="post" action="do_register.php" class="ui-form">
    <h3>Введите номер читательского билета и пароль</h3>
    <div class="form-row">
        <label for="userID" class="form-label">№ читательского билета</label>
        <input type="text" class="form-control" id="userID" name="userID" required autocomplete="off">
    </div>
    <div class="form-row">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" required autocomplete="off">
    </div>
    <p><input type="submit" value="Применить" onClick="window.location='index.html'"></p>
</form>

</body>
</html>