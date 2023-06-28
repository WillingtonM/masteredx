<div class="container pt-10 min-vh-100">
  
  <?php if ($data['error']) : ?>
    <div class="row">
      <div class="col-12 text-center">
        <div class="alert alert-warning">
          <h3 class="text-warning">There is Something wrong with your request</h3>
        </div>
      </div>
    </div>
  <?php else : ?>

  <div class="page-header min-height-200 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px; z-index: -10">
      <span class="mask" style="background-color: rgb(41, 55, 75, .5);">
          <div class="p-0">
              <div class="text-center py-3 pt-5">
                  <h3 class="font-weight-bolder text-white"><i class="me-2">Our</i> <span class="text-warning">x</span>Feed</h3>
                  <small class="m-0 text-light fs-5 font-weight-bolder">
                      Education Articles | Newsfeed | Blog Content | Journals 
                  </small>
              </div>
          </div>
      </span>
  </div>
  
  <div class="mx-4 mt-n6 overflow-hidden/" style="z-index: 10 !important">
      <div class="row">
          <div class="tab-content col-12 px-3" style="padding: 25px 0;">

              <?php foreach ($article_navba as $key => $article) : ?>
                  <?php $array_count++; ?>
                  <div class="tab-pane fade <?= (((isset($_GET['tab']) && $_GET['tab'] == $key) || (!isset($_GET['tab']) && $array_count == 1)) ? 'show active' : '') ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>-tab">
                      <div class="row">
                        <?php require $config['PARSERS_PATH'] . 'articles' . DS . 'article_logic.php'; ?>
                        <br><br>
                      </div>
                      <div class="row clearfix">
                        <!-- paggination -->
                        <?php require $config['PARSERS_PATH'] . 'articles' . DS . 'article_pagination.php'; ?>
                      </div>
                  </div>
              <?php endforeach; ?>

          </div>
      </div>
  </div>

  <?php endif; ?>

  <br><br>

</div>