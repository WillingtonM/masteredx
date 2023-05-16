<div class="container pt-10 min-vh-100">

    <div class="page-header min-height-200 mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
        <span class="mask opacity-6/" style="background-color: rgb(0, 0, 0, .3); ">
            <div class="p-0">
                <div class="text-center py-3 pt-5">
                    <h3 class="font-weight-bolder text-white"> <span class="text-warning me-2"> Company Profile </span> <i> </i> </h3>
                    <small class="m-0 text-light">
                        View and or download our Company Profile
                    </small>
                </div>
            </div>
        </span>
    </div>

    <div class="mx-4 mt-n6 overflow-hidden mb-5">
        <div class="row gx-4">
            <div class="col-12 mb-3" style="z-index: 10 !important;">
                <?php
                if (is_array($gall_qry) || is_object($gall_qry)) :
                    foreach ($gall_qry as $value) :
                        $myDateTime     = DateTime::createFromFormat('Y-m-d H:i:s', $value['media_publish_date']);
                        $file_parts     = pathinfo($value['media_image']);
                        $fl_ext         = 'fa-file';
                        $text_colr      = 'text-secondary';
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

                        require $config['PARSERS_PATH'] . 'media' . DS . 'public_file.php';
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>




</div>