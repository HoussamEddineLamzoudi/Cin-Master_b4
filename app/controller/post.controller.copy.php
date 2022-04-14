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
        $comments = $this->postModel->getcoments();
        if ($posts && $comments) {

            $data = [
                'posts' => $posts,
                'comments' => $comments

            ];

            $this->view("posts/index", $data);
        } else {
            die("posts fetch err");
        }
    }
//****** 

    public function addComment()
    {
        if (isset($_POST['send'])) {
            // $userId =$_POST['userId'] ;
            // $postId = $_POST['postId'];
            // $comment = $_POST['comment'];
            $data = [
                'userId' => $_POST['userId'],
                'postId' => $_POST['postId'],
                'body' => $_POST['comment']
            ];
            if ($this->postModel->addComents($data)) {
                $this->index();
            }
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

                // print_r($data);


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

                // $_SESSION['raf'] = $data['post_id'];

                // print_r($data);


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
                    // 'img' => $post->img

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
