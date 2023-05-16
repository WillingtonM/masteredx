<div class="container">

    <div id="content_container" class="container" style="border-radius: 0 0 25px 25px;">

        <br><br>

        <div class="row">
            <div class="col-12">
                <h3 class="" style="padding: 15px; color: #555; border-bottom: 1px dotted #cc0000;">Upcomin events</h3>

                <?php if (is_array($upcmg_res) || is_object($upcmg_res)) : ?>
                    <ul class="col-12 ul_media">
                        <?php foreach ($upcmg_res as $key => $usr_evnt) : ?>
                            <?php
                            if ($usr_evnt['event_begin_date'] != '') {
                                $begin_date_     = DateTime::createFromFormat('Y-m-d H:i:s', $usr_evnt['event_begin_date']);
                                $begin_date      = $begin_date_->format('Y-m-d');
                            }
                            if ($usr_evnt['event_end_date'] != '') {
                                $end_date_       = DateTime::createFromFormat('Y-m-d H:i:s', $usr_evnt['event_end_date']);
                                $end_date        = $end_date_->format('Y-m-d');
                            }
                            ?>
                            <li class="row li_media" id="user_<?= $usr_evnt['event_id'] ?>">
                                <h5 class="col-12" style="font-weight: normal;"> <?= $usr_evnt['event_title'] ?></h5>

                                <?php $end_date_frmt  = $end_date_->format('F jS, Y'); ?>
                                <?php if ($begin_date == $end_date) : ?>
                                    <?php $begin_date    = $begin_date_->format('F jS, Y'); ?>
                                    <a class="col-12">Event Date</a> <br>
                                    <a class="btn btn-danger/" style="color: #cc0000"><i class="fa fa-calendar-check"></i>&emsp; <?= $begin_date ?></a>
                                <?php else : ?>
                                    <?php
                                    $begin_date    = $begin_date_->format('F jS, Y');

                                    if (($begin_date_->format('F') == $end_date_->format('F')) && ($begin_date_->format('Y') == $end_date_->format('Y'))) {
                                        $begin_date = $begin_date_->format('d');
                                    } elseif ($begin_date_->format('Y') == $end_date_->format('Y')) {
                                        $begin_date = $begin_date_->format('F d');
                                    }
                                    ?>
                                    <a class="col-12">Event period</a> <br>
                                    <a class="btn btn-danger/" style="color: #cc0000"><i class="fa fa-calendar-check"></i>&emsp; <?= $begin_date ?> &nbsp; until &nbsp; <?= $end_date_frmt ?></a>
                                <?php endif; ?>

                                <?php if ($usr_evnt['event_venue'] != '') : ?>
                                    <a class="btn" style="color: #cc000;">&emsp; | &emsp; at &emsp; <i class="fa fa-map-marker"></i> &nbsp; <?= $usr_evnt['event_venue'] ?></a>
                                <?php endif; ?>

                                <div class="col-12" style="color: #555; background: #efefef; border: 1px solid #eee; border-radius: 15px; padding: 9px;">
                                    <p><?= $usr_evnt['event_description'] ?></p>
                                </div>
                            </li>


                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <br>

                    <div class="col-12 alert alert-warning text-center" style="border-radius: 15px;">
                        <h5 class="text-warning"> There are currently no upcoming events </h5>
                    </div>

                <?php endif; ?>



            </div>
        </div>


        <br><br><br>

        <div class="row">
            <div class="col-12">
                <h3 class="" style="padding: 15px; color: #555; border-bottom: 1px dotted #cc0000;">Previous events</h3>

                <ul class="col-12 ul_media">
                    <?php if (is_array($event_res) || is_object($event_res)) : ?>
                        <?php foreach ($event_res as $key => $usr_evnt) : ?>
                            <?php
                            if ($usr_evnt['event_begin_date'] != '') {
                                $begin_date_     = DateTime::createFromFormat('Y-m-d H:i:s', $usr_evnt['event_begin_date']);
                                $begin_date      = $begin_date_->format('Y-m-d');
                            }
                            if ($usr_evnt['event_end_date'] != '') {
                                $end_date_       = DateTime::createFromFormat('Y-m-d H:i:s', $usr_evnt['event_end_date']);
                                $end_date        = $end_date_->format('Y-m-d');
                            }
                            ?>
                            <li class="row li_media" id="user_<?= $usr_evnt['event_id'] ?>" style="border-bottom: 1px solid #ddd;">
                                <h5 class="col-12" style="font-weight: normal;"> <?= $usr_evnt['event_title'] ?></h5>

                                <?php $end_date_frmt  = $end_date_->format('F jS, Y'); ?>
                                <?php if ($begin_date == $end_date) : ?>
                                    <?php $begin_date    = $begin_date_->format('F jS, Y'); ?>
                                    <a class="col-12">Event Date</a> <br>
                                    <a class="btn btn-danger/" style="color: #cc0000"><i class="fa fa-calendar-check"></i>&emsp; <?= $begin_date ?></a>
                                <?php else : ?>
                                    <?php
                                    $begin_date    = $begin_date_->format('F jS, Y');

                                    if (($begin_date_->format('F') == $end_date_->format('F')) && ($begin_date_->format('Y') == $end_date_->format('Y'))) {
                                        $begin_date = $begin_date_->format('d');
                                    } elseif ($begin_date_->format('Y') == $end_date_->format('Y')) {
                                        $begin_date = $begin_date_->format('F d');
                                    }
                                    ?>
                                    <a class="col-12">Event period</a> <br>
                                    <a class="btn btn-danger/" style="color: #cc0000"><i class="fa fa-calendar-check"></i>&emsp; <?= $begin_date ?> &nbsp; until &nbsp; <?= $end_date_frmt ?></a>
                                <?php endif; ?>

                                <?php if ($usr_evnt['event_venue'] != '') : ?>
                                    <a class="btn" style="color: #cc000;">&emsp; | &emsp; at &emsp; <i class="fa fa-map-marker"></i> &nbsp; <?= $usr_evnt['event_venue'] ?></a>
                                <?php endif; ?>

                                <div class="col-12" style="color: #555; background: #efefef; border: 1px solid #eee; border-radius: 15px; padding: 9px;">
                                    <p><?= $usr_evnt['event_description'] ?></p>
                                </div>
                            </li>


                        <?php endforeach; ?>
                    <?php endif; ?>



                </ul>

            </div>
        </div>



    </div>
</div>