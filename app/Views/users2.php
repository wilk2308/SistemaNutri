<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Lastname</th>
            <th>E-mail</th>
            <th>Ações</th>
</tr>


    <table>
        
        <?php foreach ($users as $user) : ?>
            <tr>
            
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['nome'] ?></td>
            <td><?php echo $user['username'] ?></td>
            <td><?php echo $user['lastname'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td>Ações</td>
    </tr>
    
        <?php endforeach; ?>
    </table>


</div>
 </div>

    
</body>
</html>