   <div id="contact_elem" class="container pt-10 min-vh-100">
       <div class="page-header min-height-300 mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
           <span class="mask opacity-6" style="background-color: rgb(41, 55, 75, .5); ">

               <div class="p-0">
                   <div class="text-center py-3 pt-5">
                       <!-- <h3 class="font-weight-bolder text-white"> <i class="me-2">Our</i> <span class="text-warning"> Tutors </span> </h3> -->
                       <small class="m-0 text-white fs-5">
                           <?= PROJECT_TITLE ?> prides itself on its amazing, smart, spirited, hardworking, dynamic, and flexible working culture. <br> feel free to get in touch with our xTeam.
                       </small>
                   </div>
               </div>

           </span>
       </div>

       <div class="card/ card-body/ blur/ shadow-blur/ mx-4 mt-n6 overflow-hidden border-none" style="border-radius: 25px; background-color: rgb(41, 55, 75, .9) !important;">

           <div class="row gx-4">
               <div class="col-12">

                   <div class="h-100 text-white">
                       <div class="card-header/ pb-0 p-3 py-4 text-center">
                            <h3 class="mb-1 px-2 text-white">Meet our &nbsp; <i> <span class="text-warning">x</span>Team </i> </h5>
                            <hr class="horizontal light mt-0">
                            <p class="text-sm px-2">Feel free to get in touch with any of our awesome xTeam</p>
                       </div>
                       <div class="card-body p-3">
                           <div class="row">
                               <?php if (isset($users_arr) && is_array($users_arr)) : ?>
                                   <?php foreach ($users_arr as $user) : ?>
                                       <?php if ($user['user_type_id'] == 1) continue ?>
                                       <div id="<?= $user['username'] ?>" class="col-12 col-md-4 mb-xl-0 mb-4 hover_inimate">
                                           <div class="card card-blog card-plain wait-1s" data-animation="animated pulse">
                                               <div class="position-relative mb-0">
                                                   <a class="d-block shadow-xl border-radius-xl" onclick="requestModal(post_modal[27], post_modal[27], {'user':<?= $user['user_id'] ?>})">
                                                       <img src="<?= img_path(ABS_USER_PROFILE, $user['user_image'], 1)  ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                                   </a>
                                               </div>
                                               <div class="card-body px-1 pb-0">
                                                   <p class="text-light mb-2 text-sm px-3 py-0 m-0">
                                                       <span class="font-weight-bolder" onclick="requestModal(post_modal[27], post_modal[27], {'user':<?= $user['user_id'] ?>})"> <?= $user['name'] . ' <span class="text-warning">' . $user['last_name'] . '</span>' ?> </span>
                                                       <br class="m-0 p-0">
                                                       <small class="text-white"> <?= $user['user_position'] ?> </small>

                                                       <?php if (!empty($user['social_media_in'])) : ?>
                                                           <a href="<?= $user['social_media_in'] ?>" class="float-end me-2"> <i class="fa-brands fa-linkedin"></i> </a>
                                                       <?php endif; ?>

                                                       <?php if (!empty($user['social_media_tw'])) : ?>
                                                           <a href="<?= $user['social_media_tw'] ?>" class="float-end me-2"> <i class="fa-brands fa-twitter"></i> </a>
                                                       <?php endif; ?>

                                                       <a href="mailto:<?= $user['email'] ?>" class="float-end text-light me-2"> <i class="fa-solid fa-envelope-open-text"></i> </a>
                                                       <!-- <a href="tel:<?= $user['contact_number'] ?>" class="float-end text-light me-2"> <i class="fa-solid fa-phone-volume"></i> </a> -->
                                                   </p>

                                                   <!-- <button type="button" class="btn btn-outline-dark btn-sm mb-0 border-radius-lg" onclick="requestModal(post_modal[27], post_modal[27], {'user':<?= $user['user_id'] ?>})"> View Profile </button> -->

                                               </div>
                                           </div>
                                       </div>
                                   <?php endforeach; ?>
                               <?php endif; ?>

                           </div>
                       </div>
                   </div>
               </div>
           </div>

       </div>
   </div>