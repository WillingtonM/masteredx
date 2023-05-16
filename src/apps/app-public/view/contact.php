   <div id="contact_elem" class="container pt-10 min-vh-100">
       <div class="page-header min-height-300 border-radius-xl/ mt-4 wait-2s" data-animation="animated pulse" style="border-radius: 35px;">
           <span class="mask opacity-6" style="background-color: rgb(41, 55, 75, .5); ">
               <div class="p-0">
                   <div class="text-center py-3 pt-5">
                       <h3 class="font-weight-bolder text-white"> <span class="text-warning me-2"> Contact </span> <i>us</i> </h3>
                       <small class="m-0 text-light font-weight-bold">
                           <span class="fs-5"> We would like to hear from you</span>. <br>
                           Easily contact us, and our amazing team and specialists will contact you.
                       </small>
                   </div>
               </div>
           </span>
       </div>

       <div class="card card-body/ blur shadow-blur mx-4 mt-n6 overflow-hidden" style="border-radius: 20px;">

           <div class="row gx-4">
               <div class="col-12 col-xl-8">

                   <div class="row">
                       <div id="contact" class="col-12 contact_modal">
                           <form id="bookingFormContact" method="post"><br><br>
                               <div class="">
                                   <div class="p-0">
                                       <div class="text-center py-2">
                                           <h3 class="font-weight-bolder text-dark"> Do you have any enquiry? </h3>
                                           <small class="m-0 text-dark"> Enquire or contact us directly using any of the methods below </small>
                                       </div>
                                   </div>
                                   <br>
                                   <div class="card-body p-3 bg-white/" style="border-radius: 25px;">
                                       <br>

                                       <div class="row">
                                           <div class="col-12 col-md-2 col-lg-3"></div>
                                           <div class="col-12 col-md-8 col-lg-6">
                                               <div class="text-center mb-4">
                                                   <p class="p-3 mb-3" style="color: #777;">
                                                        <h6 class="mb-2/">Get in touch with us, and we will get in touch with you:</h6>
                                                        <!-- <br> -->
                                                       <a class="p-2" style="font-size: .8rem" href="mailto:info@<?= $_ENV['PROJECT_HOST'] ?>"> <i class="fa-solid fa-envelope me-1"></i> <?= $contact_tabs['client']['mail'] ?> </a>
                                                       <br>
                                                       <a class="p-2" style="font-size: .8rem" href="tel:+27818098545"> <i class="fa-solid fa-phone me-1"></i> <?= $contact_tabs['client']['call'] ?> </a>
                                                   </p>
                                               </div>
                                               <div id="message_booking_con" class=""></div>
                                               <input type="hidden" name="form_type" value="booking_form">

                                               <button type="button" class="btn btn-dark col-12 border-radius-lg" style="border-radius: 12px;" onclick="requestModal(post_modal[9], post_modal[9], {})"> Service Enquiries </button>
                                           </div>
                                           <div class="col-12 col-md-2 col-lg-3"></div>
                                       </div>

                                       <br>

                                       <div class="social_med bg-light p-3 border-radius-xl mb-3">
                                           <p class="px-3 text-dark font-weight-bolder opacity-6 text-center "> Contact Information </p>
                                           <hr class="horizontal dark mt-0">
                                           <div class="row">
                                               <div class="col-12 col-md-6">
                                                   <h6> <i class="fa-solid fa-address-book me-2"></i> Address </h6>
                                                   <address>
                                                       <b><?= PROJECT_TITLE ?> </b><br>
                                                       001 Example street<br>
                                                       Example Town <br>
                                                       City, <br>
                                                       Country
                                                   </address>
                                               </div>
                                               <div class="col-12 col-md-6">
                                                   <div class="map-responsive">
                                                       <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3682.8640575895515!2d17.0883172149605!3d-22.621551085157552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s9%20Thobias%20Akuenje%20street%20Kleine%20Kuppe%20Box%20564%2C%20Disneyland%20Windhoek!5e0!3m2!1sen!2sza!4v1665465411579!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                   </div>
                                               </div>
                                           </div>
                                           <p class="">


                                               <?php foreach ($social_media as $key => $social) : ?>
                                                   <a class="text-dark" href="<?= $social['link'] ?>" target="_blank"><i class="<?= $social['font'] ?> fa-2x"></i></a>
                                               <?php endforeach; ?>
                                           </p>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>

               </div>

               <div id="get_in_touch" class="col-12 col-xl-4 hover_inimate">
                   <div class="card/ h-100 bg-dark wait-1s border-radius-none" data-animation="animated/ shake/">

                       <div class="card-body p-3">

                           <div class="form-row align-items-center">
                               <div class="col-12">
                                   <div class="input-group mb-2">
                                       <span class="input-group-text text-dark" style="border-right: none;"><i class="fa fa-user input_color"></i></span>
                                       <input type="text" class="form-control shadow-none" id="name" name="name" placeholder="Full Name" required>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="input-group mb-2">
                                   <span class="input-group-text text-dark" style="border-right: none;"><i class="fa fa-envelope input_color"></i></span>
                                   <input type="email" class="form-control shadow-none" id="email" name="feedbackemail" placeholder="Email" required>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="input-group mb-2">
                                   <span class="input-group-text text-dark" style="border-right: none;"><i class="fa fa-comment input_color"></i></span>
                                   <textarea class="form-control shadow-none" id="message" name="message" placeholder="Message ..." rows="4" required></textarea>
                               </div>
                           </div>
                           
                           <div id="feedbackErrors" class=""></div>

                            <div class="text-center" style="border-radius: 3px;">
                                <button type="button" class="btn btn-block rounded-0 btn-white btn-sm shadow-none col-12" style="border-radius: 12px !important;" onclick="postCheck('feedbackErrors', {email: $('#email').val(), name: $('#name').val(), last_name: $('#last_name').val(), message: $('#message').val(), 'form_type':'feedback_form'});">
                                    Submit
                                </button>
                            </div>

                           <div class="col-12 text-center">
                               <br><br>
                               <small class="text-light" style="font-size: .8rem;">
                                   Please note that any collected identifying information will be encrypted and stored in a password protected electronic format, <br> thus you can rest assured that your identifying information will be securely stored
                               </small>
                           </div>

                       </div>
                   </div>
               </div>

           </div>


       </div>
   </div>