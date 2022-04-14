<?php

class post extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('posts');
    }



    public function index()
    {

        //get all posts
        $posts = $this->postModel->getPosts();

        if ($posts) {

            $data = [

                'posts' => $posts
            ];


            $this->view("posts/index", $data);
        } else {
            $this->view("posts/index");
        }
    }


    public function add()
    {

        if (isset($_SESSION['user_id'])) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                $data = [

                    'title' => $_POST['title'],
                    'body' => $_POST['body'],
                    'img' => $_POST['file'],
                    'user_id' => $_SESSION['user_id']
                ];


                if ($this->postModel->addPost($data)) {

                    redirect("post/index");
                } else {
                    die("add_err");
                }
            } else {

                $data = [

                    'title' => '',
                    'body' => '',
                ];


                $this->view("posts/add", $data);
            }
        } else {
            redirect("user/login");
        }
    }
    // public function addPost()
    // {
    //     echo "hello";
    // }

    public function edit($id)
    {
        $post = $this->postModel->getPost_byId($id);

        if ($_SESSION['user_id'] == $post->userId) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = [

                    'title' => $_POST['title'],
                    'body' => $_POST['body'],
                    'img' => $_POST['file'],
                    'post_id' => $post->postId
                ];

                

                


                // if ($this->postModel->editPost($data)) {

                //     redirect("post/index");
                // } else {
                //     die("edit_err");
                // }
            } else {

                $post = $this->postModel->getPost_byId($id);


                $data = [

                    'title' => $post->title,
                    'body' => $post->body,
                    'id' => $id


                ];


                $this->view("posts/edit", $data);
            }
        }
        // else {
        //     redirect("post/index");
        // }
        if (isset($_POST['modifier'])) {
            $data = [
                'title' => $_POST['title'],
                'body' => $_POST['body'],
                'img' => $_POST['file'],
                'post_id' => $post->postId
            ];
            if ($this->postModel->editPost($data)) {
                redirect("post/index");
            }
        }
    }

    public function delete($id)
    {

        $post = $this->postModel->getPost_byId($id);

        if ($_SESSION['user_id'] == $post->userId) {

            if ($this->postModel->deletPost($id)) {

                redirect(("post/index"));
            } else {
                die("delet err");
            }
        }
    }
}
