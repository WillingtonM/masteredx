   <div id="services_div" class="container pt-10 min-vh-100">
    
       <div class="page-header min-height-300 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
           <span class="mask" style="background-color: rgb(41, 55, 75, .9);">
               <div class="p-0">
                   <div class="text-center px-3 pt-5">
                       <h3 class="font-weight-bolder text-white"><i class="me-2">Our</i> <span class="text-warning"> Services </span></h3>
                       <small class="m-0 text-light">
                           At MasteredX, we are committed to empowering learners with comprehensive and effective educational support services. <br>
                           We are excited to announce our latest offering, Saturday Subject Learning Classes, Exam Preparation Webinars, Workshops and Online Tutoring, <br>
                           designed to provide dedicated learning opportunities to help students master their subjects and achieve academic success.
                       </small>
                   </div>
               </div>
           </span>
       </div>

       <div class="mx-4 mt-n6 overflow-hidden/">
           <div class="row">
               <?php foreach ($services_navba as $nav_key => $nav_val) : ?>
                   <div id="service_<?= $nav_key ?>" class="col-12 col-sm-6 col-md-3 p-2 h-200 hover_inimate">
                       <div class="card card-blog bg-white text-center wait-<?= $nav_val['wait'] ?>s" data-animation="animated <?= $nav_val['anim'] ?>" style="border-radius: 35px 35px 20px 20px;">
                           <div class="position-relative">
                               <a class="d-block">
                                   <img src="./img/services/<?= $nav_key ?>.jpg" alt="<?= $nav_val['short'] ?>" class="img-fluid" style="border-radius: 35px 35px 0 0; ">
                               </a>
                           </div>
                           <div class="card-body p-3">
                               <p class="text-gradient text-dark mb-2 text-sm">
                                   <span class="font-weight-bolder fs-6"> <?= $nav_val['short'] ?> </span> <br>
                                   <small class=""> <?= $nav_val['long'] ?> </small>
                               </p>

                               <button type="button" class="btn btn-outline-dark/ btn-dark btn-sm mb-0 border-radius-lg" onclick="requestModal( post_modal[13], post_modal[13], {'service':'<?= $nav_key ?>'})">View Details</button>
                           </div>
                       </div>
                   </div>
               <?php endforeach; ?>
           </div>
       </div>

   </div>