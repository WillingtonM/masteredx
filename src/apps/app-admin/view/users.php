<div class="container">

    <div class="row">
        <div class="media_div col-12 shadow bg-white" style="border-radius: 25px;">
            <div class="row">

                <div class="col-12 mt-3">
                    <a type="button" class="btn btn-secondary border-radius-lg" onclick="requestModal(post_modal[10], post_modal[10], {})" <?= ((!$is_admin) ? 'disabled' : '') ?>>
                        <i class="fas fa-user-plus me-2"></i> Create User
                    </a>

                    <a type="button" class="btn btn-warning border-radius-lg" onclick="requestModal(post_modal[19], post_modal[19], {})" <?= ((!$is_admin) ? 'disabled' : '') ?>>
                        <i class="fa-solid fa-user-group me-2"></i> Add user types
                    </a>
                </div>
                <hr>
                <div class="clearfix p-0 m-0"></div>

                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class=""></th>
                            <th scope="col" class=""></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (is_array($usr_qry) || is_object($usr_qry)) : ?>
                            <?php $count = 0 ?>
                            <?php foreach ($usr_qry as $key => $usr) : ?>
                                <?php $image = (($usr != null) ? img_path(ABS_USER_PROFILE, $usr['user_image'], 1) : '') ?>
                                <?php $ful_name = $usr['name'] . ' ' . $usr['last_name'] ?>
                                <?php $usr_name = $usr['username'] ?>
                                <?php $usr_pstn = $usr['user_position'] ?>
                                <?php $usr_id   = $usr['user_id'] ?>
                                <tr>
                                    <th scope="row border">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="<?= $image ?>" width="45" alt="...">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <b><?= $ful_name ?></b> <br>
                                                <small style="color: #777777;">@<?= $usr_name ?></small>
                                                <span class="text-xs" style="color: #aaa;"><small> <i class="me-1"> <?= $usr_pstn ?> </small></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border">
                                        <a type="button" class="btn btn-dark bg-dark float-end btn-sm/" onclick="requestModal(post_modal[10], post_modal[10],  {'user_id': <?= $usr_id ?>})" <?= ((!$is_admin) ? 'disabled' : '') ?>> <span><i class="fas fa-user-edit me-2"></i> Edit </span> </a>
                                    </td>
                                </tr>
                                <?php $count++ ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>
    
</div>

</div>