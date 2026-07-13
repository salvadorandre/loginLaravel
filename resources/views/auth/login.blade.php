<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="/login" method="POST">
        @csrf
        <label>Username/email:</label>
        <input type="text" name="username" placeholder="Username/email">   
        <label>Password:</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</body>
</html>