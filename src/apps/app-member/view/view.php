<div class="container-fluid border-radius-xl bg-white p-0" style="min-height: 86vh;">

    <?php if ($member != null): ?>
        <div class="row">
            <div id="home-first" class="col-12 text-center mt-4 mb-2">
                <h3 class="text-secondary" style="font-weight: normal;">
                    <span> Estate information for <b class="alt_dflt"><?= $member['member_surname_initials'] ?></b> </span>
                </h3>
            </div>
        </div>

        <div class="px-0 mb-3 bg-white rounded" style="border-radius: 15px !important;">

            <h3 class="p-2"></h3>
            <div class="col-row">
                <?php require $config['PARSERS_PATH'] . 'estates' . DS . 'table_view.php' ?>
            </div>
            <br>
        </div>
    <?php endif; ?>
</div>