<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        img {
            border-radius: 50%;
            margin: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .btn {
            margin: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['user'])) : ?>
            <h1>Welcome <?php echo $_SESSION['user'][1] ?></h1>
            <img src="images/<?php echo $_SESSION['user'][6] ?>" alt="">
            <div>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        <?php else : ?>
            <h1>Please Register If You Haven't An Account</h1>
            <div>
                <a href="login.php" class="btn btn-primary">Login</a>
                <a href="create.php" class="btn btn-secondary">Register</a>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>