<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php require_once $header; ?>

<body id="body-div" class="g-sidenav-show bg-gray-100 admin_body">
  <input id="token" type="hidden" name="token" value="<?= get_token(); ?>">

  <!-- <?php if (!in_array($page, $page_excludes) || $_SESSION['merchant_status'] == TRUE) : ?>
    <?php require_once $side_content; ?>
  <?php endif; ?> -->

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="main-child container p-0 m-0/">
      <?php if (!in_array($page, $page_excludes) || $_SESSION['merchant_status'] == TRUE) : ?>
      <?php require_once $navbar; ?>
    <?php endif; ?>
    </div>

    <div class="main-child container py-4 px-0" style="min-height: 100vh;">

      <?php require_once $main_content; ?>

      <div id="modalDiv" class="modalDiv" style="z-index: 99999;"></div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <?php require_once $footer; ?>
        </div>
      </footer>

    </div>

  </main>

  <!-- scripts -->
  <?php require_once $js_scripts ?>

</body>

</html>