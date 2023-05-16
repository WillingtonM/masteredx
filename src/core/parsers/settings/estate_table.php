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
            <a class="me-3" type="button" onclick="requestModal(post_modal[11], post_modal[11], {'member':<?= $association['member_id'] ?>})"> <i class="fa-solid fa-pen-to-square me-1"></i> <span class="d-none/ d-md-block/">Edit</span> </a>
            <a href="assign?usr=<?= $association['member_id'] ?>&usr_type=member&tab=member"> <i class="fas fa-clipboard-list me-1"></i> <span class="d-none/ d-md-block/">Assign</span> </a>
        </div>
    </td>
</tr>