<?php
class pages extends controller
{
    public function __construct()
    {
    }
    public function index()
    {
        redirect("post/index");
    }

    public function home()
    {

        $this->view('pages/home');
    }
}
