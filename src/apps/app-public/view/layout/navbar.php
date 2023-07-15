<div id="headnav" class="topnavbar fixed-top">
  <div class="container social_top">
    <div class="row p-3">
      <div class="social_med col-12 p-0 px-3 bg-none text-dark">
        <?php foreach ($social_media as $key => $social) : ?>
          <a class="float-end p-2" style="font-size: .9rem" href="<?= $social['link'] ?>" target="_blank"><i class="<?= $social['font'] ?> fa-2x/"></i></a>
        <?php endforeach; ?>
        <a class="float-end p-2" style="font-size: .9rem" href="mailto:info@<?= $_ENV['PROJECT_HOST'] ?>" target="_blank"> info@<?= $_ENV['PROJECT_HOST'] ?> </a>
      </div>
    </div>
    <div class="clear-fix"></div>
  </div>

  <div class="container position-sticky z-index-sticky top-0 p-0 m-0/">
    <div class="row">
      <div class="col-12 p-0 m-0">
        <!-- Navbar -->
        <nav id="navbar" class="navbar navbar-expand-lg blur blur-rounded/ top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4 position-relative" style="border-radius: 18px; height: 60px">
          <div class="container-fluid position-relative/">

            <a class="navbar-brand log-card d-none d-sm-block" href="home">
              <img id="navbar-brand-img" class="brand_light" src="<?= PROJECT_LOGO_WHITE ?>" height="30" loading="lazy" alt="<?= PROJECT_TITLE ?>">
              <img id="navbar-brand-img_" class="brand_dark" src="<?= PROJECT_LOGO ?>" height="30" loading="lazy" alt="<?= PROJECT_TITLE ?>">
            </a>

            <a class="navbar-brand log-card d-block d-sm-none" href="home">
              <img id="navbar-brand-img_x" src="<?= PROJECT_LOGO_WHITE ?>" height="30" loading="lazy" alt="<?= PROJECT_TITLE ?>">
            </a>

            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav mx-auto/ justify-content-end">
                <li class="nav-item">
                  <a class=""> &nbsp; </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav_text def_text <?= ((isset($page) && $page == "about") ? 'active nav_text_left' : '') ?>" href="about"><i class="fa-solid fa-circle-info me-1"></i> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav_text def_text <?= ((isset($page) && $page == "team") ? 'active nav_text_left' : '') ?>" href="team"><i class="fa-solid fa-chalkboard-user me-1"></i> xTeam</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav_text def_text <?= ((isset($page) && $page == "articles") ? 'active nav_text_left' : '') ?>" href="articles"><i class="fa-solid fa-newspaper me-1"></i> xFeed </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav_text def_text <?= ((isset($page) && $page == "services") ? 'active nav_text_left' : '') ?>" href="services"><i class="fa-solid fa-building me-1"></i> Services </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link nav_text def_text dropdown-toggle <?= ((isset($page) && $page == "resources") ? 'active nav_text_left' : '') ?>" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-sharp fa-regular fa-registered me-1"></i> Resources
                  </a>
                  <div class="dropdown-menu dropdown-menu-animation dropdown-menu-end dropdown-lg mt-0 mt-lg-4 p-3" aria-labelledby="navbarDropdownMenuLink" style="border-radius: 15px 15px; border: none !important;">
                    <?php $count_limit = 2; ?>
                    <?php $count = 0; ?>

                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <?php foreach ($resources_navba as $nav_key => $nav_val) : ?>
                          <?php $count++; ?>
                          <a class="w-100 px-2" href="./<?= $nav_val['link'] ?>">
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
                          <?php if ($count == $count_limit) break ?>

                        <?php endforeach; ?>
                      </div>

                      <?php $count = 0; ?>
                      <div class="col-12 col-lg-6">
                        <?php foreach ($resources_navba as $nav_key => $nav_val) : ?>
                          <?php $count++; ?>
                          <?php if ($count <= $count_limit) continue; ?>
                          <a class="w-100 px-2" href="./<?= $nav_val['link'] ?>">
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
                          <?php if ($count == 6) break ?>

                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>

                </li>
                <li class="nav-item">
                  <a class="nav-link nav_text def_text <?= ((isset($page) && $page == "contact") ? 'active nav_text_left' : '') ?>" href="contact"> <i class="fa-solid fa-address-book me-1"></i> Contact </a>
                </li>
                <li class="nav-item d-lg-none d-block">
                  <a type="button" class="nav-link nav_text def_text" onclick="requestModal(post_modal[9], post_modal[9], {})"> <i class="fa-solid fa-clipboard-question me-1"></i> Enquiry </a>
                </li>
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item ms-3">
                  <a type="button" class="nav-link btn btn-sm/ mb-0 border-radius-xl px-3 btn-dark text-white" style="color: white !important" onclick="requestModal(post_modal[9], post_modal[9], {})"> Enquiry </a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>

</div>
<div id="navbarholder" class=""></div>