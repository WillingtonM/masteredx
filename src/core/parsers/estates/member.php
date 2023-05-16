<div class="bg-white/ shadow/" style="padding: 17px 5px; border-radius: 25px;">
    <h5 class="col-12 article_active p-3 mb-3">
        <span class="">
            Assign <strong class="text-warning">Applicant / Executor</strong> to <strong class="text-warning">Member</strong>
        </span>
    </h5>

    <?php if ($user_type == 'member') : ?>
        <div class="row">
            <div class="col-md-6">

                <div class="shadow-sm p-3 mb-5 bg-white border-radius-lg">
                    <small class="px-2 text-danger">  </small>
                    <h6 class="text-center px-2 font-weight-bolder"> <?= (($user_type == 'client') ? $user['username'] : $user['member_surname_initials']) ?> </h6>
                    <hr class="horizontal dark mt-1 mb-3">
                    <small class="px-2 text-danger"> Assigned Applicants / Executors </small>
                    <?php if (is_array($clients) || is_object($clients)) : ?>
                        <table class="table table-striped table-sm">
                            <tbody>
                                <?php foreach ($clients as $key => $client) : ?>
                                    <tr id="memb_row_<?= $key ?>">
                                        <th scope="row">
                                            <span class="text-secondary ms-2"></span> <?= ((!empty($client['name'])) ? $client['name'] . ' | ' : '') ?> <i> <?= $client['username'] ?> </i> </span>
                                        </th>
                                        <td>
                                            <a class="float-end me-2 cursor-pointer font-weight-bold text-danger" type="button" onclick="postCheck('memb_row_<?= $key ?>', {'user':<?= $client['user_id'] ?>, 'member':<?= $user_id ?>, 'form_type':'remove_member' } )" <?= ((!$is_admin) ? 'disabled' : '') ?>> <i class="fa-solid fa-trash me-1"></i> Unlink </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h6 class="text-danger"> There is no data to display </h6>
                    <?php endif; ?>
                </div>

            </div>

            <div class="col-md-6">

                <div class="shadow-sm p-3 mb-5 bg-white rounded" style="background-color: #fff; border-radius: 15px !important;">

                    <form action="?usr=<?= $user_id ?>&usr_type=<?= $user_type ?>>" method="GET">
                        <div class="form-floating mb-2 has-validation">
                            <input class="form-control shadow-none" type="search" name="name" value="<?= ((isset($search) && !empty($search)) ? $search : '') ?>" placeholder="Search ..." aria-label="Search ..." aria-describedby="basic-addon2">
                            <label for="username">Search  applicant/executor...</label>
                            <div id="usernameFeedback" class="invalid-feedback ps-3 mt-0">
                                Invalid Search
                            </div>
                        </div>
                        <input id="search_token" type="hidden" name="token" value="<?= get_token(); ?>">
                        <input id="search_usr" type="hidden" name="usr" value="<?= $user_id ?>">
                        <input id="usr_type" type="hidden" name="usr_type" value="<?= $user_type ?>">
                        <input id="tab" type="hidden" name="tab" value="<?= $crrnt_tab ?>">
                    </form>

                    <h6 class="px-3"> <small class="text-warning"> Applicant/Executor search results </small> </h6>
                    <div id="search_err" style="padding-top: 15px;"></div>
                    <?php if (is_array($req_res) || is_object($req_res)) : ?>
                        <?php foreach ($req_res as $key => $result) : ?>
                            <?php $user_check = get_member_by_user_id($result['user_id'], $user['member_id'], false) ?>
                            <?php $user_check = (($user_check && $user_check['association_status'] == 1) ? true : false) ?>
                            <div class="row px-3">
                                <div class="col-12 px-2 py-2 border-bottom">
                                    <a type="button" class="me-3"> <span> <?= ((!empty($result['name'])) ? $result['name'] . ' | ' : '') ?> <?= $result['username'] ?> </span> </a> 
                                    <a type="button" class="text-warning float-end" onclick="<?php if($practice_count <= 1): ?> 
                                        postCheck('client_search_message', {'form_type':'search_assign', 'user_type':'client', 'member':<?= $user_id ?>, 'user':<?= $result['user_id'] ?>, 'practice_area':<?= $practice_area_id?>}) <?php else: ?> 
                                        requestModal(post_modal[26], post_modal[26], {'user_type':'client', 'member':<?= $user_id ?>, 'user':<?= $result['user_id'] ?>})
                                        <?php endif; ?>" <?= ((!$is_admin) ? 'disabled' : '') ?> <?= ((!$is_admin) ? 'disabled' : '') ?>> <i class="fas fa-puzzle-piece me-1"></i> 
                                        <span>Assign</span> 
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-danger text-sm mx-2"> There are no search results to display... </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else : ?>
        <h5 class="bg-light p-3 border-radius-lg" style="font-weight: normal;">
            <a href="./clients" class="text-info/ alt_dflt">    
                Select or search an Estate from here ... 
            </a>
        </h5>
    <?php endif; ?>

</div>