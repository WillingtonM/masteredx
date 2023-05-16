<div id="about_div" class="container pt-10 min-vh-100">

    <div class="page-header min-height-300 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
        <span class="mask opacity-6/" style="background-color: rgb(0, 0, 0, .3); ">

            <div class="p-0">
                <div class="text-center py-3 pt-5">
                    <h3 class="text-white" style="font-weight: bolder;"> <span class="text-uppercase"> <?= COMPANY_SHORT_NAME ?> FOUNDATION </span> </h3>
                    <small class="m-0 text-light">
                        <span class="fs-4/">
                            Through our CSR as well as non-profit oriented organization wholly owned by the group; <br> the group is able to add into thousands of strategies set to transform the Black Social and Economic landscape.
                        </span>
                    </small>
                </div>
            </div>
        </span>
    </div>

    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden bg-white" style="border-radius: 20px;">

        <div class="row gx-4">
            <div class="col-12 hover_inimate">
                <div class="h-100 wait-1s" data-animation="animated pulse">
                    <div class="card-body p-3">
                        <div class="row">

                            <div class="col-12 mb-xl-0 mb-4 border-radius-lg p-3 mb-5">
                                <h3 class="abt_h3 px-2 text-gradient text-dark" style="font-weight: bolder;"> <?= COMPANY_SHORT_NAME ?> Foundation </h3>

                                <div class="w-100 mb-xl-0 mb-4 border-radius-lg p-3 px-2">

                                    <p>
                                        In the betterment of social and economic lives of people around the communities, <?= COMPANY_SHORT_NAME ?> Group is to adopt policies that promote the well-being of the society and the environment while lessening negative impacts on them.
                                        Through our CSR as well as non-profit oriented organization wholly owned by the group; the group is able to add into thousands of strategies set to transform the Black Social and Economic landscape.
                                    </p>

                                </div>
                            </div>

                            <div class="col-12 mb-5">
                                <h3 class="abt_h3 px-2 text-gradient text-dark" style="font-weight: bolder;"> Corporate Social Responsibility </h3>

                                <div class="w-100 mb-xl-0 mb-4 bg-white text-dark border-radius-lg p-3">

                                    <p>
                                        One of our intentions with the CSR is to pursue pro-social objectives in addition to profit maximization. We however, are to adopt the four types of social responsibility in the quest to achieve a winning global space.
                                        <br> <br>
                                        The four adopted are:
                                    </p>
                                    <ol class="list-group list-group-numbered list-group-flush">
                                        <li class="list-group-item bg-light"> Environmental Responsibility </li>
                                        <li class="list-group-item bg-light"> Ethical Responsibility </li>
                                        <li class="list-group-item bg-light"> Philanthropic Responsibility </li>
                                        <li class="list-group-item bg-light"> Economic Responsibility </li>
                                    </ol>

                                    <br>
                                    <p class="">
                                        with each weighing the same as all. Our non-profit organization stands in the gap to inspire confidence in the youths, and carries our programs that will allow them to <b> Dream – Learn – Create – Tell a Story – Inspire </b>
                                        at a global level. We run the following programs that follow in the traditions of our vision:

                                    </p>
                                    <br>

                                    <h5 class="">
                                        We run the following programs that follow in the traditions of our vision:
                                    </h5>

                                    <div class="col-12 my-3">
                                        <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                                            <?php $tabbs_count = 0 ?>
                                            <?php foreach ($foundation_navba as $key => $nav) : ?>
                                                <?php $tabbs_count++ ?>
                                                <li class="shadow nav-item article_nav m-1 <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'article_active' : '') ?>">
                                                    <a get-variable="tab" data-name="<?= $key ?>" class="nav-link <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'active' : '') ?>" id="pills-<?= $key ?>-tab" data-bs-toggle="pill" href="#pills-<?= $key ?>" role="tab" aria-controls="pills-<?= $key ?>" aria-selected="<?= (((isset($_GET['tab']) && $_GET['tab'] == $key)  || empty($_GET['tab'])) ? 'true' : 'false') ?>">
                                                        <i class="<?= $nav['imgs'] ?>"></i> <br>
                                                        <span class="border-weight-bolder text-xs"> <?= $nav['short'] ?> </span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                    <div class="list-group border-radius-lg my-3">
                                        <div class="tab-content" id="notif_tab">
                                            <?php $array_media_count = 0; ?>
                                            <?php foreach ($foundation_navba as $key => $tabs) : ?>
                                                <?php $array_media_count++; ?>
                                                <div class="tab-pane fade px-2 <?= (((isset($_GET['tab']) && $_GET['tab'] == $key) || (!isset($_GET['tab']) && $array_media_count == 1)) ? 'show active' : '') ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>-tab">
                                                    <div class="row notif_content mb-3 bg-light border-radius-xl p-3 border">
                                                        <div class="col-12">
                                                            <h3 class="abt_h3 px-2 text-gradient text-dark mb-3" style="font-weight: bolder;"> <?= $tabs['short'] ?> </h3>
                                                            <div class="p-3 px-2">
                                                                <?php require_once $config['PARSERS_PATH'] . 'foundation' . DS . $key . '.php' ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>