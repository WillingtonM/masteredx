<div id="home-top" class="row min-vh-100" style="height: max-content;">

  <div id="carouselFade" class="carousel slide carousel-fade col-12" data-ride="carousel">
    <div class="carousel-inner">
      <!-- 1st carousel -->
      <div class="frst_crsl home_crsl1 carousel-item active" style="height: max-content;">
        <div class="text-center/">
          <div class="pad-col/" style="padding: 39px;"><br><br></div>
          <div class="work_items" style="border-radius: 0;">
            <div class="text-center right-2nd" data-animation="animated zoomInUp" style="font-size: 3.6em;">
              <div class="row pad-col" style="padding: 50px;"></div>
            </div>

            <div class="container text-center/">

              <div class="page-header min-height-300 border-radius-xl/ mt-4  wait-1s" data-animation="animated slideInDown" style="border-radius: 35px;">
                <span class="mask opacity-6/" style="background-color: rgb(41, 55, 75, .5); ">
                  <div class="p-0">
                    <div id="top_logo_text_carsl" class="text-center p-3 d-none/ d-lg-block/">
                    </div>
                    <div class="text-center p-3 pt-3/ font-size-xl">
                      <h3 class="font-weight-bolder text-white mb-4"> <span class="text-white"> Personalis<span class="text-warning">ed</span> academic tutoring services </span></h3> 
                      <h6 class="m-0 text-light px-3 font-weight-bolder">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                      </h6>
                    </div>
                  </div>
                </span>
              </div>

              <div class="mx-4 mt-n6 text-center">
                <div class="row">
                  <?php foreach ($home_array as $home_key => $home_val) : ?>
                    <div style="z-index: 12;" class="col-12 col-sm-4 col-md-4 p-2 h-200 wait-<?= $home_val['wait'] ?>s" data-animation="animated <?= $home_val['anim'] ?>">
                      <div class="card_work_home p-0">
                        <div class="text-center w-100 home_card p-3">
                          <a class="w-100 text-center p-3 text-white" href="<?= $home_val['link'] ?>">
                            <i class="<?= $home_val['font'] ?> fa-2x p-2 def_text/"></i>
                          </a>
                        </div>
                        <div class="card-body p-3">
                          <p class="text-gradient text-dark mb-2 text-sm">
                            <span class="font-weight-bolder fs-6">
                              <?= $home_val['short'] ?>
                            </span> <br>
                            <small class="">
                              <?= $home_val['long'] ?>
                            </small>
                          </p>
                          <button onclick="javascript:location.href='<?= $home_val['link'] ?>'"
                            class="btn btn-outline-dark/ btn-dark btn-sm mb-0 border-radius-lg px-4/ py-1/ text-sm text-white">
                            Learn more ... </button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>

            </div>



          </div>
        </div>
      </div>

      <!-- 2nd carousel -->
      <div class="scnd_crsl carousel-item" style="height: max-content;">
        <div class="text-center">
          <div class="pad-col/" style="padding: 39px;"><br><br></div>
          <div class="work_items" style="border-radius: 0;">
            <div class="text-center right-2nd"  style="font-size: 3.6em;">
              <div class="row pad-col" style="padding: 50px;"></div>
            </div>
        
            <div class="container text-center">
        
              <div class="page-header min-height-300 border-radius-xl/ mt-4  wait-1s" data-animation="animated slideInDown" style="border-radius: 35px;">
                <span class="mask opacity-6/" style="background-color: rgb(41, 55, 75, .5); ">
                  <div class="p-0">
                    <div id="top_logo_text_carsl" class="text-center p-3 d-none/ d-lg-block/">
                    </div>
                    <div class="text-center p-3 pt-3/ font-size-xl">
                      <h3 class="font-weight-bolder text-white mb-4"> <span class="text-white"> Personalis<span class="text-warning">ed</span> academic tutoring services </span></h3> 
                      <h6 class="m-0 text-light px-3 font-weight-bolder">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                      </h6>
                    </div>
                  </div>
                </span>
              </div>

              <div class="mx-4 mt-n6 text-center">
                <div class="row">
                  <?php foreach ($home_array as $home_key => $home_val) : ?>
                    <div style="z-index: 12;" class="col-12 col-sm-4 col-md-4 p-2 h-200 wait-<?= $home_val['wait'] ?>s" data-animation="animated <?= $home_val['anim'] ?>">
                      <div class="card_work_home p-0">
                        <div class="text-center w-100 home_card p-3">
                          <a class="w-100 text-center p-3 text-white" href="<?= $home_val['link'] ?>">
                            <i class="<?= $home_val['font'] ?> fa-2x p-2 def_text/"></i>
                          </a>
                        </div>
                        <div class="card-body p-3">
                          <p class="text-gradient text-dark mb-2 text-sm">
                            <span class="font-weight-bolder fs-6">
                              <?= $home_val['short'] ?>
                            </span> <br>
                            <small class="">
                              <?= $home_val['long'] ?>
                            </small>
                          </p>
                          <button onclick="javascript:location.href='<?= $home_val['link'] ?>'"
                            class="btn btn-outline-dark/ btn-dark btn-sm mb-0 border-radius-lg px-4/ py-1/ text-sm text-white">
                            Learn more ... </button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>

            </div>
        
        
        
          </div>
        </div>
      </div>

      <!-- 3rd carousel -->
      <div class="thrd_crsl carousel-item" style="width: 100%; height: max-content;">

        <div class="text-center">
          <div class="pad-col/" style="padding: 39px;"><br><br></div>
          <div class="work_items" style="border-radius: 0;">
            <div class="text-center right-2nd"  style="font-size: 3.6em;">
              <div class="row pad-col" style="padding: 50px;"></div>
            </div>
        
            <div class="container text-center">
        
              <div class="page-header min-height-300 border-radius-xl/ mt-4  wait-1s" data-animation="animated slideInDown" style="border-radius: 35px;">
                <span class="mask opacity-6/" style="background-color: rgb(41, 55, 75, .5); ">
                  <div class="p-0">
                    <div id="top_logo_text_carsl" class="text-center p-3 d-none/ d-lg-block/">
                    </div>
                    <div class="text-center p-3 pt-3/ font-size-xl">
                      <h3 class="font-weight-bolder text-white mb-4"> <span class="text-white"> Personalis<span class="text-warning">ed</span> academic tutoring services </span></h3> 
                      <h6 class="m-0 text-light px-3 font-weight-bolder">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                      </h6>
                    </div>
                  </div>
                </span>
              </div>

              <div class="mx-4 mt-n6 text-center">
                <div class="row">
                  <?php foreach ($home_array as $home_key => $home_val) : ?>
                    <div style="z-index: 12;" class="col-12 col-sm-4 col-md-4 p-2 h-200 wait-<?= $home_val['wait'] ?>s" data-animation="animated <?= $home_val['anim'] ?>">
                      <div class="card_work_home p-0">
                        <div class="text-center w-100 home_card p-3">
                          <a class="w-100 text-center p-3 text-white" href="<?= $home_val['link'] ?>">
                            <i class="<?= $home_val['font'] ?> fa-2x p-2 def_text/"></i>
                          </a>
                        </div>
                        <div class="card-body p-3">
                          <p class="text-gradient text-dark mb-2 text-sm">
                            <span class="font-weight-bolder fs-6">
                              <?= $home_val['short'] ?>
                            </span> <br>
                            <small class="">
                              <?= $home_val['long'] ?>
                            </small>
                          </p>
                          <button onclick="javascript:location.href='<?= $home_val['link'] ?>'"
                            class="btn btn-outline-dark/ btn-dark btn-sm mb-0 border-radius-lg px-4/ py-1/ text-sm text-white">
                            Learn more ... </button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>

            </div>
        
          </div>
        </div>
      </div>

      <!-- 4th carousel -->
      <div class="frth_crsl carousel-item" style="height: max-content;">
        <div class="text-center">
          <div class="pad-col/" style="padding: 39px;"><br><br></div>
          <div class="work_items" style="border-radius: 0;">
            <div class="text-center right-2nd"  style="font-size: 3.6em;">
              <div class="row pad-col" style="padding: 50px;"></div>
            </div>
        
            <div class="container text-center">
        
              <div class="page-header min-height-300 border-radius-xl/ mt-4  wait-1s" data-animation="animated slideInDown" style="border-radius: 35px;">
                <span class="mask opacity-6/" style="background-color: rgb(41, 55, 75, .5); ">
                  <div class="p-0">
                    <div id="top_logo_text_carsl" class="text-center p-3 d-none/ d-lg-block/">
                    </div>
                    <div class="text-center p-3 pt-3/ font-size-xl">
                      <h3 class="font-weight-bolder text-white mb-4"> <span class="text-white"> Personalis<span class="text-warning">ed</span> academic tutoring services </span></h3> 
                      <h6 class="m-0 text-light px-3 font-weight-bolder">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                      </h6>
                    </div>
                  </div>
                </span>
              </div>

              <div class="mx-4 mt-n6 text-center">
                <div class="row">
                  <?php foreach ($home_array as $home_key => $home_val) : ?>
                    <div style="z-index: 12;" class="col-12 col-sm-4 col-md-4 p-2 h-200 wait-<?= $home_val['wait'] ?>s" data-animation="animated <?= $home_val['anim'] ?>">
                      <div class="card_work_home p-0">
                        <div class="text-center w-100 home_card p-3">
                          <a class="w-100 text-center p-3 text-white" href="<?= $home_val['link'] ?>">
                            <i class="<?= $home_val['font'] ?> fa-2x p-2 def_text/"></i>
                          </a>
                        </div>
                        <div class="card-body p-3">
                          <p class="text-gradient text-dark mb-2 text-sm">
                            <span class="font-weight-bolder fs-6">
                              <?= $home_val['short'] ?>
                            </span> <br>
                            <small class="">
                              <?= $home_val['long'] ?>
                            </small>
                          </p>
                          <button onclick="javascript:location.href='<?= $home_val['link'] ?>'"
                            class="btn btn-outline-dark/ btn-dark btn-sm mb-0 border-radius-lg px-4/ py-1/ text-sm text-white">
                            Learn more ... </button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- 5th carousel -->
      <div class="frth_crsl carousel-item" style="height: max-content;">
        <div class="text-center">
          <div class="pad-col/" style="padding: 39px;"><br><br></div>
          <div class="work_items" style="border-radius: 0;">
            <div class="text-center right-2nd"  style="font-size: 3.6em;">
              <div class="row pad-col" style="padding: 50px;"></div>
            </div>
        
            <div class="container text-center">
        
              <div class="page-header min-height-300 border-radius-xl/ mt-4  wait-1s" data-animation="animated slideInDown" style="border-radius: 35px;">
                <span class="mask opacity-6/" style="background-color: rgb(41, 55, 75, .5); ">
                  <div class="p-0">
                    <div id="top_logo_text_carsl" class="text-center p-3 d-none/ d-lg-block/">
                    </div>
                    <div class="text-center p-3 pt-3/ font-size-xl">
                      <h3 class="font-weight-bolder text-white mb-4"> <span class="text-white"> Personalis<span class="text-warning">ed</span> academic tutoring services </span></h3> 
                      <h6 class="m-0 text-light px-3 font-weight-bolder">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                      </h6>
                    </div>
                  </div>
                </span>
              </div>

              <div class="mx-4 mt-n6 text-center">
                <div class="row">
                  <?php foreach ($home_array as $home_key => $home_val) : ?>
                    <div style="z-index: 12;" class="col-12 col-sm-4 col-md-4 p-2 h-200 wait-<?= $home_val['wait'] ?>s" data-animation="animated <?= $home_val['anim'] ?>">
                      <div class="card_work_home p-0">
                        <div class="text-center w-100 home_card p-3">
                          <a class="w-100 text-center p-3 text-white" href="<?= $home_val['link'] ?>">
                            <i class="<?= $home_val['font'] ?> fa-2x p-2 def_text/"></i>
                          </a>
                        </div>
                        <div class="card-body p-3">
                          <p class="text-gradient text-dark mb-2 text-sm">
                            <span class="font-weight-bolder fs-6">
                              <?= $home_val['short'] ?>
                            </span> <br>
                            <small class="">
                              <?= $home_val['long'] ?>
                            </small>
                          </p>
                          <button onclick="javascript:location.href='<?= $home_val['link'] ?>'"
                            class="btn btn-outline-dark/ btn-dark btn-sm mb-0 border-radius-lg px-4/ py-1/ text-sm text-white">
                            Learn more ... </button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>

            </div>
        
          </div>
        </div>
      </div>

      <!-- 6th carousel -->
      <div class="frth_crsl carousel-item" style="height: max-content;">
        <div class="text-center">
          <div class="pad-col/" style="padding: 39px;"><br><br></div>
          <div class="work_items" style="border-radius: 0;">
            <div class="text-center right-2nd"  style="font-size: 3.6em;">
              <div class="row pad-col" style="padding: 50px;"></div>
            </div>
        
            <div class="container text-center">
        
              <div class="page-header min-height-300 border-radius-xl/ mt-4  wait-1s" data-animation="animated slideInDown" style="border-radius: 35px;">
                <span class="mask opacity-6/" style="background-color: rgb(41, 55, 75, .5); ">
                  <div class="p-0">
                    <div id="top_logo_text_carsl" class="text-center p-3 d-none/ d-lg-block/">
                    </div>
                    <div class="text-center p-3 pt-3/ font-size-xl">
                      <h3 class="font-weight-bolder text-white mb-4"> <span class="text-white"> Personalis<span class="text-warning">ed</span> academic tutoring services </span></h3> 
                      <h6 class="m-0 text-light px-3 font-weight-bolder">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                      </h6>
                    </div>
                  </div>
                </span>
              </div>

              <div class="mx-4 mt-n6 text-center">
                <div class="row">
                  <?php foreach ($home_array as $home_key => $home_val) : ?>
                    <div style="z-index: 12;" class="col-12 col-sm-4 col-md-4 p-2 h-200 wait-<?= $home_val['wait'] ?>s" data-animation="animated <?= $home_val['anim'] ?>">
                      <div class="card_work_home p-0">
                        <div class="text-center w-100 home_card p-3">
                          <a class="w-100 text-center p-3 text-white" href="<?= $home_val['link'] ?>">
                            <i class="<?= $home_val['font'] ?> fa-2x p-2 def_text/"></i>
                          </a>
                        </div>
                        <div class="card-body p-3">
                          <p class="text-gradient text-dark mb-2 text-sm">
                            <span class="font-weight-bolder fs-6">
                              <?= $home_val['short'] ?>
                            </span> <br>
                            <small class="">
                              <?= $home_val['long'] ?>
                            </small>
                          </p>
                          <button onclick="javascript:location.href='<?= $home_val['link'] ?>'"
                            class="btn btn-outline-dark/ btn-dark btn-sm mb-0 border-radius-lg px-4/ py-1/ text-sm text-white">
                            Learn more ... </button>
                        </div>
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

  </div>

</div>