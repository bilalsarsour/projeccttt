<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>My First PHP Page</h1>
    <br>
    <br>
    <h3>Hello, {{ $name }}</h3>
    <br>
    <br>
    <form action="about" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter your name">
        <input type="submit" value="Send">
    </form>

</body>
</html>
