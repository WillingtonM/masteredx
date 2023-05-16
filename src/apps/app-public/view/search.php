<div class="container pt-10 min-vh-100">

  <div class="row">
    <div id="contact_div/" class="col-12" style="min-height: 100vh;">
      <br>

      <nav aria-label="breadcrumb border-radius-xl">
        <ol class="breadcrumb px-3 shadow-sm" style="border-radius: 15px">
          <li class=" breadcrumb-item font-weight-bolder"><a class="def_text" href="articles">Search results for</a></li>
          <li class="breadcrumb-item font-weight-bolder active" aria-current="page"> <i class="text-warning">"<?= $search ?>"</i> </li>
        </ol>
      </nav>

      <div class="row">
        <?php
        if (is_array($req_res) || is_object($req_res)) :
          foreach ($req_res as $key => $value) :
            $artcle_cnt++;
            $artcl_date       = DateTime::createFromFormat('Y-m-d H:i:s', $value['article_publish_date']);
            $cnt_res          = get_article_visits_count($value['article_id']);

            if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
              $article_link   = 'blog-article?article_id=' . (int) $value['article_id'] . '&type=' . $value['article_type'];
            } else {
              $article_link   = 'article?article=' . $slugify->slugify($value['article_title']) . '&slgid=' . $value['article_id'] . '&type=' . $value['article_type'];
            }
            require $config['PARSERS_PATH'] . 'articles' . DS . 'article.php';
          endforeach;
        endif;
        ?>
      </div>

    </div>
  </div>
</div>