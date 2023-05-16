<?php require_once $config['PARSERS_PATH'] . 'modal' . DS . 'header.php'; ?>

<div class="row">

    <div class="card card-blog card-plain wait-1s" data-animation="animated pulse">
        <div class="position-relative text-center">
            <a class="d-block shadow-xl border-radius-xl p-2">
                <img src="<?= img_path(ABS_USER_PROFILE, $user['user_image'], 1)  ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
            </a>
        </div>
        <div class="card-body px-1 pb-0">
            <p class="text-gradient text-dark mb-2 text-sm">
                <span class="font-weight-bolder"> <?= $user['name'] . ' ' . $user['last_name'] ?> </span>
                <br class="m-0 p-0">
                <small> <?= $user['user_position'] ?> </small>

                <?php if (!empty($user['social_media_in'])) : ?>
                    <a href="<?= $user['social_media_in'] ?>" class="float-end me-2"> <i class="fa-brands fa-linkedin"></i> </a>
                <?php endif; ?>

                <?php if (!empty($user['social_media_tw'])) : ?>
                    <a href="<?= $user['social_media_tw'] ?>" class="float-end me-2"> <i class="fa-brands fa-twitter"></i> </a>
                <?php endif; ?>

                <a href="mailto:<?= $user['email'] ?>" class="float-end me-2"> <i class="fa-solid fa-envelope-open-text"></i> </a>
                <a href="tel:<?= $user['contact_number'] ?>" class="float-end me-2"> <i class="fa-solid fa-phone-volume"></i> </a>
            </p>

            <p class="mb-4 text-sm">
                <?= $user['user_description'] ?>
            </p>

        </div>
    </div>

</div>

<?php require_once $config['PARSERS_PATH'] . 'modal' . DS . 'footer.php' ?>