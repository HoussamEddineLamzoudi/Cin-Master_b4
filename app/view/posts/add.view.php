<?php include APPROOT . '/view/includes/header.php'; ?>


<div class="container card card-body col-6 mt-5 p-5">
    <h2 class="mb-5">AJOUTER UN POST</h2>

    <form action="<?= URLROOT ?>post/add" method="POST">
        <input type="text" name="title" placeholder="Titre ..." class="form-control form-control-lg mb-4">

        <textarea name="body" placeholder="Description du film ..." class="form-control form-control-lg mb-4"></textarea>

        <div>
            <input type="file" name="file" class="aj_postImg bg-white" id="file" accept="image/*">
            <label for="file" class="file_label">choisir une image</label>
        </div>

        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
    </form>
</div>


<?php include  APPROOT . '/view/includes/footer.php'; ?>