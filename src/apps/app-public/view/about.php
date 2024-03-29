   <div id="about_div" class="container pt-10 min-vh-100">
     <div class="page-header min-height-300 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
       <span class="mask" style="background-color: rgb(41, 55, 75, .9);">

         <div class="p-0">
           <div class="text-center p-3 pt-5">
             <h3 class="abt_h3/ text-gradient/ text-white" style="font-weight: bolder;"> <i class="me-2">About</i> <span class="text-warning"><?= PROJECT_TITLE ?></span> </h3>
             <small class="m-0 text-light fs-6">
              MasteredX was founded with a deep-rooted passion for education and a commitment to empowering students.
              <br>
              Our organization was established by a group of dedicated professionals who share a common love 
              <br>
              for imparting knowledge and helping learners succeed in their studies
             </small>
           </div>
         </div>
       </span>
     </div>

     <div class="mx-2 mt-n6 overflow-hidden mb-5" style="border-radius: 20px;">

       <div class="row gx-4 p-3">

         <div class="col-12 mb-3" style="z-index: 10 !important;">
           <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
             <?php $tabbs_count = 0 ?>
             <?php foreach ($about_navba as $key => $nav) : ?>
               <?php $tabbs_count++ ?>
               <li class="shadow nav-item font-weight-bold article_nav m-1 <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'article_active' : '') ?>">
                 <a get-variable="tab" data-name="<?= $key ?>" class="nav-link <?= (((isset($_GET['tab']) && $_GET['tab'] ==  $key) || (!isset($_GET['tab']) && $tabbs_count == 1)) ? 'active' : '') ?>" id="pills-<?= $key ?>-tab" data-bs-toggle="pill" href="#pills-<?= $key ?>" role="tab" aria-controls="pills-<?= $key ?>" aria-selected="<?= (((isset($_GET['tab']) && $_GET['tab'] == $key)  || empty($_GET['tab'])) ? 'true' : 'false') ?>">
                   <span class="border-weight-bolder text-warning"> <i class="<?= $nav['imgs'] ?>"> &nbsp; </i> <?= $nav['short'] ?> </span>
                   <hr class="horizontal dark m-0 mb-0">
                   <h6 class="text-center sm_text text-xs font-weight-bold mb-0" style="color: #777;"><?= $nav['long'] ?></h6>
                 </a>
               </li>
             <?php endforeach; ?>
           </ul>
         </div>

         <div class="col-12 py-2">
           <div class="tab-content" id="notif_tab">
             <?php $array_media_count = 0; ?>
             <?php foreach ($about_navba as $key => $tabs) : ?>
               <?php $array_media_count++; ?>
               <div class="tab-pane fade px-2 <?= (((isset($_GET['tab']) && $_GET['tab'] == $key) || (!isset($_GET['tab']) && $array_media_count == 1)) ? 'show active' : '') ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>-tab">
                 <div class="row notif_content mb-3 border-radius-xl p-3 shadow card card-body/ blur shadow-blur mx-4/ mt-n6/ overflow-hidden" style="border-radius: 35px;">
                   <div class="col-12 mb-5">
                      <h3 class="abt_h3/ px-3 text-gradient/ text-center warning_dark mb-3 font-weight-bolder"> <?= $tabs['short'] ?> </h3>
                      <hr class="horizontal dark my-1">
                      <div class="w-100 mb-xl-0 mb-4 bg-dark/ text-dark border-radius-xl p-3 px-2">
                        <?php require_once $config['PARSERS_PATH'] . 'about' . DS . $key . '.php' ?>
                      </div>
                   </div>
                 </div>
               </div>
             <?php endforeach; ?>
           </div>

         </div>

       </div>
     </div>
   </div>