<div class="container">

    <div class="row">

        <!-- <div class="col-12">
            <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                <?php $tabbs_count = 0 ?>
                <?php foreach ($estates_navs as $key => $nav) : ?>
                    <?php $tabbs_count++ ?>
                    <li class="shadow nav-item font-weight-bold article_nav m-1 <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'article_active' : '') ?>" onclick="change_bg(parseInt(<?= $tabbs_count ?>));">
                        <a get-variable="tab" data-name="<?= $key ?>" class="nav-link <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'active' : '') ?>" id="pills-<?= $key ?>-tab" data-bs-toggle="pill" href="#pills-<?= $key ?>" role="tab" aria-controls="pills-<?= $key ?>" aria-selected="<?= (((isset($_GET['tab']) && $_GET['tab'] == $key)  || empty($_GET['tab'])) ? 'true' : 'false') ?>">
                            <span class="border-weight-bolder me-1">  <?= $nav['short'] ?> </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div> -->

        <div class="tab-content col-12"">

            <?php $array_count = 0; ?>
            <?php foreach ($estates_navs as $key => $tabs) : ?>
                <?php $array_count++; ?>
                <div class="tab-pane fade <?= (((isset($_GET['tab']) && $_GET['tab'] == $key) || (!isset($_GET['tab']) && $array_count == 1)) ? 'show active' : '') ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>-tab">
                    <div class="row">
                        <div class="col-12" style="padding: 5px !important;">
                            <?php require $config['PARSERS_PATH'] . 'estates' . DS . $key . '.php'; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

</div>