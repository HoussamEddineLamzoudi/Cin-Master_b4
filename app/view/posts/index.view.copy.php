<?php include APPROOT . '/view/includes/header.php'; ?>



<!-- <?php print_r($_SESSION); ?> -->




<div class="CC">

    <a href="<?php echo URLROOT; ?>/post/add">
        <div class="bg-white container _post postAdd mt-4">Ajouter post</div>
    </a>

    <?php foreach ($data['posts'] as $post) : ?>
        <div class="container _post bg-white mt-4 mb-4 col-8 ">
            <div class="row col-12">

                <div class="row pt-4 col-9">
                    <img src="<?= URLROOT ?>public/img/445161.jpg" class="col-6 img_prf ">
                    <div class="row col-6">
                        <h3 class="col-12"><?php echo $post->userName ?></h3>
                        <!-- <h3 class="col-12">UserName</h3> -->
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
            <div class="row mb-4">
                <img src="<?php echo URLROOT ?>public/img/post_img/<?php echo $post->img ?>">
            </div>
            <div class="aff_comment mt-5 mb-5 p-5">
                <?php foreach ($data['comments']  as $comment) : ?>
                    <?php if ($post->postId == $comment->postId) : ?>
                        <p><span class="fw-bolder fs-5"><?= $comment->userName ?> : </span> <?= $comment->body ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="tab_comment mt-5 mb-5 p-2 row">
                <form action="http://localhost/my_php/Cinema/post/addComment" method="POST">
                    <div class="">
                        <input type="text" name="comment" class="col-12  form-control-lg">
                        <input type="hidden" name="postId" value="<?=$post->postId?>">
                        <input type="hidden" name="userId" value="<?=  $_SESSION['user_id']?>">
                        <button type="submit" name="send" class="col-2 btn btn-primary mb-5">ADD Comment </button>


                    </div>
                </form>
            </div>
            <div class="row">

            </div>


        </div>
    <?php endforeach; ?>


    <?php include  APPROOT . '/view/includes/footer.php'; ?>