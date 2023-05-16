   <div class="container pt-10 min-vh-100">

       <div class="page-header min-height-300 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
           <span class="mask opacity-6/" style="background-color: rgb(0, 0, 0, .3); ">
               <div class="p-0">
                   <div class="text-center p-3 pt-5">
                       <h3 class="font-weight-bolder text-white"><i class="me-2">Our</i> <span class="text-warning"> Subsidiaries </span></h3>
                       <small class="m-0 text-light">
                           Below are our subsidiary companies, you may visit the sites to see our wide range of service.
                       </small>
                   </div>
               </div>
           </span>
       </div>

       <div class="mx-4 mt-n6 overflow-hidden/">
           <div class="row text-center">

               <?php foreach ($subsidiaries_navba as $home_key => $home_val) : ?>

                   <div style="z-index: 12;" class="col-12 col-sm-6/ col-md-4 p-2 h-200 wait-<?= $home_val['wait'] ?>s" data-animation="animated <?= $home_val['anim'] ?>">

                       <div class="card_work_home p-0">
                           <div class="text-center w-100 home_card p-3">
                               <a class="w-100 text-center p-3 text-white" href="<?= $home_val['link'] ?>" target="_blank">
                                   <img src="./img/home/<?= $home_val['imgs'] ?>" height="70" alt="">
                               </a>
                           </div>
                           <div class="card-body p-3">
                               <p class="text-gradient text-dark mb-2 text-sm">
                                   <span class="font-weight-bolder fs-6"> <?= $home_val['short'] ?> </span> <br>
                               </p>

                               <button onclick="window.open('<?= $home_val['link'] ?>', '_blank');" class="btn btn-outline-dark/ btn-dark btn-sm mb-0 border-radius-lg px-4/ py-1/ text-white"> Visit Site </button>
                           </div>
                       </div>

                   </div>
               <?php endforeach; ?>

           </div>
       </div>

   </div>