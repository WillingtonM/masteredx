   <div id="contact_elem" class="container pt-10 min-vh-100">
       <div class="page-header min-height-300 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
           <span class="mask opacity-6" style="background-color: rgb(41, 55, 75, .5); ">

               <div class="p-0">
                   <div class="text-center py-3 pt-5">
                       <h3 class="font-weight-bolder text-white"> <i class="me-2">Our</i> <span class="text-warning"> Tutors </span> </h3>
                       <small class="m-0 text-light">
                           <?= PROJECT_TITLE ?> prides itself on its amazing, smart, spirited, hardworking, dynamic, and flexible working culture. <br> Feel free to get in touch with any of our tutors.
                       </small>
                   </div>
               </div>
           </span>
       </div>

       <div class="card card-body/ blur shadow-blur mx-4 mt-n6 overflow-hidden bg-white" style="border-radius: 20px;">

           <div class="row gx-4">
               <div class="col-12 col-xl-8">

                   <div class="h-100">
                       <div class="card-header/ pb-0 p-3">
                           <h6 class="mb-1 px-2">Meet our Tutors</h6>
                           <p class="text-sm px-2">Feel free to get in touch with any of our awesome tutors</p>
                       </div>
                       <div class="card-body p-3">
                           <div class="row">
                               <?php if (isset($users_arr) && is_array($users_arr)) : ?>
                                   <?php foreach ($users_arr as $user) : ?>
                                       <?php if ($user['user_type_id'] == 1) continue ?>
                                       <div id="<?= $user['username'] ?>" class="col-12 col-md-4 mb-xl-0 mb-4 hover_inimate">
                                           <div class="card card-blog card-plain wait-1s" data-animation="animated pulse">
                                               <div class="position-relative">
                                                   <a class="d-block shadow-xl border-radius-xl" onclick="requestModal(post_modal[27], post_modal[27], {'user':<?= $user['user_id'] ?>})">
                                                       <img src="<?= img_path(ABS_USER_PROFILE, $user['user_image'], 1)  ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                                   </a>
                                               </div>
                                               <div class="card-body px-1 pb-0">
                                                   <p class="text-gradient text-dark mb-2 text-sm">
                                                       <span class="font-weight-bolder" onclick="requestModal(post_modal[27], post_modal[27], {'user':<?= $user['user_id'] ?>})"> <?= $user['name'] . ' ' . $user['last_name'] ?> </span>
                                                       <br class="m-0 p-0">
                                                       <small> <?= $user['user_position'] ?> </small>

                                                       <?php if (!empty($user['social_media_in'])) : ?>
                                                           <a href="<?= $user['social_media_in'] ?>" class="float-end me-2"> <i class="fa-brands fa-linkedin"></i> </a>
                                                       <?php endif; ?>

                                                       <?php if (!empty($user['social_media_tw'])) : ?>
                                                           <a href="<?= $user['social_media_tw'] ?>" class="float-end me-2"> <i class="fa-brands fa-twitter"></i> </a>
                                                       <?php endif; ?>

                                                       <a href="mailto:<?= $user['email'] ?>" class="float-end me-2"> <i class="fa-solid fa-envelope-open-text"></i> </a>
                                                       <a href="tel:<?= $user['contact_number'] ?>" class="float-end me-2"> <i class="fa-solid fa-phone-volume"></i> </a>
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

               <div id="get_in_touch" class="col-12 col-xl-4 hover_inimate">
                   <div class="card/ h-100 wait-1s bg-dark" data-animation="animated/ pulse/">

                       <div class="card-body p-3">
                           <h3 class="abt_h3 px-4 py-3 text-white" style="font-weight: bolder;"> Services </h3>

                           <ul class="list-group list-group-flush">

                               <?php foreach ($services_navba as $nav_key => $nav_val) : ?>
                                   <li class="list-group-item" style="background: none !important;">
                                       <a class="w-100 py-3 bg-none text-white" href="services?tab=<?= $nav_key ?>">
                                           <div class="d-flex align-items-center">
                                               <div class="flex-shrink-0 text-center">
                                                   <i class="<?= $nav_val['imgs'] ?> fa-2x"></i>
                                               </div>
                                               <div class="flex-grow-1 ms-3">
                                                   <p class="p-0 m-0 text-xs"><?= $nav_val['short'] ?></p>
                                                   <small class="text-xxs"> <?= $nav_val['long'] ?> </small>
                                               </div>
                                           </div>
                                       </a>
                                   </li>
                               <?php endforeach; ?>
                           </ul>


                           <div class="col-12 text-center">
                               <br><br>
                               <small class="text-light" style="font-size: .8rem;">
                                   <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua -->
                               </small>
                           </div>

                       </div>
                   </div>
               </div>

           </div>


       </div>
   </div>