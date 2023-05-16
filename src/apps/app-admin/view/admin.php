<div class="container px-2">

    <nav aria-label="breadcrumb mb-0">
        <ol class="breadcrumb px-3 shadow-sm" style="border-radius: 15px">
            <li class="breadcrumb-item font-weight-bolder"><a class="def_text" href="#">Company and Offices</a></li>
            <li class="breadcrumb-item font-weight-bolder active" aria-current="page">Manage</li>
        </ol>
    </nav>
    <div class="row shadow p-3 mb-5 bg-white border-radius-xl/" style="border-radius: 15px;">

        <div class="col-12 mb-3">
            <button type="button" class="btn btn-secondary shadow-none border-radius-lg me-3" onclick="requestModal(post_modal[25], post_modal[25], {'type':'company'})"> <?= (isset($company) && !empty($company)) ? 'Edit':'Add' ?> Company </button>
            <button type="button" class="btn btn-secondary shadow-none border-radius-lg" onclick="requestModal(post_modal[25], post_modal[25], {'type':'office'})"> Add Office </button>
        </div>

        <h6 class="mb-3"> Company Offices </h6>
        <div class="col-12 p-0 mb-3">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr class="">
                        <th scope="col" class="px-2 font-weight-bolder"> Office </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($offices)): ?>
                        <?php $count = 0 ?>
                        <?php foreach ($offices as $key => $offc) : ?>
                            <?php $count++ ?>
                            <tr>
                                <td> <span> <?= ((!empty($offc['office_name'])) ? $offc['office_name'] : '') ?> </span> </td>
                                <td>
                                    <a class="float-end me-3 cursor-pointer" type="button" onclick="requestModal(post_modal[25], post_modal[25], {'type':'office', 'office':<?= $offc['office_id'] ?>})"> <i class="fa-solid fa-pen-to-square me-1"></i> Edit </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

    <nav aria-label="breadcrumb mb-0">
        <ol class="breadcrumb px-3 shadow-sm" style="border-radius: 15px">
            <li class="breadcrumb-item font-weight-bolder"><a class="def_text" href="#">Admin</a></li>
            <li class="breadcrumb-item font-weight-bolder" aria-current="page">Manage</li>
            <li class="breadcrumb-item font-weight-bolder active" aria-current="page">Practice Areas</li>
        </ol>
    </nav>
    <div class="row shadow p-3 mb-5 bg-white border-radius-xl/" style="border-radius: 15px;">

        <div class="col-12 mb-3">
            <button type="button" class="btn btn-secondary shadow-none border-radius-lg" onclick="requestModal(post_modal[23], post_modal[23])"> Add Practice Area </button>
        </div>

        <!-- <h6 class="mb-3"> Practice Areas </h6> -->
        <div class="col-12 p-0 mb-3">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr class="">
                        <th scope="col" class="px-2 font-weight-bolder">Practice Areas </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($practices)): ?>
                        <?php $count = 0 ?>
                        <?php foreach ($practices as $key => $practice) : ?>
                            <?php $count++ ?>
                            <tr>
                                <td> <span> <?= ((!empty($practice['practice_area'])) ? $practice['practice_area'] : '') ?> </span> </td>
                                <td>
                                    <a class="float-end me-3 cursor-pointer" type="button" onclick="requestModal(post_modal[23], post_modal[23], {'practice':<?= $practice['practice_area_id'] ?>})"> <i class="fa-solid fa-pen-to-square me-1"></i> Edit </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

     <nav aria-label="breadcrumb mb-0">
        <ol class="breadcrumb px-3 shadow-sm" style="border-radius: 15px">
            <li class="breadcrumb-item font-weight-bolder"><a class="def_text" href="#">Admin</a></li>
            <li class="breadcrumb-item font-weight-bolder" aria-current="page">Manage</li>
            <li class="breadcrumb-item font-weight-bolder active" aria-current="page">Practice Tasks</li>
        </ol>
    </nav>
    <div class="row shadow p-3 mb-5 bg-white border-radius-xl/" style="border-radius: 15px;">

        <h5 class="mb-3 text-center font-weight-bolder"> Practice Tasks </h5>
        <hr class="horizontal dark my-1">

        <div class="col-12 mb-2 px-2">
            <button class="btn btn-secondary shadow-none border-radius-lg" onclick="requestModal(post_modal[24], post_modal[24])"> Add Practice Tasks </button>
        </div>

        <div class="col-12 p-0 mb-3">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                        <?php $tabbs_count = 0 ?>
                        <?php if ( is_array($practices) || is_object($practices)) : ?>
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
                <?php if ( is_array($practices) || is_object($practices)) : ?>
                    <?php $array_count = 0; ?>
                    <?php foreach ($practices as $key => $tabs) : ?>
                        <?php $array_count++; ?>
                        <?php $practice_tasks = get_practice_tasks_by_practice($tabs['practice_area_id']) ?>
                        <div class="tab-pane fade <?= (((isset($_GET['tab']) && $_GET['tab'] == $key) || (!isset($_GET['tab']) && $array_count == 1)) ? 'show active' : '') ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>-tab">
                            <?php require $config['PARSERS_PATH'] . 'settings' . DS . 'task_table.php'; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

        </div>

    </div>

    <nav aria-label="breadcrumb mb-0">
        <ol class="breadcrumb px-3 shadow-sm" style="border-radius: 15px">
            <li class=" breadcrumb-item font-weight-bolder"><a class="def_text" href="#">Admin</a></li>
            <li class="breadcrumb-item font-weight-bolder active" aria-current="page">Data Migration</li>
        </ol>
    </nav>
    <div class="row shadow p-3 mb-5 bg-white border-radius-xl/" style="border-radius: 15px;">

        <h6 class="mb-3"> Sample file structure </h6>
        <div id="data_temp_err" class="col-12 px-3 py-2"></div>
        <div class="col-12 mb-3">
            <?php if ( is_array($practices) || is_object($practices)) : ?>
                <?php foreach ($practices as $key => $pract) : ?>
                    <?php $file_name      = ((isset($pract['practice_area_slug']) && !empty($pract['practice_area_slug']) ? $pract['practice_area_slug'] : '')) . '-template.xlsx'; ?>
                    <?php $file_download  = DS . ABS_MIGRATIONS_DOCS . $file_name; ?>
                    <a type="button" class="btn btn-secondary shadow-none border-radius-lg me-2" onclick="postCheck('data_temp_err', {'form_type':'data_template', 'practice_area':<?= $pract['practice_area_id'] ?>}, 0); return;">  
                        <span> Download <?= $pract['practice_area'] ?> Data </span>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <h6 class="mt-4 mb-3"> Migrate from file </h6>
        
        <form id="product_form_img" class="col-12 mb-3/">
            <div class="input-group mb-3">
				<div class="custom-file">
					<input type="file" class="form-control border w-100" name="data_file" id="file_doc" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
				</div>
			</div>
        </form>

        <form id="mediaForm" class="col-12 mb-3/ bg-light border-radius-xl">
            <input type="hidden" class="form-control border w-100" name="form_type" value="dasesed_estate_data">
            <div class="col-auto contact_radio mb-3 px-3/"><br>
                <label for="practice_area" class="text-secondary">Choose Practice Area to upload </label> <br>
                <?php $count = 0 ?>
                <?php if ( is_array($practices) || is_object($practices)) : ?>
                    <?php foreach ($practices as $key => $pract) : ?>
                        <?php $count++ ?>
                        <div class="form-check form-check-inline me-3">
                            <input class="form-check-input me-2" type="radio" name="practice_area" id="reasonRadio<?= $count ?>" value="<?= $pract['practice_area_id'] ?>" <?= (( $count == 1 ) ? 'checked' : '') ?>>
                            <label class="custom-control-label text-muted" for="reasonRadio<?= $count ?>"><?= $pract['practice_area'] ?></label>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </form>

        <div class="col-12">
            <div class="row px-3 mt-3 py-2" id="error_pop"></div>
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-secondary shadow-none btn-sm/ border-radius-lg" onclick="media_post()"> <i class="fa-solid fa-upload me-2"></i> Upload Document </button>
                </div>
            </div>
        </div>

        <h6 class="mt-4 mb-3"> Download data </h6>

        <div id="data_err" class="col-12 px-3 py-2"></div>

        <div class="col-12">
            <?php if ( is_array($practices) || is_object($practices)) : ?>
                <?php foreach ($practices as $key => $nav) : ?>
                    <a type="button" class="btn btn-danger shadow-none border-radius-lg me-2" onclick="postCheck('data_err', {'form_type':'data_download', 'practice_area':<?= $nav['practice_area_id'] ?>}, 0); return;">  
                        <span> Download <?= $nav['practice_area'] ?> Data </span>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>

</div>
