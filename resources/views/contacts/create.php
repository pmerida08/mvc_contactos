<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear contacto</title>
</head>

<body>

    <h1>Crear Contacto</h1>

    <form action="/contacts" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="phone">Teléfono</label>
        <input type="text" name="phone" id="phone">
        <br>
        <button type="submit">Crear contacto</button>
    </form>
</body>

</html>