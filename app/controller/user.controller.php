<?php



class user extends controller
{

    public function __construct()
    {
        $this->userModel = $this->model('users');
    }

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'userName' => $_POST['userName'],
                'email' => $_POST['userEmail'],
                'psw' => $_POST['userPassword'],
                'email_err' => ''
            ];

            // print_r($data);

            //check if email exist

            if ($this->userModel->getUserByEmail($data['email'])) {
                $data['email_err'] = 'Cette adresse e-mail est deja utilisée par un autre utilisateur.';
            }

            if (!empty($data['email_err'])) {
                //regester faild
                $this->view("users/register", $data);
            } else {
                //regester success
                $data['psw'] = password_hash($data['psw'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data['firstName'], $data['lastName'], $data['userName'], $data['email'], $data['psw'])) {
                    //user added
                    redirect('user/login');
                    // print_r($data);

                } else {
                    // not added
                    die("not added");
                }
            }
        } else {

            $data = [
                'firstName' => '',
                'lastName' => '',
                'userName' => '',
                'email' => '',
                'psw' => '',
                'email_err' => ''
            ];

            //load regester
            $this->view("users/register", $data);
        }
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            
            $data = [

                'email' => $_POST['userEmail'],
                'psw' => $_POST['userPassword'],
                'email_err' => '',
                'psw_err' => ''
            ];

            // print_r($data);

            //check if email exist

            if (!$this->userModel->getUserByEmail($data['email'])) {
                $data['email_err'] = " L'adresse email est introuvable ";
                
            }

            

            if (empty($data['email_err']) && empty($data['psw_err'])) {
                // echo "dazt";
                $user = $this->userModel->login($data['email'], $data['psw']);
                // print_r($data);
                if ($user) {
                    
                    //set session
                    session_start();
                    $_SESSION['user_id'] = $user->userId;
                    $_SESSION['user_name'] = $user->userName;
                    redirect('post/index');
        
                    //  redirect('user/login');
                } else {

                    // echo "jawad";

                    $data['password_err'] = 'Mot de passe incorrect';
                    $this->view('users/login', $data); //*****  
                }
            } else {

                $this->view("users/login", $data);
            }
        } else {

            $data = [

                'email' => '',
                'psw' => '',
                'email_err' => '',
                'psw_err' => ''
            ];

            //load regester
            $this->view("users/login", $data);
        }
    }

    public function logout(){

        $_SESSION['user_id'] = null;
        $_SESSION['user_name'] = null;
        redirect('user/login');
    }
}
