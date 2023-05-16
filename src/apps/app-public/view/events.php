<div class="container pt-10 min-vh-100">

    <div class="page-header min-height-200 mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px; z-index: 1 !important">
        <span class="mask opacity-6/" style="background-color: rgb(0, 0, 0, .3); z-index: 1 !important">
            <div class="p-0">
                <div class="text-center py-3 pt-5">
                    <h3 class="font-weight-bolder text-white"> <span class="text-warning me-2"> Events & Schedule </span> <i> </i> </h3>
                    <small class="m-0 text-light">
                        See our upcoming and previous Events & Schedules
                    </small>
                </div>
            </div>
        </span>
    </div>

    <div class="mx-2 mt-n6 overflow-hidden mb-5">
        <div class="row gx-4 p-3">

            <div class="col-12 mb-3" style="z-index: 10 !important;">
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                    <?php $tabbs_count = 0 ?>
                    <?php foreach ($events_navba as $key => $nav) : ?>
                        <?php $tabbs_count++ ?>
                        <li class="shadow nav-item font-weight-bold article_nav m-1 <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'article_active' : '') ?>">
                            <a get-variable="tab" data-name="<?= $key ?>" class="nav-link <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'active' : '') ?>" id="pills-<?= $key ?>-tab" data-bs-toggle="pill" href="#pills-<?= $key ?>" role="tab" aria-controls="pills-<?= $key ?>" aria-selected="<?= (((isset($_GET['tab']) && $_GET['tab'] == $key)  || empty($_GET['tab'])) ? 'true' : 'false') ?>">
                                <span class="border-weight-bolder"> <i class="<?= $nav['imgs'] ?>"> &nbsp; </i> <?= $nav['short'] ?> </span>
                                <hr class="horizontal dark mt-1 mb-0">
                                <h6 class="text-center sm_text text-xs font-weight-bold mb-0" style="color: #777;"><?= $nav['long'] ?></h6>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-12 py-2">
                <div class="tab-content" id="notif_tab">
                    <?php $array_media_count = 0; ?>
                    <?php foreach ($events_navba as $key => $tabs) : ?>
                        <?php $array_media_count++; ?>
                        <?php $active = ($key == 'upcoming') ? 1 : 0 ?>
                        <?php $events = get_events_active($active, 'event') ?>
                        <div class="tab-pane fade px-2 <?= (((isset($_GET['tab']) && $_GET['tab'] == $key) || (!isset($_GET['tab']) && $array_media_count == 1)) ? 'show active' : '') ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>-tab">
                            <?php if (is_array($events)) : ?>
                                <?php foreach ($events  as $event) : ?>
                                    <?php require $config['PARSERS_PATH'] . 'bookings' . DS . 'events.php' ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="row notif_content mb-3 bg-light border-radius-xl p-3 border">
                                    <h5 class="p-3 text-dark" > No events yet </h5>
                                </div>
                            <?php endif; ?>

                            <div class="row">
                                <!-- paggination -->
                                <?php if (isset($pggl_count) && $pggl_count > 1) : ?>
                                    <div class="col-12">
                                        <nav aria-label="Page navigation text-secondary">
                                            <ul class="pagination float-right">
                                                <li class="page-item">
                                                    <a class="page-link text-secondary" href="?tab=<?= $key ?>&page=<?= (((int)$pggl_nmb - 1 <= 0) ? $pggl_nmb : $pggl_nmb - 1) ?>&type=<?= $key ?>" <?= (($pggl_nmb - 1 <= 0) ? 'disabled' : '') ?> aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>

                                                <?php for ($pg = 1; $pg <= $pggl_count; $pg++) : ?>
                                                    <li class="page-item"><a class="page-link <?= (($pg == $pggl_nmb) ? 'text-danger' : 'text-secondary') ?>" href="?tab=<?= $key ?>&page=<?= $pg ?>&type=<?= $key ?>"><?= $pg ?></a></li>
                                                <?php endfor; ?>

                                                <li class="page-item">
                                                    <a class="page-link text-secondary" href="?tab=<?= $key ?>&page=<?= (($pggl_nmb >= $pggl_count) ? $pggl_nmb : $pggl_nmb + 1) ?>&type=<?= $key ?>" <?= (($pggl_nmb >= $pggl_count) ? 'disabled' : '') ?> aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>
                </div>

            </div>


        </div>
    </div>



</div>