<?php require_once $config['PARSERS_PATH'] . 'modal' . DS . 'header.php'; ?>

<div id="contactModal" class="row">

    <form id="userForm" class="form-horizontal" action="includes/action/create_product.php" method="POST" enctype="multipart/form-data">

        <div class="rounded-0/">
            <div class="col-12/ p-0">
                <br>
                <div class="text-center py-2">
                    <h3 class="text_default" style="font-weight: bolder;"> <?= ( isset($user) && !empty($user)) ? $user['name'] .'s': '' ?> Profile </h3>
                    <small class="m-0 alt2_color" style="font-weight: 600; font-size:medium;"> Edit the user's profile </small>
                </div>
            </div>
            <br>
            
            <div class="col-auto">
                <div id="" class="">
                    <textarea id="mytextarea" class="form-control shadow-none" name="" rows="8" cols="100" placeholder="User profile/bio" style="border-radius: none !important; width:100% !important"><?= (($user['user_description']) ? $user['user_description'] : '') ?></textarea>
                </div>
            </div>

            <input type="hidden" name="form_name" value="user_profile">
            <div class="col-12 mb-3 px-3">
                <div id="error_pop" class="error_pop mb-3"></div>
                <button type="button" class="btn btn-sm btn-secondary px-3 shadow-none" style="border-radius: 11px;" onclick="function_tinytext_forms('userForm', 'mytextarea')">Update Profile</button>
            </div>

        </div>
    </form>

</div>

<?php require_once $config['PARSERS_PATH'] . 'modal' . DS . 'footer.php' ?>


<script>
    function function_tinytext_form_edit(form_id, input_id) {
        var html_id = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'null';
        var content = encodeURIComponent(tinyMCE.get(input_id).getContent());
        var data_1 = $('#' + form_id).serialize();
        data_1 = post_data_default + '&' + data_1;
        data_1 = data_1 + '&article_content=' + content;
        postCheck(html_id, data_1, 0, true);
    }
</script>