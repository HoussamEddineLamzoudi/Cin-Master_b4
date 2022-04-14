


<?php include APPROOT . '/view/includes/header.php'; ?>


<div class="container card card-body col-6 mt-5 p-5">
    <h2 class="mb-5">MODIFIER</h2>

    <form action=" " method="POST">
        <input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Titre ..." class="form-control form-control-lg mb-4">

        <textarea name="body" placeholder="Description du film ..." class="form-control form-control-lg mb-4"><?php echo $data['body']; ?></textarea>

        <div>
            <input type="file" name="file" class="aj_postImg bg-white" id="file" accept="image/*">
            <label for="file" class="file_label">choisir une image</label>
        </div>

        <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
    </form>
</div>




<?php include  APPROOT . '/view/includes/footer.php'; ?>