<?php include APPROOT . '/view/includes/header.php'; ?>





<div class="CC">
    <a href="http://localhost/my_php/Cinema/post/add">
        <div class="bg-white container _post postAdd mt-4">Ajouter post</div>
    </a>


    <?php
    if (isset($data["posts"])) :
        foreach ($data['posts'] as $post) : ?>
            <div class="container _post bg-white mt-4 mb-4 p-2 col-8 ">
                <div class="row col-12">

                    <div class="row pt-4 col-9">
                        <img src="<?= URLROOT ?>public/img/445161.jpg" class="col-6 img_prf ">
                        <div class="row col-6">
                            <h3 class="col-12"><?php echo $post->userName ?></h3>
                            <p class="col-12"><?php echo $post->published_at ?></p>
                        </div>
                    </div>

                    <?php if ($post->userId == $_SESSION['user_id']) : ?>
                        <div class="col-3 mt-3">
                            <a href="<?php echo URLROOT; ?>post/edit/<?php echo $post->postId ?>"><button class="btn btn-success ms-3 me-1">Modifier</button></a>
                            <a href="<?php echo URLROOT; ?>post/delete/<?php echo $post->postId ?>"><button class="btn btn-danger">Supprimer</button></a>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="review row">
                    <p class="col-12 fw-bolder fs-4 ms-2 mt-3 "><?php echo $post->title ?></p>
                    <p class="col-12"><?php echo $post->body ?></p>
                </div>
                <div class="row mb-5">
                    <img src="<?php echo URLROOT ?>public/img/post_img/<?php echo $post->img ?>">
                </div>

            </div>
    <?php endforeach;
    endif; ?>


    <?php include  APPROOT . '/view/includes/footer.php'; ?>