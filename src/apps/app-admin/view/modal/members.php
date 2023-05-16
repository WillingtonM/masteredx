<?php require_once $config['PARSERS_PATH'] . 'modal' . DS . 'header.php'; ?>
<div class="container-fluid/ row">

    <h5 class="col-12 p-3 shadow font-weight-bolder">
        <?= (isset($usr_arr['member_surname_initials'])) ? 'Deceased estate | <i class="text-danger"> ' . $usr_arr['member_surname_initials'] . ' </i>' : ' Add deceased estate' ?>
    </h5>
    <div id="userformErrors" class="col-md-12 p-3"></div>
    <div class="col-12" id="form_member">
        <form id="userForm" class="form-horizontal" action="" method="POST">
            <div class="form-row align-items-center">

                <label for="username">Choose office</label>
                <div class="form-floating mb-2 has-validation">
                    <select id="location" name="location" value="" class="form-control shadow-none" <?= ((!$is_admin) ? 'disabled' : '') ?>>
                        <option value="">Select Region</option>
                        <?php foreach ($office_info as $key => $region) : ?>
                            <?php if (($usr_arr != null && $usr_arr['member_location'] == $key) || $key == 'headoffice') : ?>
                                <option value="<?= $key ?>" selected> <?= ucfirst($office_info[$key]['short']) ?> </option>
                            <?php else : ?>
                                <option value="<?= $key ?>"><?= ucfirst($office_info[$key]['short']) ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-floating mb-2 has-validation">
                    <input id="name" type="text" name="name" value="<?= (($usr_arr != null) ? $usr_arr['member_name'] : '') ?>" class="form-control shadow-none" placeholder="Name" <?= ((!$is_admin) ? 'disabled' : '') ?>>
                    <label for="username">Name</label>
                </div>

                <div class="form-floating mb-2 has-validation">
                    <input id="surname" type="text" name="surname" value="<?= (($usr_arr != null) ? $usr_arr['member_surname'] : '') ?>" class="form-control shadow-none" placeholder="Surname" <?= ((!$is_admin) ? 'disabled' : '') ?>>
                    <label for="username">Surname</label>
                </div>

                <div class="form-floating mb-2 has-validation">
                    <input id="surname_initials" type="text" name="surname_initials" value="<?= (($usr_arr != null) ? $usr_arr['member_surname_initials'] : '') ?>" class="form-control shadow-none" placeholder="Surname Initials" <?= ((!$is_admin) ? 'disabled' : '') ?>>
                    <label for="username">Surname Initials</label>
                </div>

                <div class="form-floating mb-2 has-validation">
                    <input id="reference" type="number" name="reference" value="<?= (($usr_arr != null) ? $usr_arr['member_reference'] : '') ?>" class="form-control shadow-none" placeholder="Reference Number" <?= ((!$is_admin) ? 'disabled' : '') ?>>
                    <label for="username">Reference Number</label>
                </div>

            </div>
            <?php if ($usr_arr != null) : ?>
                <input type="hidden" name="post_user" value="<?= $user_id ?>">
            <?php endif; ?>
            <input type="hidden" name="form_type" value="member_add">

            <div id="member_err" class="col-12" style="padding: 9px 0px;"></div>

            <a class="btn btn-dark btn-sm col-12 text-white" type="button" onclick="postCheck('member_err', $('#userForm').serialize(), 0, true);" <?= ((!$is_admin) ? 'disabled' : '') ?>> <?= (($usr_arr != null) ? 'Edit' : 'Add') ?> deceased estate </a>

        </form>

        <?php if ($usr_arr != null) : ?>
            <hr>
            <div id="member_table" class="row">
                <form id="dataForm" class="col-12 form-horizontal" action="" method="POST">
                    <table id="member_table" class="table table-striped">
                        <thead class="thead-light">
                            <tr class="text-center/">
                                <th scope="col" class="px-2"> Completion Date </th>
                                <th scope="col" class="px-2">Task Completion</th>
                            </tr>
                        </thead>
                        <tbody class="member_body">

                            <?php $processed        = true ?>
                            <?php $trgtprcsd        = true ?>
                            <?php $new_procsd       = true ?>
                            <?php $cnt              = 0 ?>
                            <?php foreach ($practice_tasks as $key => $val) : ?>
                                <?php $cnt++ ?>
                                <?php $activity_task = get_activity_tasks_by_practice_task ($user_id, $val['practice_task_id']) ?>
                                <tr id="member_row<?= $cnt ?>">
                                    <th scope="row">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="fas fa-calendar-day"></i> </span>
                                                <?php $date_days = range(1, 31, 1) ?>
                                                <input type="date" id="<?= $key ?>" name="activity<?= $key ?>" value="<?= (($processed && !empty($activity_task['activity_task_date'])) ? date('Y-m-d', strtotime($activity_task['activity_task_date'])) : '') ?>" class="form-control form-sm shadow-none" placeholder="Date" <?= (($processed && !empty($activity_task['activity_task_date'])) ? '' : ((!$new_procsd) ? 'disabled' : '')) ?>>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="form-check mt-2">
                                            <input type="checkbox" name="check<?= $key ?>" value="<?= $val['practice_task_id'] ?>" class="form-check-input" id="check<?= $key ?>" <?= (($processed && !empty($activity_task['activity_task_date'])) ? 'checked disabled' : ((!$new_procsd) ? '' : '')) ?>>
                                            <label class="form-check-label" for="check<?= $key ?>">
                                                <?= $val['practice_task_name'] ?>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <?php $new_procsd   = (empty($last_task) && (isset($first_key['practice_task_slug']) && isset($last_task['practice_task_slug']) &&  $first_key['practice_task_slug'] != $last_task['practice_task_slug'])) ? false : true ?> -->
                                <?php $new_procsd   = (empty($last_task)) ? false : true ?>
                                <?php $processed    = (!$trgtprcsd || empty($last_task)) ? false : true ?>
                                <?php $trgtprcsd    = ( $processed == false || empty($last_task)) ? false : true ?>

                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    <input type="hidden" name="form_type" value="member_update">
                    <input type="hidden" name="member" value="<?= $user_id ?>">
                    <input type="hidden" name="practice" value="<?= $practice_id ?>">

                    <div id="data_err" class="col-12" style="padding: 9px 0px;"></div>
                    <button class="btn btn-secondary btn-sm" type="button" style="border-radius: 12px; font-weight: bolder;" onclick="postCheck('data_err', $('#dataForm').serialize(), 0, true);" <?= ((!$is_admin) ? '' : '') ?>> Update deceased estate date </button>
                    <button class="btn btn-danger btn-sm float-end" type="button" style="border-radius: 12px; font-weight: bolder;" onclick="postCheck('data_err', {'form_type':'remove_estate', 'user':'<?= $usr_arr['member_id'] ?>', 0});" <?= ((!$is_admin) ? '' : '') ?>> Remove deceased estate </button>

                </form>
            </div>
        <?php endif; ?>

    </div>

</div>
<div class="col-12" id="error_pop"></div>
<?php require_once $config['PARSERS_PATH'] . 'modal' . DS . 'footer.php' ?>