<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Tu ta deslogado

        <?php if (auth()->loggedIn()) : ?>
        Olá, <?php echo auth()->user()->username; ?>

        <a href="/logout">Logout</a>
        
        <?php endif; ?>

    
</body>
</html>