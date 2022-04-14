<?php
class Pages extends controller
{
    public function __construct()
    {
    }
    public function index()
    {

        redirect("post/index");
    }
}
