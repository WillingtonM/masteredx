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

        <div class="row">

            <div class="tab-content col-12" style="padding: 25px 0;">

                <nav aria-label="breadcrumb border-radius-xl">
                    <ol class="breadcrumb px-3 shadow-sm" style="border-radius: 15px">
                        <li class=" breadcrumb-item font-weight-bolder"><a class="def_text" href="articles">Articles</a></li>
                        <li class="breadcrumb-item font-weight-bolder active" aria-current="page">Blog</li>
                    </ol>
                </nav>

                <div class="tab-pane active" id="article" role="tabpanel" aria-labelledby="article-tab">
                    <div class="row mb-3">
                        <?php
                        $artcle_cnt       = 0;
                        $key_article      = 'blog';

                        ?>
                        <?php require $config['PARSERS_PATH'] . 'articles' . DS . 'article_logic.php'; ?>
                        <br><br>
                    </div>
                    <div class="row">
                        <!-- paggination -->
                        <?php require $config['PARSERS_PATH'] . 'articles' . DS . 'article_pagination.php'; ?>
                    </div>
                </div>


            </div>

        </div>

    <?php endif; ?>

    <br><br>

</div>