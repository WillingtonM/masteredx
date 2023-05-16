<div class="col-12">
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                <?php $tabbs_count = 0 ?>
                <?php if (is_array($practices) || is_object($practices)) : ?>
                <?php foreach ($practices as $key => $nav) : ?>
                    <?php $tabbs_count++ ?>
                    <li class="shadow nav-item font-weight-bold article_nav m-1 <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'article_active' : '') ?>">
                        <a get-variable="tab" data-name="<?= $key ?>" class="nav-link <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'active' : '') ?>" id="pills-<?= $key ?>-tab" data-bs-toggle="pill" href="#pills-<?= $key ?>" role="tab" aria-controls="pills-<?= $key ?>" aria-selected="<?= (((isset($_GET['tab']) && $_GET['tab'] == $key)  || empty($_GET['tab'])) ? 'true' : 'false') ?>">
                            <span class="border-weight-bolder"> <?= $nav['practice_area'] ?> </span>
                        </a>
                    </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    
    <div class="tab-content col-12" style="padding: 25px 0;">

        <?php $array_count = 0; ?>
        <?php if (is_array($practices) || is_object($practices)) : ?>
        <?php foreach ($practices as $key => $tabs) : ?>
            <?php $array_count++; ?>
            <?php $practice_tasks = get_practice_tasks_by_practice($tabs['practice_area_id']) ?>
            <div class="tab-pane fade <?= (((isset($_GET['tab']) && $_GET['tab'] == $key) || (!isset($_GET['tab']) && $array_count == 1)) ? 'show active' : '') ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>-tab">
                <div class="col-12 mb-4" style="border-radius: 15px; padding-top: 9px; border: 1px solid #eee">
                    <table class="table table-striped table-striped">
                        <thead>
                            <tr class="table-head">
                                <th class="px-3" scope="col"> Task </th>
                                <th class="px-3" scope="col"> Completion Date </th>
                            </tr>
                        </thead>
                        <tbody class="text-secondary">
                        <?php if (is_array($practice_tasks) || is_object($practice_tasks)) : ?>
                        <?php foreach ($practice_tasks as $key => $prac_task) : ?>
                            <?php $task = get_activity_tasks_by_practice_task($member_id, $prac_task['practice_area_id']) ?>
                            <tr>
                                <th class="px-3" scope="row"> <?= $prac_task['practice_task_name'] ?> </th>
                                <td class="px-3"><?= ((!empty($task['consultation_date'])) ? date(PRIMARY_DATE_FORMAT, strtotime($task['consultation_date'])) : 'NA') ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>