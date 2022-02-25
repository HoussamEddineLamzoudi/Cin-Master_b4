login view





x

<?php 
require_once '../controller/authentification.controller.php';

if(!isset($_SESSION)){
	session_start();
}
if($_SESSION["username"] ?? false){
	header('location:posts.php');
}
if(isset($_POST['login'])){
	$user= new login();
	$user->login();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../styles/login/main.css">
	<link rel="stylesheet" href="../styles/login/util.css">
</head>
<body>
<?php require_once './inc/nav.php' ?>
<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-40 p-b-30">
				<form class="login100-form validate-form flex-sb flex-w" method="POST">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36">
						<input class="input100" type="text" name="username" required >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div>
							<a href="http://localhost/cine_master/view/sign_up.php" class="txt3">
								Don't have account ?
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>


<!-- <script src="../js/main.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</body>
</html>




login controller 




x
<?php

require_once '../model/authentification.model.php';
    class login{
        public function sign_up() {
        if(isset($_POST['submit'])){
                $data=array(
                    'username' => $_POST['username'],
                    'email'    => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
                );
            }
            $result=user::add_user($data);
        }

        public function login(){
            
            if(isset($_POST['login'])){
                $data['username'] = $_POST['username'];
        
            $result=user::get_user($data);
            if($result->username===$_POST['username'] && password_verify($_POST['password'] ,$result->password)){
                if(!isset($_SESSION)) session_start();
                $_SESSION['username']=$result->username; 
                    header('location:posts.php');
            }
        }
    }}







    login model 





    x



    <?php
    require_once '../database/db_connection.php';
    class user{
        static public function add_user($data){
            $db=Database::connect()->prepare('INSERT INTO users(username , email , password)
                                            VALUES(:username , :email, :password)');
                $db->bindParam( ':username',$data['username']);
                $db->bindParam( ':email',$data['email']);
                $db->bindParam( ':password',$data['password']);

                try{
                    $db->execute();
                    header('location:login.php');
                }catch(PDOException $e){
                    if(str_contains($e->getMessage(),"Duplicate")){
                        echo "an account with this info already exists";
                    }else{
                        die($e->getMessage());
                    }
                }
        }
        static public function get_user($data){
            $username=$data['username'];
            try{
                $db=Database::connect()->prepare('SELECT * FROM users WHERE username = :username');
                $db->execute(array(':username'=>$username));
                return $db->fetch(PDO::FETCH_OBJ);

            }catch(PDOException $e){
                return 'error ' . $e->getMessage();
            };

        }
    }





    navvvv






    x



    <?php
if(!isset($_SESSION)){
    session_start();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/navbar/nav.css">
</head>
<body>
    <nav id="navbar">
        
        <div class="nav_container"> 
            <!-- <a href=""><img src="../images/LOGO.png" alt="cine_master_logo"></a> -->
            <a href="">CINE MASTER</a>
        </div>
        <ul class="nav_links">
                <li class="iteam"><a href="http://localhost/cine_master/view/home.php">Home</a> </li>
                <li class="iteam"><a href="http://localhost/cine_master/view/posts.php">Posts</a> </li>
                <!-- <li class="iteam"><a href=""> Contact</a></li> -->
              
                <?php
                if(isset($_SESSION['username'])) :?>
                    <li class="iteam"><a href="http://localhost/cine_master/view/logout.php">Logout</a></li>
                    <?php   else :?>
                        
                        <li class="iteam"><a href="http://localhost/cine_master/view/login.php">Login</a></li>
                <?php endif ?>
               
        </ul>
        <div class="menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
            
        </div>
    
    </nav>
    <script src="http://localhost/cine_master/js/nav.js"></script>
</body>
</html>