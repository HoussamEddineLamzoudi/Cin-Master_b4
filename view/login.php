<?php


if (isset($_POST['submit'])) {
    if(isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['password']) && !empty($_POST['password'])){
        print_r($_POST);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>nav</title>
</head>

<body>
    <?php include_once './nav.php'; ?>

    <div class="container mt-4  p-4">
        <div class="row">
            <img class="col-6 img_log" src="../img/bb617e1cadf60bdddf848aa586ab6391.jpg" alt="film">
            <div class="con_wth col-1">

                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                            We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                    <button type="submit" name="submit" class="btn btn-primary">login</button>
                </form>

            </div>
        </div>
    </div>

    <script src="./js/bootstrap.min.js"></script>
</body>

</html>