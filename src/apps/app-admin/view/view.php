<div class="container-fluid bg-white border-radius-xl">
    <div class="container min-vh-100">

        <?php if ($member != null && $user_type != 'client') : ?>
            <div class="row">
                <div id="home-first" class="col-12 text-center px-3 mt-4 mb-1">
                    <h5 class="text-secondary" style="font-weight: normal;">
                        <span> Estate information for <b class="alt_dflt"><?= $member['member_surname_initials'] ?></b> </span>
                    </h5>
                </div>
            </div>
            <hr class="horizontal dark mt-1 mb-0">

            <div class="col-12 mt-4" style="border-radius: 35px;">
                <div class="col-row">
                    <div class="col-12 bg-white p-0 shadow">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary">
                                <tr>
                                    <th scope="row" class="px-3" style="white-space: nowrap; width: 1%;">Name & Initials</th>
                                    <td class="col"> &nbsp; | &nbsp; <?= $member['member_surname_initials'] ?> </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="px-3" style="white-space: nowrap; width: 1%;">Office</th>
                                    <td class="col"> &nbsp; | &nbsp; <?= $office_info[$member['member_location']]['short'] ?> </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="px-3" style="white-space: nowrap; width: 1%;"> Reference Number </th>
                                    <td class="col"> &nbsp; | &nbsp; <?= $member['member_reference'] ?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="col-row">

                    <?php require $config['PARSERS_PATH'] . 'estates' . DS . 'table_view.php' ?>

                    <h6 class="bg-secondary text-white px-3" style="border-radius: 5px; padding: 5px;"> Assigned applicants | Executors </h6>
                    <?php if (is_array($clients) || is_object($clients)) : ?>
                        <table class="table table-striped table-sm">
                            <tbody>
                                <?php foreach ($clients as $key => $client) : ?>
                                    <tr id="memb_row_<?= $key ?>">
                                        <td class="px-3">
                                            <span> <?= ((!empty($client['name'])) ? $client['name'] . ' | ' : '') ?> <i> <?= $client['username'] ?> </i> </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h6 class="text-danger"> There is no data to display </h6>
                    <?php endif; ?>
                </div>
                <br>
            </div>
        <?php elseif ($member != null && $user_type == 'client') : ?>

        <?php endif; ?>

    </div>
</div>