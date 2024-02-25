<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del contacto</title>
</head>
<body>
    
    
    <h1>Detalle del contacto <?= $contact['id'] ?></h1>
    
    <a href="/contacts">Volver</a>
    <a href="/contacts/<?= $contact['id'] ?>/edit">Editar</a>
    <p><strong>Nombre:</strong> <?= $contact['name'] ?></p>
    <p><strong>Email:</strong> <?= $contact['email'] ?></p>
    <p><strong>Teléfono:</strong> <?= $contact['phone'] ?></p>

    <form action="/contacts/<?= $contact['id'] ?>/delete" method="post">
        <button type="submit">Eliminar</button>
    </form>

</body>
</html>