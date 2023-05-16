<div class="p-1 px-3" style="border-radius: 25px; ">
    <h5 class="col-12 article_active p-3 mb-3">
        <span class="">
             Assign to <strong class="text-warning">Applicant / Executor</strong>
        </span>
    </h5>


    <?php if ($user_type == 'client') : ?>
        <div class="row">
            <div class="col-md-6">

                <div class="shadow-sm p-3 mb-5 bg-white border-radius-lg">
                    <small class="px-2 text-danger"> Applicant / Executor </small>
                    <h6 class="text-center px-2 font-weight-bolder"> <span> <?= ((!empty($user['name'])) ? $user['name'] . ' | ' : '') ?> <?= $user['username'] ?> </span> </h6>
                    <hr class="horizontal dark mt-1 mb-3">
                    <small class="px-2 text-danger"> Assigned ... </small>

                    <?php if (is_array($clients) || is_object($clients)) : ?>
                        <table class="table table-striped table-sm">
                            <tbody>
                                <?php foreach ($clients as $key => $client) : ?>
                                    <tr id="clnt_row_<?= $key ?>">
                                        <th scope="row">
                                            <a href="./view?usr=<?= $client['member_id'] ?>&usr_type=member">
                                                <span class="text-secondary ms-2"> <?= ((!empty($client['name'])) ? $client['name'] . ' | ' : '') ?> <?= $client['member_surname_initials'] ?> </span>
                                            </a>
                                        </th>
                                        <td> <small style="font-size: .7rem;"><?= short_paragrapth($client['practice_area'], 15) . '...' ?></small> </td>
                                        <td>
                                            <a class="float-end me-2 cursor-pointer font-weight-bold" href="./view?usr=<?= $client['member_id'] ?>&usr_type=member">
                                                <span class="text-info ms-2"> <i class="fa-solid fa-eye me-1"></i> View </span>
                                            </a>
                                            <a class="float-end me-2 cursor-pointer text-danger font-weight-bold" type="butto" onclick="postCheck('clnt_row_<?= $key ?>', {'member':<?= $client['member_id'] ?>, 'user':<?= $user_id ?>, 'form_type':'remove_member' } )" <?= ((!$is_admin) ? 'disabled' : '') ?>> <i class="fa-solid fa-trash me-1"></i> Unlink </a>
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

                    <form action="" method="GET">
                        <div class="form-floating mb-2 has-validation">
                            <input class="form-control shadow-none" type="search" name="name" value="<?= ((isset($search) && !empty($search)) ? $search : '') ?>" placeholder="Search ..." aria-label="Search ..." aria-describedby="basic-addon2">
                            <label for="username">Search...</label>
                            <div id="usernameFeedback" class="invalid-feedback ps-3 mt-0">
                                Invalid Search
                            </div>
                        </div>

                        <input type="hidden" name="token" value="<?= get_token(); ?>">
                        <input type="hidden" name="usr" value="<?= $user_id ?>">
                        <input type="hidden" name="usr_type" value="<?= $user_type ?>">
                        <input type="hidden" name="tab" value="<?= $crrnt_tab ?>">
                    </form>

                    <h6 class="px-3"> <small class="text-warning"> Search results </small> </h6>
                    <div id="client_search_message"></div>
                    <?php if (is_array($req_res) || is_object($req_res)) : ?>
                        <div class="border border-radius-lg">
                            <?php foreach ($req_res as $key => $result) : ?>
                                <?php $user_check = get_member_by_user_id($user['user_id'], $result['member_id'], false) ?>
                                <?php $user_check = (($user_check && $user_check['association_status'] == 1) ? true : false) ?>
                                <div class="row px-3">
                                    <div class="col-12 px-2 py-2 border-bottom">
                                        <a href="view?usr=<?= $result['member_id'] ?>&usr_type=member" class="me-3"> <span> <?= $result['member_surname_initials'] ?> </span> </a> 
                                        <a type="button" class="text-warning float-end" onclick="<?php if($practice_count <= 1): ?> 
                                            postCheck('client_search_message', {'form_type':'search_assign', 'user_type':'member', 'member':<?= $result['member_id'] ?>, 'user':<?= $user_id ?>, 'practice_area':<?= $practice_area_id?>}) <?php else: ?> 
                                            requestModal(post_modal[26], post_modal[26], {'user_type':'member', 'member':<?= $result['member_id'] ?>, 'user':<?= $user_id ?>})
                                            <?php endif; ?>" <?= ((!$is_admin) ? 'disabled' : '') ?> <?= ((!$is_admin) ? 'disabled' : '') ?>> <i class="fas fa-puzzle-piece me-1"></i> 
                                            <span>Assign</span> 
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <p class="text-danger text-sm px-3"> There are no search results to display... </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else : ?>
        <h5 class="bg-light p-3 border-radius-lg" style="font-weight: normal;">
            <a href="./clients" class="text-info/ alt_dflt"> 
                Select or search Applicants | Executors from here ...
            </a>
        </h5>
    <?php endif; ?>

</div>