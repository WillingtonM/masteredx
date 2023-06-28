<div>

    <nav aria-label="breadcrumb mb-0">
        <ol class="breadcrumb px-3 shadow-sm" style="border-radius: 15px">
            <li class=" breadcrumb-item font-weight-bolder"><a class="def_text" href="#">Users</a></li>
            <li class="breadcrumb-item font-weight-bolder active" aria-current="page">Profile</li>
        </ol>
    </nav>
    <div class="row shadow p-3 mb-5 bg-white border-radius-xl/" style="border-radius: 15px;">
        <h6> User profile/Biography </h6>


        <form id="userForm" class="form-horizontal" action="includes/action/create_product.php" method="POST" enctype="multipart/form-data">

            <div class="rounded-0/">
                <div class="p-0">
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
                <input type="hidden" name="user" value="<?= $user_id ?>">

                <div id="error_pop" class="col-12 px-3"></div>

                <div class="col-12 mb-3 px-3">
                    <div id="error_pop" class="error_pop mb-3"></div>
                    <button type="button" class="btn btn-sm btn-secondary px-3 shadow-none" style="border-radius: 11px;" onclick="function_tinytext_forms('userForm', 'mytextarea')">Update Profile</button>
                </div>

            </div>
        </form>


        
    </div>

</div>