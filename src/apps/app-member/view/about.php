<div class="">
  <div class="pad-col" style="padding: 39px;"><br><br></div>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <br><br>
          <h3 class="abt_h3" style="font-weight: bolder;"> <i style="color: #555;">About</i> &ensp; <span class="alt_dflt" style="font-family: myFirstFont;"><?= 'Dr. ' . ucfirst(PROJECT_TITLE) ?></span></h3>
          <br>
          <br>
          <p class="alt_dflt/" style="color: #777; font-size: 1.3em; font-weight:500;">
            Gracelin is a US-national who has spent the last decade working in Africa, Asia, Europe, North America and Australia. <br> She is an economist who works in both economic policy and research. <br> She holds an MPhil and PhD from the University of Cambridge.
          </p>
          <br>
        </div>

        <div class="col-12 text-center">

          <ul class="nav nav-pills nav-justified" id="myTab" role="tablist" style="margin: 0 !important; padding: 0 !important; height:max-content;">


            <li class="nav-item article_nav <?= (((isset($_GET['tab']) && $_GET['tab'] ==  'profile') || !isset($_GET['tab'])) ? 'article_active' : '') ?>" role="presentation" style="margin: 5px; height:max-content" onclick="change_bg(0);">
              <a onclick="changeURL('profile')" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                <h5 class="text-center" style="font-weight: bolder; font-size: 1.3rem; padding-top: 9px;">
                  <span> <i class="fas fa-globe-africa"></i> &nbsp; Policymaking</span>
                </h5>
                <h6 class="abt_nav_text"> </h6>
              </a>
            </li>

            <li class="nav-item article_nav <?= (((isset($_GET['tab']) && $_GET['tab'] ==  'contact')) ? 'article_active' : '') ?>" role="presentation" style="margin: 5px; height:max-content" onclick="change_bg(1);">
              <a onclick="changeURL('contact')" class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                <h5 class="text-center" style="font-weight: bolder; font-size: 1.3rem; padding-top: 9px;">
                  <span> <i class="fas fa-briefcase"></i> &nbsp; Publishing</span>
                </h5>
                <h6 class="abt_nav_text"> </h6>
              </a>
            </li>

            <li class="nav-item article_nav <?= (((isset($_GET['tab']) && $_GET['tab'] ==  'academic')) ? 'article_active' : '') ?>" role="presentation" style="margin: 5px; height:max-content" onclick="change_bg(2);">
              <a onclick="changeURL('academic')" class="nav-link" id="academic-tab" data-toggle="tab" href="#academic" role="tab" aria-controls="academic" aria-selected="true">
                <h5 class="text-center" style="font-weight: bolder; font-size: 1.3rem; padding-top: 9px;">
                  <span> <i class="fas fa-user-graduate"></i> &nbsp; Research & Teaching </span>
                </h5>
                <h6 class="abt_nav_text"> </h6>
              </a>
            </li>
          </ul>

        </div>
      </div>
    </div>

    <br>
  </div>

  <div class="container-fluid" id="myTabContent">
    <div class="tab-content">

      <!-- policymaking -->
      <div class="tab-pane fade <?= (((isset($_GET['tab']) && $_GET['tab'] == 'profile') || !isset($_GET['tab']) ) ? 'show active' : '') ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card/ card_abt" style="padding: none;">
          <div class="container card-body">
            <br><br>
            <div class="row">
              <div class="col-12 col-sm-6/ abt_cntnt wait-1sec" data-animation="animated tada">
                <h3 class="abt_header">Policymaking </h3>
                <p></p>
              </div>
              <div class="col-12 col-sm-6/"></div>

              <div class="col-12 col-sm-6 wait-3sec" data-animation="animated zoomInRight" style="padding: 25px;">
                <div class="row" style="background: rgb(85, 85, 85, .9); padding: 24px; border: 1px solid #c58c6f; border-radius: 35px;">
                  <div class="col-12" style="padding: 15px !important;">
                    <p class="card-text text-center">
                      Gracelin is a Consultant Economist at the World Bank where she works on strengthening macro-fiscal stability, trade, investment, private sector development (to stimulate job creation), and financial sector reform to improve financial inclusion. She also works for the Office of the Chief Economist.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 wait-3sec" data-animation="animated zoomInRight" style="padding: 25px;">
                <div class="row" style="background: rgb(85, 85, 85, .9); padding: 24px; border: 1px solid #c58c6f; border-radius: 35px;">
                  <div class="col-12" style="padding: 15px !important;">
                    <p class="card-text text-center">
                      Gracelin has provided expertise on economy policy for 20+ countries for clients such as the UK Department of International Department (DFID), Association of Southeast Asian Nations (ASEAN), University of Witwatersrand School of Governance and foreign direct investors.
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- publishing -->
      <div class="tab-pane fade <?= (((isset($_GET['tab']) && $_GET['tab'] == 'contact')) ? 'show active' : '') ?>" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="card/ card_abt" style="padding: none;">
          <div class="container card-body">
            <br><br>
            <div class="row">
              <div class="col-12 abt_cntnt text-center wait-1sec" data-animation="animated tada">
                <h3 class="abt_header">Publishing </h3>
              </div>

              <div class="col-12 wait-2sec abt_cntnt" data-animation="animated zoomInRight" style="padding: 25px;">
                <div class="row" style="background: rgb(85, 85, 85, .9); padding: 24px; border: 1px solid #c58c6f; border-radius: 35px;">
                  <div class="col-12" style="padding: 15px !important;">
                    <p class="card-text text-center" style="padding: 15px;">
                      Gracelin has published reports, working papers, policy briefs, op-eds and academic journal articles for the World Bank, Brookings, Business Day, Mineral Economics and Daily Maverick, amongst others. <br>
                      She writes about economic policy, emerging markets, international trade and fiscal sustainability.
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- Research & Teaching -->
      <div class="tab-pane fade <?= (((isset($_GET['tab']) && $_GET['tab'] == 'academic')) ? 'show active' : '') ?>" id="academic" role="tabpanel" aria-labelledby="academic-tab">
        <div class="card/ card_abt" style="padding: none;">
          <div class="container card-body">
            <br><br>
            <div class="row">
              <div class="col-12 col-sm-6/ abt_cntnt text-center/ wait-1sec" data-animation="animated tada">
                <h3 class="abt_header float-right">Research & Teaching </h3>
              </div>

              <div class="col-12 wait-2sec abt_cntnt" data-animation="animated zoomInUp" style="padding: 25px;">
                <div class="row" style="background: rgb(85, 85, 85, .9); padding: 24px; border: 1px solid #c58c6f; border-radius: 35px;">
                  <div class="col-12" style="padding: 15px !important;">
                    <p class="card-text text-center" style="padding: 15px;">
                      Gracelin holds an appointment as a Senior Research Fellow at the Development Policy Research Unit (DPRU) in the Faculty of Economics at the University of Cape Town.
                    </p>
                    
                    <p class="card-text text-center" style="padding: 15px;">
                      She has taught at the School of Oriental and African Studies, University of London (SOAS) and supervised undergraduates at Cambridge.
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>



  <br><br>


  <br><br>
</div>