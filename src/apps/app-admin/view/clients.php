<div class="container">
    <div class="row">

        <div class="col-12">
            <a class="btn btn-sm btn-secondary border-radius-lg cursor-pointer" type="button" onclick="requestModal(post_modal[10], post_modal[10], {'user_type':'guest'})" <?= ((!$is_admin) ? 'disabled' : '') ?>> Add applicant | executor </a>
            <div class="col float-right">
                <form action="" method="GET">
                    <input id="search_token" type="hidden" name="token" value="<?= get_token(); ?>">

                    <div class="form-floating mb-2 has-validation">
                        <input class="form-control shadow-none" type="search" name="name" placeholder="Search ..." aria-label="Search ..." aria-describedby="basic-addon2">
                        <label for="username">Search...</label>
                        <div id="usernameFeedback" class="invalid-feedback ps-3 mt-0">
                            Invalid Search
                        </div>
                    </div>
                </form>
            </div>

            <?php if ($req_res != null) : ?>
                <div class="row shadow-sm px-0 mb-3 bg-white rounded" style="border-radius: 15px !important;">
                    <h5 class="col-12 alt_dflt mb-3 py-3 px-4"> Search results ...</h5>

                    <div class="col-12 p-0">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr class="">
                                    <th class="text-center" style="width:1px" scope="col">#</th>
                                    <th scope="col" class="px-2">username</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0 ?>
                                <?php foreach ($req_res as $key => $association) : ?>
                                    <?php $count++ ?>
                                    <tr>
                                        <th class="text-center" scope="row"> <?= $count ?> </th>
                                        <td> <span> <?= ((!empty($association['name'])) ? $association['name'] . ' | ' : '') ?> <i> <?= $association['username']; ?></i> </span> </td>
                                        <td>
                                            <a class="float-end me-3 cursor-pointer" type="button" onclick="requestModal(post_modal[10], post_modal[10], {'user_id':<?= $association['user_id'] ?>, 'user_type':'guest'})"> <i class="fa-solid fa-pen-to-square me-1"></i> Edit </a>
                                            <a class="float-end me-3" href="assign?usr=<?= $association['user_id'] ?>&usr_type=client&tab=client"> <i class="fas fa-clipboard-list me-1"></i> Assign </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else : ?>
                <div class="row shadow-sm px-0 mb-3 bg-white rounded" style="border-radius: 15px !important;">

                    <?php
                    $intval             = 100;
                    $article_type       = 'guest';
                    $page_nmb           = (int) (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : 1;

                    if (HOST_IS_LIVE) {
                        $cnt_sql        = "SELECT * FROM users WHERE user_type = ? AND user_status = 1";
                        $cnt_dta        = [$article_type];
                        $artcl_count    = (int) prep_exec($cnt_sql, $cnt_dta, $sql_request_data[3]);
                    }

                    $page_count         = ceil(($artcl_count / $intval));
                    $sql_pg_strt        = (int)($page_nmb - 1) * $intval;

                    if (HOST_IS_LIVE) {
                        $rgst_sql       = "SELECT * FROM users WHERE user_type = ? AND user_status = 1 ORDER BY date_created DESC LIMIT $sql_pg_strt, $intval";
                        $rgst_dta       = [$article_type];
                        $nwsf_qry       = prep_exec($rgst_sql, $rgst_dta, $sql_request_data[1]);
                    }

                    ?>

                    <div class="col-12 p-0">

                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr class="">
                                    <th class="text-center" style="width:1px" scope="col">#</th>
                                    <th scope="col" class="px-2">username</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (is_array($nwsf_qry) || is_object($nwsf_qry)) : ?>
                                    <?php $count = 0 ?>
                                    <?php foreach ($nwsf_qry as $key => $association) : ?>
                                        <?php $count++ ?>
                                        <tr>
                                            <th class="text-center" scope="row"> <?= $count ?> </th>
                                            <td> <span> <?= ((!empty($association['name'])) ? $association['name'] . ' | ' : '') ?> <i> <?= $association['username']; ?></i> </span> </td>
                                            <td>
                                                <a class="float-end me-3 cursor-pointer" type="button" onclick="requestModal(post_modal[10], post_modal[10], {'user_id':<?= $association['user_id'] ?>, 'user_type':'guest'})"> <i class="fa-solid fa-pen-to-square me-1"></i> Edit </a>
                                                <a class="float-end me-3" href="assign?usr=<?= $association['user_id'] ?>&usr_type=client&tab=client"> <i class="fas fa-clipboard-list me-1"></i> Assign </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>

                    <br><br>
                </div>
                <div class="row">
                    <!-- paggination -->
                    <?php if ($page_count > 1) : ?>
                        <div class="col-12">
                            <br><br>
                            <nav aria-label="Page navigation text-secondary text-center/">
                                <ul class="pagination text-center/ float-right">
                                    <li class="page-item">
                                        <a class="page-link text-secondary" href="?tab=<?= $article_type ?>&page=<?= (((int)$page_nmb - 1 <= 0) ? $page_nmb : $page_nmb - 1) ?>" <?= (($page_nmb - 1 <= 0) ? 'disabled' : '') ?> aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <?php for ($pg = 1; $pg <= $page_count; $pg++) : ?>
                                        <li class="page-item"><a class="page-link <?= (($pg == $page_nmb) ? 'text-danger' : 'text-secondary') ?>" href="?tab=<?= $article_type ?>&page=<?= $pg ?>"><?= $pg ?></a></li>
                                    <?php endfor; ?>
                                    <li class="page-item">
                                        <a class="page-link text-secondary" href="?tab=<?= $article_type ?>&page=<?= (($page_nmb >= $page_count) ? $page_nmb : $page_nmb + 1) ?>" <?= (($page_nmb >= $page_count) ? 'disabled' : '') ?> aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>

    </div>

</div>