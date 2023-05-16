  <div class="container-fluid px-0 border-radius-xl bg-white" style="min-height: 86vh;">
    <div class="row bg-light p-0 m-0">
      <div id="home-first" class="col-12 text-center my-4">
        <h3 class="alt_dflt">
          <span> Deceased Estate Information </span>
        </h3>
      </div>
    </div>

    <div class="bg-white col-12 p-3">

      <div class="px-4"> 
        <small> Logged-in user: </small> <br>
        <h5 class="text-dark"> 
          <span style="font-weight: bolder;"> <i><?= $username ?></i></span>
        </h5>
      </div>
      <hr>

      <h6 class="mb-3 px-4"> Managed Deceased Estates </h6>
      
      <div class="col-row">
        <div class="col-12 p-0" style=" border-radius: 0 0 15px 15px;">

          <table class="table table-striped">
            <?php require $config['PARSERS_PATH'] . 'forms' . DS . 'estate_table_head.php' ?>
            <tbody>
              <?php if (is_array($associations) || is_object($associations)) : ?>
                <?php $cnt = 0 ?>
                <?php foreach ($associations as $key => $association) : ?>
                  <?php $cnt++ ?>
                  <?php $member_state = get_activity_tasks_by_member_id($association['member_id']) ?>
                  <tr>
                    <th class="text-center d-none d-lg-block" scope="row"> <?= $association['member_reference'] ?> </th>
                    <td> <a href="view?usr=<?= $association['member_id'] ?>"> <span> <?= $association['member_surname_initials']; ?> </span> </a> </td>
                    <td class="d-none d-lg-block"> <?= (isset($member_state['practice_task']) && !empty($member_state['practice_task']))? short_paragrapth($member_state['practice_task'], 20) : ''; ?> </td>
                    <td class=""> <?= (isset($member_state['activity_task_updated']) && !empty($member_state['activity_task_updated'])) ? date("d/m/Y", strtotime($member_state['activity_task_updated'])) : ''; ?> </td>
                    <td class="d-none d-lg-block"> <?= (isset($member_state['activity_task_date']) && !empty($member_state['activity_task_date'])) ? date("d/m/Y", strtotime($member_state['activity_task_date'])) : ''; ?> </td>
                    <td class="d-block/ d-md-none/">
                        <div class="float-end">
                            <a href="view?usr=<?= $association['member_id'] ?>" class="btn btn-secondary border-radius-xl float-end" style="padding: 5px 15px;"> 
                              <i class="fas fa-eye me-1"></i> <span class="d-none/ d-lg-block/"> View </span> 
                            </a> 
                        </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>

            </tbody>
          </table>

        </div>
      </div>
      <br>
    </div>

  </div>


  