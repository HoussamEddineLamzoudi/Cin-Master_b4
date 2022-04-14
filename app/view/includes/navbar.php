<nav class="navbar navbar-expand-lg navbar-light bg-light p-0 ">

    <div class="container-fluid nv-clr p-2">
        <a class="navbar-brand ms-3 fw-bold" href="<?= URLROOT; ?>"><span class="span_logo">C</span>iné<span class="span_logo">M</span>aster</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active disabled" aria-current="page" href="<?= URLROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactez nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>post/index">Post</a>
                </li>
            </ul>

            <ul class="navbar-nav  ms-auto me-3">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <div class="d-flex justify-content-between">
                    <li class="nav-item me-5 mt-1 fw-bolder fs-5">
                        <span class="">
                            @<?php echo $_SESSION['user_name']; ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a href="<?= URLROOT; ?>user/logout">
                            <button class="btn btn-outline-success col me-2 " type="button">logout</button>
                        </a>
                    </li>
                    </div>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= URLROOT; ?>user/login">
                            <button class="btn btn-outline-success col me-2 " type="button">login</button>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= URLROOT; ?>user/register">
                            <button class="btn btn-sm btn-outline-secondary mt-1" type="button">sing-up</button>
                        </a>
                    </li>
                <?php endif; ?>
        </div>
        </ul>
    </div>
    </div>

</nav>