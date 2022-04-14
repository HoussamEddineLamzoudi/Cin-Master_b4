<?php

class posts
{

    private $db;

    public function __construct()
    {
        $this->db = new database;
    }





    public function getPosts()
    {
        $this->db->query("SELECT 
                                posts.*, 
                                users.userId, 
                                users.userName
                            FROM
                                posts
                            INNER JOIN
                                users
                            ON
                                posts.userId = users.userId
                        ");

        $posts = $this->db->fetchAll();

        return $posts;
    }


    public function addPost($data)
    {
        $this->db->query("INSERT INTO posts(title, img, body, userId) VALUES(:title, :img, :body, :user_id)");

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPost_byId($id)
    {

        $this->db->query("SELECT * FROM posts WHERE postId = :id");

        $this->db->bind(':id', $id);
        $row = $this->db->fetch();

        return $row;
    }

    public function editPost($data)
    {

        $this->db->query("UPDATE posts SET title = :title, img = :img, body = :body WHERE postId = :id");

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':id', $data['post_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function deletPost($id)
    {

        $this->db->query("DELETE FROM posts WHERE postId = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}
