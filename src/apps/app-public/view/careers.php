<div class="pt-10 min-vh-100">
    <div class="page-header min-height-300 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
        <span class="mask" style="background-color: rgb(41, 55, 75, .9);">
            <div class="p-0">
                <div class="text-center px-3 pt-5">
                    <h3 class="font-weight-bolder text-white"> Apply for our <span class="text-warning"> Career </span> Opportunities </h3>
                    <small class="m-0 text-light">
                        Apply to our current vacant opportuniets
                    </small>
                </div>
            </div>
        </span>
    </div>

    <div class="card blur/ shadow-blur/ mx-4 mt-n6 overflow-hidden bg-white" style="border-radius: 20px;">

        <div class="row gx-4 p-3" style="z-index: 10 !important;">
            <?php if (is_array($careers_data)) : ?>
                <?php foreach ($careers_data as $key => $career) : ?>
                    <div class="col-12 mb-0 bg-white border-radius-xl shadow/ p-0 border-bottom/ border-top/ border/" style="z-index: 10 !important;">
                        <div class="d-flex p-3" style="z-index: 10 !important;">
                            <div class="flex-shrink-0 text-center pt-3 d-none d-md-block">
                                <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex bg-dark p-4 border-radius-xl">
                                    <i class="fa-solid fa-briefcase fa-2x text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="text-center text-md-start ps-3 font-weight-bolder"> <?= $career['career_name'] ?> </h5>

                                <div class="list-group list-group-horizontal px-3">
                                    <a type="button" class="list-group-item list-group-item-action active/">
                                        <i class="fa-solid fa-location-dot me-2"></i> <?= $career['career_location'] ?>
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action">
                                        <span class="me-2">R</span> <?= $career['career_amount'] ?>
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action">
                                        <i class="fa-regular fa-clock me-1"></i> <?= $career_types[$career['career_period_type']] ?>
                                    </a>
                                </div>

                                <div class="p-3">
                                    <div class="bg-light border-radius-lg p-3">
                                        <span class="text-secondary font-weight-bolder"> <small class="text-secondary me-2"> Closing Date: </small> <?= date('Y-m-d', strtotime($career['career_closing_date'])) ?></span> <br>

                                        <p class="text-dark">
                                            <?= $career['career_description'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0 pt-2" style="padding-top: 12px !important;">
                                <a type="button" class="btn d-block w-100 d-sm-inline-block btn-light" onclick="requestModal(post_modal[28], post_modal[28], {'career':<?= $career['career_id'] ?>})">Apply now</a>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark mb-1">

                <?php endforeach; ?>
            <?php else: ?>
                <p class="col text-dark text-center">
                    There are currently no career postings, please try again later 
                </p>
            <?php endif; ?>
        </div>

    </div>


</div>