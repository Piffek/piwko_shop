<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Aktywacja  rejestracji</title>
</head>
<body>
    <h1>Dziękujemy za rejestracje</h1>

    <p>
        Witamy w sklepie <a href='{{ url("register/confirm/{$user->token}") }}'>Potwierdź swoją rejestrację</a>
    </p>
</body>
</html>