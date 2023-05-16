   <div id="about_div" class="container pt-10  min-vh-100">
    
       <div class="page-header min-height-300 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
           <span class="mask opacity-6/" style="background-color: rgb(0, 0, 0, .3); ">

               <div class="p-0">
                   <div class="text-center py-3 pt-5">
                       <h3 class="abt_h3/ text-gradient/ text-white" style="font-weight: bolder;"> <span class="text-warning"> Resources </span> </h3>
                       <small class="m-0 text-light">
                           <span class="fs-4">"</span><?= PROJECT_TITLE ?> Public resources<span class="fs-4">"</span>
                       </small>
                   </div>
               </div>
           </span>
       </div>

       <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden bg-white" style="border-radius: 20px;">

           <div class="row gx-4">
               <div class="col-12 hover_inimate">
                   <div class="h-100 wait-1s" data-animation="animated pulse">
                       <div class="card-body p-3">
                           <div class="row">

                               <?php foreach ($resources_navba as $nav_key => $nav_val) : ?>
                                   <div id="<?= $nav_key ?>" class="col-12 mb-xl-0 mb-4 border-radius-lg p-3 mb-5">
                                       <h3 class="abt_h3 px-2 text-gradient text-dark" style="font-weight: bolder;"> <?= $nav_val['short'] ?> </h3>

                                       <div class="w-100 mb-xl-0 mb-4 border-radius-lg p-3 px-2">

                                           <?php require_once $config['PARSERS_PATH'] . 'resources' . DS . $nav_key . '.php' ?>

                                       </div>
                                   </div>
                               <?php endforeach; ?>

                           </div>
                       </div>
                   </div>
               </div>

           </div>

       </div>
   </div>