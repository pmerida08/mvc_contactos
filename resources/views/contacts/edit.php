<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contacto</title>
</head>

<body>

    <h1>Actualizar Contacto</h1>

    <form action="/contacts/<?= $contact['id'] ?>" method="post">
        <label for="name">Nombre</label>
        <input value=<?= $contact['name'] ?> type="text" name="name" id="name">
        <br>
        <label for="email">Email</label>
        <input value=<?= $contact['email'] ?> type="email" name="email" id="email">
        <br>
        <label for="phone">Teléfono</label>
        <input value=<?= $contact['phone'] ?> type="text" name="phone" id="phone">
        <br>
        <button type="submit">Actualizar contacto</button>
    </form>

    <a href="/contacts">Volver al listado de contactos</a>
</body>

</html>