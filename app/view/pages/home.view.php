<?php include APPROOT . '/view/includes/header.php'; ?>

<div class="homeBody">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item carSize active" style="height: calc(100vh - 56px);">
                <img src="<?= URLROOT ?>public/img/carousel (6).jpg" class="d-block w-100" style="height: calc(100vh - 56px);" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Blade Runner 2049</h5>
                    <p class="text-wite-50">En 2049, la société est fragilisée par les nombreuses tensions entre les humains et leurs esclaves créés par bio-ingénierie...</p>
                </div>
            </div>
            <div class="carousel-item carSize" style="height: calc(100vh - 56px);">
                <img src="<?= URLROOT ?>public/img/carousel (2).jpg" class="d-block w-100" style="height: calc(100vh - 56px);" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>mad max: fury road</h5>
                    <p class="text-wite-50">Au volant de son bolide, le "Cavalier de la nuit" sème la terreur sur une route des États-Unis...</p>
                </div>
            </div>
            <div class="carousel-item carSize" style="height: calc(100vh - 56px);">
                <img src="<?= URLROOT ?>public/img/carousel (4).jpg" class="d-block w-100" style="height: calc(100vh - 56px);" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>the dark knight</h5>
                    <p class="text-wite-50">Batman est plus que jamais déterminé à éradiquer le crime organisé qui sème la terreur en ville...</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="homeBody">
        <div class="landing text-light d-flex justify-content-center align-items-center">
            <div class="text-center">
                <h1>Partagez Vos Films</h1>
                <p class="text-white-50 fs-6">Partagez vos opinions sur vos films préférés avec vos amis</p>
                <a href="<?= URLROOT ?>post/add">
                    <button type="button" class="btn btn-light">Ajouter Post</button>
                </a>
            </div>
        </div>
    </div>


    <div class="features text-center pt-5 pb-5">
        <div class="container">
            <div class="main-title mt-5 mb-5 position-relative">
                <h2>Welcom To <span class="span_logo">C</span>iné<span class="span_logo">M</span>aster</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <img src="<?= URLROOT ?>public/img/icons/Group 1.png" alt="">
                        <h4 class="mb-3 mt-5 text-uppercase">Lorem ipsum dolor</h4>
                        <p class="text-black-50 lh-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed aliquid,</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <img src="<?= URLROOT ?>public/img/icons/Group 2.png" alt="">
                        <h4 class="mb-3 mt-5 text-uppercase">Lorem ipsum dolor</h4>
                        <p class="text-black-50 lh-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed aliquid,</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <img src="<?= URLROOT ?>public/img/icons/Group 3.png" alt="">
                        <h4 class="mb-3 mt-5 text-uppercase">Lorem ipsum dolor</h4>
                        <p class="text-black-50 lh-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed aliquid,</p>
                    </div>
                </div>
            </div>
        </div>
    </div> 

</div>

<?php include  APPROOT . '/view/includes/footer.php'; ?>