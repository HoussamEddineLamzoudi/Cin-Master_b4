<?php include APPROOT . '/view/includes/header.php'; ?>


<div class="container con_wth mt-5  p-5">



    <form action="<?php echo URLROOT; ?>user/register " method="POST">
        <div class="mb-3">
            <label for="FN" class=" form-label">First Name</label>
            <input type="text" name="firstName" value="<?php echo $data['firstName']; ?>" class="form-control mb-4" id="FN">

            <label for="LN" class="form-label">Last Name</label>
            <input type="text" name="lastName" value="<?php echo $data['lastName'] ?>" class="form-control mb-4" id="LN">

            <label for="UN" class="form-label">User Name</label>
            <input type="text" name="userName" value="<?php echo $data['userName'] ?>" class="form-control mb-4" id="UN">

            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="userEmail" value="<?php echo $data['email'] ?>" class="form-control mb-4" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text invalid-feedback">
                <?php echo $data['email_err'] ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="userPassword" class="form-control mb-4" id="exampleInputPassword1">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </form>

</div>


<?php include  APPROOT . '/view/includes/footer.php'; ?>