"use strict"; // Tabs navigation

var total = document.querySelectorAll('.nav-pills');
total.forEach(function (item, i) {
  item.onmouseover = function (event) {
    var target = getEventTarget(event);
    var li = target.closest('li'); // get reference

    if (li) {
      var nodes = Array.from(li.closest('ul').children); // get array

      var index = nodes.indexOf(li) + 1;

      item.querySelector('li:nth-child(' + index + ') .nav-link').onclick = function () {
        var tab_name = $(this).attr('data-name');
        var tab_variable = $(this).attr('get-variable');
        var tab_variable = tab_variable.length > 0 ? tab_variable : '';

        if (tab_name.length > 0) {
          change_bg();
          changeURL(tab_name, tab_variable); // change tab_inpu on search form

          if ($('#tab_input').length > 0) {
            $('#tab_input').val(tab_name);
          }
        }

      };
    }
  };
}); 

// Search 
$(function () {
  $('#global_search_id').keyup(function () {
    $('#global_search').html(''); // $('#srch_res_here').show();

    var srch_val = $(this).val();
    var srch_data = $('#search_form').serialize();

    if (srch_val != '' && srch_val != null && srch_val.length >= 2) {
      postCheck('global_search', srch_data, 8, true);
    }
  }); // search

  $('input[name="search"]').change(function () {
    var src_val = $('#global_search_id').val();
    var inp_val = $(this).val();
    var cat_val = $('#global_search option').filter(function () {
      return this.value == inp_val;
    }).data('value');
    /* if value doesn't match an option, cat_val will be undefined*/

    window.location.href = './search?qry=' + cat_val + '&search=' + src_val;
  });
});

$(function ($) {
  $('#img_cspture').on('click', function (e) {
    e.preventDefault();
    $('#post_image')[0].click();
  });
  $('#post_image').on('change', function (e) {
    if ($('#post_image').val()) {
      $('.fa-camera.fa-3x').css('color', '#03556b');
      file_data = new FormData();
      file_data.append('post_image', $("#post_image")[0].files[0]);
      file_data = $("#post_image")[0].files[0];
      console.log(file_data);
      postFile('account_message', 'post_image', file_data, 10, 'img_cspture');
    } else {
      $('#img_cspture').css('color', '');
    }
  });
});

// settings
// subscription_popup

$('#subscription_popup').on('change', function () {
  var hid = this.id;
  var val = $('#' + hid + ':checked').length > 0 ? 1 : 0;
  var label = val ? 'Enabled' : 'Disabled';
  $('#ubscription_popup_label').text(label);
  data = {
    'form_type': 'subscription_popup',
    'form_value': val
  };
  postCheck('null', data);
}); // subscription_active

$('#subscription_active').on('change', function () {
  var hid = this.id;
  var val = $('#' + hid + ':checked').length > 0 ? 1 : 0;
  var label = val ? 'Enabled' : 'Disabled';
  $('#subscription_active_label').text(label);
  data = {
    'form_type': 'subscription_active',
    'form_value': val
  };
  postCheck('null', data);
}); // article email type

$('.article_email_type').on('change', function () {
  var hid = this.id;
  var hval = this.value;

  data = {
    'form_type': 'article_email_type',
    'form_value': hval
  };
  postCheck('null', data);
});

// functions **********************************************************************************************************
function getEventTarget(e) {
  e = e || window.event;
  return e.target || e.srcElement;
} // End tabs navigation
// helper funcions

function change_bg() {
  var tab_ul_id = arguments.length > 0 && arguments[0] !== undefined && arguments[0] != '' ? arguments[0] : 'pills-tab';
  $('#' + tab_ul_id + ' > li').removeClass('article_active');
  $('#' + tab_ul_id + ' > li > a.active').parent().addClass('article_active');
}