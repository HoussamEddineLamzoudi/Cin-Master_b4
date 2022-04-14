<?php include APPROOT . '/view/includes/header.php'; ?>

<div class="container mt-4  p-4">
    <div class="row">
        <img class="col-6 img_log" src="<?= URLROOT ?>public/img/login_img.jpg" alt="film">
        <div class="con_wth col-6">

            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="userEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">
                        We'll never share your email with anyone else.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="userPassword" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">login</button>
            </form>

        </div>
    </div>
</div>


<?php include  APPROOT . '/view/includes/footer.php'; ?>