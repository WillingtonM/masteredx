<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0"></script>

<script src="https://platform.linkedin.com/in.js" type="text/javascript">
  lang: en_US
</script>
<div class="container min-vh-100">
  <div class="pad-col pt-10"></div>

  <?php if ($req_res == null) : ?>
    <div class="row pt-5">
      <div class="col-12 bg-white border-radius-xl shadow">
        <br>
        <h6 class="text-center font-weight-normal">This link is inconsistent</h6>
        <br>
      </div>
    </div>
  <?php elseif (is_array($req_res) && !$req_res['article_status']) : ?>
    <div class="row pt-5">
      <div class="col-12 bg-white border-radius-xl shadow">
        <br>
        <h6 class="text-center font-weight-normal">This article has been removed!</h6>
        <br>
      </div>
    </div>
  <?php else : ?>

    <div class="row">
      <div class="bg-white shadow border-radiuss-xl col-12" style="padding-top: 25px; border-radius: 25px;">

        <div class="row text-center" style="padding-top: 7px !important;">
          <div class="col-12">
            <br>
            <h1 class="text-warning col-12" style="padding-left: 15px; font-weight: bolder; font-family:'Times New Roman', Times, serif; font-size: 2.2em !important;"> <?= $req_res['article_title'] ?> </h1>
          </div>
        </div>

        <div class="row text-center">
          <small class="col-12 text-muted">

            <?php if (!empty($req_res['article_publisher']) && !empty($req_res['article_publisher'])) : ?>
              <i class="text-muted"> First Published in <?= (isset($req_res['article_link']) && check_url($req_res['article_link'])) ? '<a href="' . $req_res['article_link'] . '" target="_blank" class="text-info"><b>' . $req_res['article_publisher'] . '</b></a>' : $req_res['article_publisher'] ?> on &nbsp; </i>
            <?php elseif (!empty($req_res['article_type']) && $req_res['article_type'] == 'business_day') : ?>
              <i class="text-muted"> <?= ($req_res['article_type'] == 'business_day') ? 'First Published in ' . ((!empty($req_res['article_link']) && check_url($req_res['article_link'])) ? '<a href="' . $req_res['article_link'] . '" target="_blank" class="text-info"><b>Business Day</b></a>' : '<b>Business Day</b>') . ' on' : 'Published on' ?> &nbsp; </i>
            <?php else : ?>
              <i class="text-muted"> Published on &nbsp; </i>
            <?php endif; ?>

            <?php if (!empty($req_res['article_link']) && check_url($req_res['article_link'])) : ?>
              <a href="<?= $req_res['article_link'] ?>" style="font-size/: 11px;" target="_blank" class="text-info"><?= $artcl_date->format('F jS, Y') ?></a>
            <?php else : ?>
              <span class="text-warning" style="font-size/: 11px; color: #d4af37"> <?= $artcl_date->format('F jS, Y') ?></span>
            <?php endif; ?>
            <?php
            $auth_com = explode(",", $req_res['article_author']);
            $auth_and = explode("and", $req_res['article_author']);

            $ath_dl   = (!empty($req_res['article_author']) && (count($auth_com) == 1 && count($auth_and) == 1)) ? ' and ' : ', ';
            ?>
            &nbsp; | &nbsp; <i>by</i> &nbsp; <strong> <?= PROJECT_TITLE ?><?= (isset($req_res['article_author']) && $req_res['article_author'] != '') ? $ath_dl . $req_res['article_author'] : '' ?> </strong>
          </small>
        </div>

        <br>
        <?php if (isset($req_res['article_image']) && !empty($req_res['article_image']) && $req_res['article_image'] != DEFAULT_ARTICLE_IMG) : ?>
          <div class="row">
            <div class="col-12 text-center">
              <img style="max-height: 350px; border: 2px solid #ddd; padding 3px; border-radius: 25px;" class="img-thumbnail img-responsive" src="<?= article_img($req_res['article_type'], $req_res['article_image']) ?>" alt="<?= $req_res['article_title'] ?>">
              <div class="">
                <?php if (isset($req_res['article_source']) && $req_res['article_source'] != '') : ?>
                  <small class="text-muted"> <?= $req_res['article_source'] ?></small>
                <?php endif; ?>
              </div>
            </div>
          </div> <br>
        <?php endif; ?>
        <div class="row p-3">
          <div class="col-12 textarea-container">
            <div class="col-12" style="border: 1px solid #efefef; background-color: #fafafa; border-radius: 15px; padding: 9px 18px; color: #555;">
              <?= nl2br($req_res['article_content']) ?>
            </div>
            <br>
            <?php if (isset($req_res['article_file']) && !empty($req_res['article_file'])) : ?>

              <?php
              $file_name  = $req_res['article_file'];
              $file_parts = pathinfo($file_name);
              $fl_ext     = 'fa-file';
              $text_colr  = 'text-secondary';
              if (array_key_exists('extension', $file_parts)) {
                switch ($file_parts['extension']) {
                  case "pdf":
                    $fl_ext = 'fa-file-pdf';
                    $text_colr = 'text-danger';
                    break;
                  case "doc" || 'docx':
                    $fl_ext = 'fa-file-word';
                    $text_colr = 'text-primary';
                    break;
                  case "": // Handle file extension for files ending in '.'
                    $fl_ext = 'fa-file';
                  case NULL: // Handle no file extension
                    $fl_ext = 'fa-file';
                    break;
                }
              }
              ?>
              <span class="alt_dflt">Attachment</span> &emsp;

              <h5 class="col-12">
                <a class="doc_anchor text-secondary" href="<?= ABS_FILES . $file_name ?>" style="padding-bottom: 15px !important;">
                  <i class="fa <?= $fl_ext . ' ' . $text_colr ?> " aria-hidden="true"></i> &nbsp; <?= $req_res['article_title'] ?>
                </a> &nbsp;
                <embed src="<?= ABS_FILES . $file_name ?>#page=1&zoom=75" width="575" height="500" style="width: 100%; max-height: 300px; overflow-y: hidden !important; overflow: hidden;">

              </h5>

            <?php endif; ?>

            <div class="col-12 float-end px-3">
              <p class="floar-end m-0 mb-1 font-weight-bolder text-dark"> Share article </p>
              <?php if (isset($req_res['article_file']) && !empty($req_res['article_file'])) : ?>
                <a class="float-end/ me-3 text-xxs " href="<?= ABS_FILES . $file_name ?>" download> <i class="fas fa-angle-double-down me-2"></i> <span style="font-size: large;">Download</span> </a>
              <?php endif; ?>
              <span data-href="<?= $article_link ?>" data-layout="button" data-size="small" onclick="postCheck('null', {'article_id':<?= $req_res['article_id'] ?>, 'share_type':true});">
                <a class="float-end/ me-3 text-xxs" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $article_link ?>;"> <i class="fab fa-facebook fa-2x" style="color: #1877f2;" aria-hidden="true"></i></a>
              </span>

              <span onclick="postCheck('null', {'article_id':<?= $req_res['article_id'] ?>, 'share_type':true});">
                <a class="float-end/ me-3 text-xxs twitter-share-button" href="https://twitter.com/intent/tweet?url=<?= $article_link ?>&text=<?= $req_res['article_title'] ?>&hashtags=<?= PROJECT_TITLE ?>&via=<?= (isset($social_media['twitter']['user'])) ? $social_media['twitter']['user']: '' ?>" data-text="Hi Visit the link below" target="_blank"><i class="fab fa-twitter fa-2x" style="color: #1da1f2;" aria-hidden="true"></i></a>
                <input id="tweet_title" type="hidden" name="" value="<?= $req_res['article_title'] ?>">
              </span>

              <span onclick="postCheck('null', {'article_id':<?= $req_res['article_id'] ?>, 'share_type':true});">
                <a class="float-end/ me-3 text-xxs" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $article_link ?>&title=<?= $req_res['article_id'] ?>&summary=&source=<?= PROJECT_TITLE ?>" target="_blank"><i class="fab fa-linkedin fa-2x" style="color: #007bb5;" aria-hidden="true"></i></a>
              </span>

              <span onclick="postCheck('null', {'article_id':<?= $req_res['article_id'] ?>, 'share_type':true});">
                <a class="float-end/ me-3 text-xxs" href="mailto:?subject=<?= PROJECT_TITLE ?> | <?= $req_res['article_title'] ?>&amp;body=<?= $req_res['article_title'] ?>, &emsp;  <?= $article_link ?>" title="<?= $req_res['article_title'] ?>">
                  <i class="fa fa-envelope fa-2x" style="color: #B23121;" aria-hidden="true"></i>
                </a>
              </span>

              <a class="float-end/ me-3 text-xxs" type="button" <?= ((isset($req_res['article_file']) && !empty($req_res['article_file'])) ? 'href="' . ABS_FILES . $file_name . '" download' : 'onclick="window.print();"') ?>><i class="fa fa-print fa-2x" style="color: #ff0000;" aria-hidden="true"></i></a>

            </div>
            <div class="clearfix p-0 m-0"></div>

          </div>

          <div id="comments_div<?= $req_res['article_id'] ?>" class="col-12 form-group">
            <form id="commentForm_<?= $req_res['article_id'] ?>" class="" action="index.html" method="post">
              <div class="form-check/" style="padding-bottom: 5px;">
                <br>
                <textarea id="comment" class="form-control col-12 shadow-none" name="comment" cols="2" value="" style="border-radius: 15px;" placeholder="Comment ..." /><?= ((isset($_SESSION['comment'])) ? $_SESSION['comment'] : '') ?></textarea>
              </div>
              <span id="message_<?= $req_res['article_id'] ?>" class="py-1"></span>
              <input type="hidden" name="type" value="comment">
              <input type="hidden" name="article_id" value="<?= $req_res['article_id'] ?>">
              <input id="islogged" type="hidden" name="islogged" value="<?= ((isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') ? true : false) ?>">
              <button type="button" onclick="post_comment(<?= $req_res['article_id'] ?>,'message_<?= $req_res['article_id'] ?>');" class="btn-sm btn btn-secondary" style="padding: 5px 35px; border-radius: 9px;">Post Comment</button>
            </form>
            <br>

            <div id="comments_box" class="">
              <?php if (is_array($cmnt_res)) : ?>
                <?php foreach ($cmnt_res as $comment) : ?>
                  <?php
                  $cnt += 1;
                  $db_date = DateTime::createFromFormat('Y-m-d H:i:s', $comment['article_comment_date_created']);
                  ?>
                  <div class="user_comment" style="padding-top: 7px !important;">

                    <div class="d-flex border-end">
                      <div class="flex-shrink-0">
                        <img class="card-img-top/ card_img_comment/ border rounded-circle img-thumbnail" style="height: 50px; width: 50px;" src="./img/users/profile.png" alt="User Profile">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <?php $rep_user = get_user_by_id($comment['user_id']) ?>
                        <h6 class="card-title p-0 m-0"><i class="me-2"><?= (isset($rep_user['username'])) ? $rep_user['username'] : 'Anonymous' ?></i> 
                          <small class="card-subtitle mb-2 text-muted"><span class="text-warning text-xs"> (<?= $db_date->format('H:m:s - F jS, Y') ?>)</span></small>
                        </h6>
                        <p class="text-muted">
                          <?= $comment['article_comment'] ?>
                        </p>
                      </div>
                    </div>

                    <div class="" style="padding-left: 70px;">

                      <div class="">
                        <a type="button" class="btn px-3 py-1 border" onclick="$('#reply_box<?= $comment['article_comment_id'] ?>').toggle();" style="padding: 0;">Reply</a>
                      </div>
                      <span id="message_<?= $comment['article_comment_id'] ?>" class="py-1"></span>
                      <div id="reply_box<?= $comment['article_comment_id'] ?>" class="" style="padding-top: 5px; display: none;">
                        <form id="commentReForm_<?= $comment['article_comment_id'] ?>" class="" action="index.html" method="post">
                          <textarea id="" class="form-control col-12 shadow-none" name="comment" cols="1" value="" placeholder="Reply ..." /><?= ((isset($_SESSION['comment'])) ? $_SESSION['comment'] : '') ?></textarea>
                          <input type="hidden" name="type" value="reply">
                          <input type="hidden" name="user" value="<?= $comment['user_id'] ?>">
                          <input type="hidden" name="comment_id" value="<?= $comment['article_comment_id'] ?>">
                          <input type="hidden" name="article_id" value="<?= $req_res['article_id'] ?>">
                          <input id="islogged" type="hidden" name="islogged" value="<?= ((isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') ? true : false) ?>">
                          <button type="button" onclick="post_comment(<?= $comment['article_comment_id'] ?>,'message_<?= $comment['article_comment_id'] ?>', 'reply');" class="btn-sm btn btn-warning/ float-right/" style="padding/: 5px 35px; border-radius/: 15px;"><i class="fab fa-telegram-plane"></i> &nbsp; Submit</button>
                        </form>
                      </div>
                      <div class="" style="padding-top: 9px;">
                        <?php $replies = get_comment_replies_by_comment_id($comment['article_comment_id']) ?>
                        <?php if (is_array($replies)) : ?>
                          <?php foreach ($replies as $reply) : ?>
                            <?php $db_date = DateTime::createFromFormat('Y-m-d H:i:s', $reply['article_comment_date_created']); ?>

                            <div class="d-flex mb-0">
                              <div class="flex-shrink-0">
                                <img class="card-img-top/ card_img_comment/ img-thumbnail" style="height: 30px; width: 30px;" src="./img/users/profile.png" alt="User Profile">
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <?php $rep_user = get_user_by_id($reply['user_id']) ?>
                                <h6 class="card-title"><i class="me-2"><?= (isset($rep_user['username'])) ? $rep_user['username'] : 'Anonymous' ?></i> 
                                  <small class="card-subtitle mb-2 text-muted text-xs"><span class="text-warning"> (<?= $db_date->format('H:m:s - F jS, Y') ?>) </span></small><br>
                                </h6>
                              </div>
                            </div>
                            

                            <p class="text-muted " style="padding-top: 9px;">
                              <?= $reply['article_comment'] ?>
                            </p>

                            <div class="">
                              <a type="button" class="btn px-3 py-1 border" onclick="$('#reply_box<?= $reply['article_comment_id'] ?>').toggle();" style="padding: 0;">Reply</a>
                            </div>
                            <div id="reply_box<?= $reply['article_comment_id'] ?>" class="" style="padding-top: 5px; display: none;">
                              <form id="commentReForm_<?= $reply['article_comment_id'] ?>" class="" action="index.html" method="post">
                                <textarea id="" class="form-control col-12 shadow-none" name="comment" cols="1" value="" placeholder="Reply ..." /><?= ((isset($_SESSION['comment'])) ? $_SESSION['comment'] : '') ?></textarea>
                                <input type="hidden" name="type" value="reply">
                                <input type="hidden" name="user" value="<?= $reply['user_id'] ?>">
                                <input type="hidden" name="comment_id" value="<?= $comment['article_comment_id'] ?>">
                                <input type="hidden" name="article_id" value="<?= $req_res['article_id'] ?>">
                                <input id="islogged" type="hidden" name="islogged" value="<?= ((isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') ? true : false) ?>">
                                <div class="m-0 py-0">
                                  <span id="message_<?= $reply['article_comment_id'] ?>" class="py-1"></span>
                                </div>
                                <button type="button" onclick="post_comment(<?= $reply['article_comment_id'] ?>,'message_<?= $reply['article_comment_id'] ?>', 'reply');" class="btn-sm btn"><i class="fab fa-telegram-plane me-2"></i> Submit</button>
                              </form>
                            </div>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <?php if ($cnt > 2) : ?>
              <div id="more_div" class="">
                <!-- <a type="button" class="btn btn-default text-secondary shadow-none" onclick="postCheck('comments_box', {'article_id':<?= $req_res['article_id'] ?>, 'article_comments': true})">Read more</a> -->
              </div>
            <?php endif; ?>
          </div>
        </div>
        <br><br>
      </div>
    </div>
  <?php endif; ?>
  <br><br>

</div>