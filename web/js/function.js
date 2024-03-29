"use strict"; // ************************** General Functions

function alert_msg(msg) {
  var output = '';
  output += '<div class="alert alt_alert_warning" role="alert">'; // output += '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; ';

  output += msg + '</div>';
  return output;
}

function success_msg(msg) {
  var output = '';
  output += '<div class="alert alt_alert_success" role="alert">';
  output += msg + '</div>';
  return output;
}
/* options| primary, secondary, info, danger, warning, success */
function message_alert(msg, type) {
  return '<div class="alert alt_alert_' + type + '" role="alert">' + msg + '</div>';
}

function validate_email(email) {
  var pattern = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
  return pattern.test(email);
}

function reloadWindow() {
  location.reload();
}

function requestModal(url, modal_id, data) {
  var form_type = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 0;

  $('.modal-backdrop').remove();

  if (form_type == 1) {
    data = 'url=' + url + '&get_type=' + post_type[1] + '&token=' + token + '&' + data;
  } else {
    data = Object.assign({
      'url': url,
      'get_type': post_type[1],
      'token': token
    }, data);
  }

  $.ajax({
    url: url,
    data: data,
    method: "POST",
    success: function success(data) {
      $('#modalDiv').html(data);
      $('#' + modal_id).modal('toggle');
    },
    error: function error() {
      alert('error!');
    }
  });
}

function getCookie(name) {
  var dc = document.cookie;
  var prefix = name + "=";
  var begin = dc.indexOf("; " + prefix);

  if (begin == -1) {
    begin = dc.indexOf(prefix);
    if (begin != 0) return null;
  } else {
    begin += 2;
    var end = document.cookie.indexOf(";", begin);

    if (end == -1) {
      end = dc.length;
    }
  }

  return decodeURI(dc.substring(begin + prefix.length, end));
}

function cookieAction(name) {
  var temp = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  var myCookie = getCookie(name);

  if (myCookie == null && temp == false) {
    var date = new Date();
    var minutes = 30;
    date.setTime(date.getTime() + minutes * 60 * 1000);
    $.cookie(name, 'true', {
      expires: 20 * 365
    });
  } else {
    $.cookie(name, 'true');
  }
}

function closeModalByID(id) {
  $('#' + id).modal('hide');
  setTimeout(function () {
    $('#' + id).remove();
    $('.script').remove();
  }, 200);
  $('.modal-backdrop').remove();
}

function window_load(res_id) {
  $("#" + res_id).load(location.href + " #" + res_id);
}

function on_enter(click, trigger) {
  $('#' + click).bind('keypress', function (e) {
    if (e.which == 13) {
      e.preventDefault;
      $('#' + trigger).trigger('click');
    }
  });
}

function is_json_string(data) {
  try {
    JSON.parse(data);
    return true;
  } catch (e) {
    return false;
  }
}

// ************************** Post Functions

function postCheck(htmlid, data) {
  var url_val = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
  var form_data_serialise = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
  var check_hash = htmlid.startsWith('#') ? true : false;
  var check_dots = htmlid.startsWith('.') ? true : false;
  var html_id_elem = check_hash || check_dots ? $(htmlid) : $('#' + htmlid);
  return function (data) {
    var ret = false,
    alt_at_id = '';
    var data = form_data_serialise ? data + '&url=' + post_urls[url_val] + '&get_type=' + post_type[0] + '&token=' + token : Object.assign({
      'url': post_urls[url_val],
      'get_type': post_type[0],
      'token': token
    }, data);
    // console.log(data);
    $.ajax({
      url: path_action,
      method: "POST",
      data: data,
      success: function success(data) {
        // console.log(data);

        if (is_json_string(data)) {
          data = JSON.parse(data);
          alt_at_id = data.hasOwnProperty('alt_id') ? data.alt_id : '';

          if (data.hasOwnProperty('update')) {
            if (data.update) {
              window.update_sett = 0;
              window_load(htmlid);
            }
          }

          if (data.hasOwnProperty('data_append')) {
            var type = data.hasOwnProperty('data_append_type') ? data.data_append_type : 'input';
            data_res_append(data.data_append, type);
          }

          if (data.hasOwnProperty('alert')) {
            var alert_dta = {
              'modal_msg': data['message'],
              'modal_err': data['error'],
              'modal_type': 'alert',
              'url': post_modal[14]
            };
            requestModal(htmlid, post_modal[14], alert_dta);
          } else if (data.url == 'refresh') {
            if (data.success == true && data.message != '') {
              html_id_elem.html(success_msg(data.message));
            }

            if (data.hasOwnProperty('delayed')) {
              var period = data.hasOwnProperty('seconds') ? data.seconds : 1000;
              setTimeout(function () {
                location.reload();
              }, period);
            } else {
              location.reload();
            }
          } else if (data.url == 'remove') {
            htmlid = alt_at_id != '' ? alt_at_id : htmlid;
            html_id_elem.remove();
          } else if (data.url == 'append') {
            html_id_elem.append(data.message);
          } else if (data.hasOwnProperty('url') && data.url != '') {
            if (data.hasOwnProperty('delayed')) {
              if (data.success == true && data.message != '') {
                html_id_elem.html(success_msg(data.message));
              }

              var period = data.hasOwnProperty('seconds') ? data.seconds : 1000;
              setTimeout(function () {
                window.location.href = data.url;
              }, period);
            } else if (data.hasOwnProperty('new_tab')) {
              var win = window.open(data.url, '_blank');

              if (win) {
                //Browser has allowed it to be opened
                win.focus();
              } else {
                window.location.href = data.url; //Browser has blocked it
                // alert('Please allow popups for this website');
              }
            } else {
              window.location.href = data.url;
            }
          } else if (data.hasOwnProperty('form_check')) {
            if (data.error == true && data.hasOwnProperty('form_id')) {
              var form_input = data.hasOwnProperty('form_input') ? data.form_input : 'input';

              if (form_input != 'input') {
                $('#' + form_input).addClass('is-invalid');
              } else {
                $('#' + data.form_id).siblings(form_input).addClass('is-invalid');
              }

              $('#' + data.form_id).html(data.message);
              $('#' + data.form_id).addClass('invalid-feedback').removeClass('valid-feedback');
              $('#' + data.form_id).show();
            } else if (data.error == true) {
              html_id_elem.html(alert_msg(data.message));
            }
          } else if (data.success == true && (data.append == true || data.prepend == true)) {
            if (html_id_elem.is(':hidden')) {
              html_id_elem.show();
            }

            if (data.prepend == true) {
              if ($('#msg_div').length > 0) {
                var msg_div = $('#msg_div');
                var init_h = msg_div[0].scrollHeight;
                $(data.data).prependTo('#' + htmlid);
                var final_h = msg_div[0].scrollHeight;
                msg_div.scrollTop(final_h - init_h);
              } else {
                $(data.data).prependTo('#' + htmlid);
              }
            } else if (data.data != '') {
              html_id_elem.append(data.data);
            }
          } else if (data.success == true && data.message != '') {
            html_id_elem.html(success_msg(data.message));
            ret = true;

            if (data.hasOwnProperty('delayed')) {
              var period = data.hasOwnProperty('seconds') ? data.seconds : 15000;
              html_id_elem.delay(period).fadeOut();
            }
          } else if (data.success == false && data.error == false && data.message != '') {
            html_id_elem.html(data.message);
            ret = true;
          } else if (data.error == true) {
            if (_typeof(data.message) == 'object' && data.message !== null) {
              data_err(data.message, htmlid);
            } else {
              html_id_elem.show();
              html_id_elem.html(alert_msg(data.message));

              if (data.hasOwnProperty('delayed')) {
                var period = data.hasOwnProperty('seconds') ? data.seconds : 15000;
                html_id_elem.delay(period).fadeOut();
              }
            }
          } else if (data.hasOwnProperty('data') && data.data != '' || data.hasOwnProperty('data') && data.hasOwnProperty('data_allow')) {
            if (data.data == '') {
              html_id_elem.html('');
            } else {}

            html_id_elem.html(data.data);
          }

          if (data.hasOwnProperty('modal')) {
            var modal_act = data.modal;
            var modal_id = data.hasOwnProperty('modal_id') ? data.modal_id : '';

            if (modal_id != '' && modal_act == 'close') {
              if (data.hasOwnProperty('delayed')) {
                var period = data.hasOwnProperty('seconds') ? data.seconds : 15000;
                setTimeout(function () {
                  closeModalByID(modal_id);
                }, period);
              } else {
                closeModalByID(modal_id);
              }
            }
          }

          if (data.hasOwnProperty('remove_class')) {
            data_res_remove_class(data.remove_class);
          }

          if (data.hasOwnProperty('add_class')) {
            data_res_add_class(data.add_class);
          }
        }
      },
      error: function error(XMLHttpRequest, textStatus, errorThrown) {
        var err_message = 'There was an error on your request ! : ' + XMLHttpRequest.statusText;
        var modal_alert = $('#modal_alert_check');

        if (modal_alert.length > 0 && parseInt(modal_alert.val()) == 0) {
          requestModal(post_modal[14], post_modal[14], {
            'modal_err': true,
            'modal_msg': err_message
          });
          modal_alert.val(1);
        } else {}
      }
    }); // return ret;
  }(data);
}

function postFile(htmlid, img_id, data) {
  var url_val = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 0;
  var form_data = new FormData();
  form_data.append('url', post_urls[url_val]);
  form_data.append('token', token);
  form_data.append('get_type', post_type[0]);
  form_data.append('post_image', $("#" + img_id)[0].files[0]);
  $.ajax({
    url: path_action,
    method: "POST",
    data: form_data,
    processData: false,
    contentType: false,
    success: function success(data) {
      if (is_json_string(data)) {
        data = JSON.parse(data);

        if (data.success == true) {
          if (data.image != '') {
            $('.image').src = data.image;
            $('.image').prop('src', data.image);
          }
        } else {}
      }
    },
    error: function error(XMLHttpRequest, textStatus, errorThrown) {
      var err_message = 'There was an error on your request ! : ' + XMLHttpRequest.statusText;
      var modal_alert = $('#modal_alert_check');

      if (modal_alert.length > 0 && parseInt(modal_alert.val()) == 0) {
        requestModal(post_modal[14], post_modal[14], {
          'modal_err': true,
          'modal_msg': err_message
        });
        modal_alert.val(1);
      } else {}
    }
  });
}

function postFile3(htmlid, form_id) {
  var url_val = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
  var alt_id = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : ''; // form_data = new FormData();

  var form_data = new FormData($('#' + form_id)[0]);
  var src = '.image';
  form_data.append('url', post_urls[url_val]);
  form_data.append('token', token);
  form_data.append('get_type', post_type[0]); // form_data.append('post_image', $("#"+img_id)[0].files[0]);

  $.ajax({
    url: path_action,
    method: "POST",
    data: form_data,
    processData: false,
    contentType: false,
    success: function success(data) {
      if (is_json_string(data)) {
        data = JSON.parse(data);

        if (data.update) {
          window.update_sett = 0;
          $('#imgs_container').html(data.image);
        }

        if (data.success == true) {
          if (data.image != '') {
            if (htmlid != '') {
              src = '#' + htmlid + src;
            }

            $('.image').src = data.image;
            $(src).prop('src', data.image);
          }

          if (data.data != '') {
            $(alt_id).val(data.data);
          }
        } else {}
      }
    },
    error: function error(XMLHttpRequest, textStatus, errorThrown) {
      var err_message = 'There was an error on your request ! : ' + XMLHttpRequest.statusText;
      var modal_alert = $('#modal_alert_check');

      if (modal_alert.length > 0 && parseInt(modal_alert.val()) == 0) {
        requestModal(post_modal[14], post_modal[14], {
          'modal_err': true,
          'modal_msg': err_message
        });
        modal_alert.val(1);
      } else {}
    }
  });
}

function postFile2(alt_input, form_id) {
  var img_id = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  var url_val = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 0;
  var form_data = new FormData($('#product_form_img')[0]); // form_data = new FormData($('#'+form_id)[0]);

  var src = '.image';
  form_data.append('url', post_urls[url_val]);
  form_data.append('token', token);
  form_data.append('get_type', post_type[0]); // form_data.append('product_images', $("#product_images")[0].files[0]);

  if (alt_input != '') {
    form_data.append(alt_input, $('#' + alt_input).val());
  }

  $.ajax({
    url: path_action,
    method: "POST",
    data: form_data,
    processData: false,
    contentType: false,
    success: function success(data) {
      if (is_json_string(data)) {
        data = JSON.parse(data);

        if (data.update) {
          window.update_sett = 0; // window_load('imgs_container');

          $('#imgs_container').html(data.image);
        }

        if (data.error == true) {
          $('.multi_img_msg').html(alert_msg(data.message));
        } else if (data.success == true) {
          if (data.image != '') {
            if (img_id != '') {
              src = '#' + img_id + src;
            }

            $('.image').src = data.image;
            $(src).prop('src', data.image);
          }
        } else {}
      }
    },
    error: function error(XMLHttpRequest, textStatus, errorThrown) {
      var err_message = 'There was an error on your request ! : ' + XMLHttpRequest.statusText;
      var modal_alert = $('#modal_alert_check');

      if (modal_alert.length > 0 && parseInt(modal_alert.val()) == 0) {
        requestModal(post_modal[14], post_modal[14], {
          'modal_err': true,
          'modal_msg': err_message
        });
        modal_alert.val(1);
      } else {}
    }
  });
} // animations


function doAnimations(elems) {
  var animEndEv = 'webkitAnimationEnd animationend';
  elems.each(function () {
    var $this = $(this),
        $animationType = $this.data('animation'); // Add animate.css classes to
    // the elements to be animated
    // Remove animate.css classes
    // once the animation event has ended

    $this.addClass($animationType).one(animEndEv, function () {
      $this.removeClass($animationType);
    });
  });
}

function changeURL(param) {
  var get_var = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'tab';
  var url = new URL(window.location.href);
  var query_string = url.search;
  var search_params = new URLSearchParams(query_string); // var tab_list   = ['survey', 'disclaimer', 'results'];

  search_params.set(get_var, param); // change the search property of the main url

  url.search = search_params.toString(); // the new url string

  var new_url = url.toString(); // location.replace(new_url);

  window.history.pushState("", "Title", new_url);
}

function function_tinytext_forms(form_id, input_id) {
  var html_id = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'null';
  var content = encodeURIComponent(tinyMCE.get(input_id).getContent());
  var data_1 = $('#' + form_id).serialize();
  data_1 = post_data_default + '&' + data_1;
  data_1 = data_1 + '&article_content=' + content;
  postCheck(html_id, data_1, 0, true);
}

function modal_post() {
  $('#error_pop').html("");
  var content = encodeURIComponent(tinyMCE.get('mytextarea').getContent());
  var data_2 = new FormData($('#article_form_img')[0]);
  var data_1 = $('#article_form').serialize(),
      image = $('#product_image').val(),
      artcle = $('#article_id').length;
  data_1 = post_data_default + '&' + data_1;
  data_1 = data_1 + '&article_content=' + content; // add info to data_2

  data_2.append('token', token);
  data_2.append('get_type', post_type[0]);
  data_2.append('url', post_urls[0]);
  image = $('#product_id').length != 0 || image != '' || media != 0 && media != undefined ? 1 : 0;

  if (image) {
    $.ajax({
      url: path_action,
      method: 'post',
      data: data_1,
      success: function success(data) {
        if (is_json_string(data)) {
          data = JSON.parse(data);

          if (data.success == true && image == 1 || $('#product_id').length != 0) {
            $('#error_pop').html(success_msg(data.message));
            $.ajax({
              url: path_action,
              method: 'post',
              data: data_2,
              processData: false,
              contentType: false,
              success: function success(data) {
                if (is_json_string(data)) {
                  data = JSON.parse(data);

                  if (data.success == true) {
                    $('#error_pop').html(success_msg(data.message)); // location.reload();
                  } else if (data.error == true) {
                    $('#error_pop').html(alert_msg(data.message));
                  }
                }
              },
              error: function error() {
                alert("Something went wrong");
              }
            });
          } else if (image == 1) {
            if (data.success == true) {
              location.reload();
            } else if (data.error == true) {
              $('#error_pop').html(alert_msg(data.message));
            }
          } else if (data.error == true) {
            $('#error_pop').html(alert_msg(data.message));
          }
        }
      },
      error: function error() {
        alert("Something went wrong");
      }
    });
  } else {
    $('#error_pop').html(alert_msg('Please upload file before submitting the form'));
  }
}

function media_post() {
  $('#error_pop').html("");
  var data_2  = new FormData($('#product_form_img')[0]);
  var data_1  = $('#mediaForm').serialize(),
      image   = $('#file_doc').val(),
      media   = $('#media_id').length;
      
  data_1      = post_data_default + '&' + data_1;
  
  // add info to data_2
  data_2.append('token', token);
  data_2.append('get_type', post_type[0]);
  data_2.append('url', post_urls[0]);
  image = $('#media_id').length != 0 || image != '' || media != 0 && media != undefined ? 1 : 0;

  if (image) {
    $.ajax({
      url: path_action,
      method: 'post',
      data: data_1,
      success: function success(data) {
        if (is_json_string(data)) {
          data = JSON.parse(data);
          var img_file = $('#file_doc').val();

          if (data.success == true && image == 1 && img_file != 0 && img_file != undefined) {
            $('#error_pop').html(success_msg(data.message));
            $.ajax({
              url: path_action,
              method: 'post',
              data: data_2,
              processData: false,
              contentType: false,
              success: function success(data) {
                if (is_json_string(data)) {
                  data = JSON.parse(data);

                  if (data.success == true) {
                    
                    if (data.hasOwnProperty('reload') && data.reload == false) {
                      $('#error_pop').html(success_msg(data.message));
                    } else {
                      reloadWindow();
                    }
                  } else if (data.error == true) {
                    $('#error_pop').html(alert_msg(data.message));
                  }
                } else {}
              },
              error: function error() {
                alert("Something went wrong");
              }
            });
          } else if (image == 1) {
            if (data.success == true) {
              reloadWindow();
            } else if (data.error == true) {
              $('#error_pop').html(alert_msg(data.message));
            }
          } else if (data.error == true) {
            $('#error_pop').html(alert_msg(data.message));
          }
        }
      },
      error: function error() {
        alert("Something went wrong");
      }
    });
  } else {
    $('#error_pop').html(alert_msg('Please upload file before submitting the form'));
  }
}

function modal_user_post() {
  $('#error_pop').html("");

  var data_1 = $('#userForm').serialize(),
      image  = $('#post_image').val(),
      data_2 = new FormData($('#product_form_img')[0]);

  data_1 = post_data_default + '&' + data_1;

  // add info to data_2
  data_2.append('token', token);
  data_2.append('get_type', post_type[0]);
  data_2.append('url', post_urls[2]);

  image = ($('#image_profile').prop('src') != '' || image != '' )?1:0;

  if (image) {
    $.ajax({
      url: path_action,
      method: 'post',
      data: data_1,
      success: function(data) {

        if (is_json_string(data)) {
          data = JSON.parse(data);
          if (data.success == true && image == 1 || $('#product_id').length != 0) {
            $('#error_pop').html(success_msg(data.message));
            $.ajax({
              url: path_action,
              method: 'post',
              data: data_2,
              processData: false,
              contentType: false,
              success : function(data){
                if (is_json_string(data)) {
                  data = JSON.parse(data);
                  if (data.success == true) {
                    $('#error_pop').html(success_msg(data.message));
                    // location.reload();
                  } else if (data.error == true) {
                    $('#error_pop').html(alert_msg(data.message));
                  }

                  if (data.url == 'refresh') {
                    location.reload();
                  }
                } 
              },
              error : function(){alert("Something went wrong");}
            });
          } else if (image == 1){
            if (data.success == true) {
              location.reload();
            } else if (data.error == true) {
              $('#error_pop').html(alert_msg(data.message));
            }
          } else if (data.error == true) {
            $('#error_pop').html(alert_msg(data.message));
          }

        } 
      },
      error : function(){alert("Something went wrong");}
    });

  } else {
    $('#error_pop').html(alert_msg('Please upload an image before submitting the form'));
  }
}

function post_comment(post_id, htmlid) {
  var type = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'comment';
  var islogged = $('#islogged').val();

  if (islogged) {
    var form_id = type == 'comment' ? 'commentForm_' : 'commentReForm_';
    form_id = form_id + post_id;
    var data = $('#' + form_id).serialize();
    data = data + '&' + post_data_default;
    $.ajax({
      url: path_action,
      method: "POST",
      data: data,
      success: function success(data) {
        if (is_json_string(data)) {
          data = JSON.parse(data);

          if (data.success == true && data.error == false) {
            $('#' + htmlid).html(success_msg(data.message));
            var ret = true;

            if (data.url != '') {
              window_load(data.url);
            }
          } else if (data.error = true) {
            $('#' + htmlid).html(alert_msg(data.message));
          }
        }
      },
      error: function error(XMLHttpRequest, textStatus, errorThrown) {
        var err_message = 'There was an error on your request ! : ' + XMLHttpRequest.statusText;
        var modal_alert = $('#modal_alert_check');

        if (modal_alert.length > 0 && parseInt(modal_alert.val()) == 0) {
          requestModal(post_modal[14], post_modal[14], {
            'modal_err': true,
            'modal_msg': err_message
          });
          modal_alert.val(1);
        } else {}
      }
    });
  } else {
    window.article_id = post_id;
    requestModal(post_modal[10], post_modal[10], {
      'user': true
    });
  }
}

function search_res() {
  var search_text = $('#search_input').val();

  if (search_text == '') {
    $('.wrapper').toggleClass('animate');
    $('#nav_ul').toggleClass('hidden');
  } else {
    window.location.href = 'search?search=' + search_text;
  }
}

function srolltodiv(div) {
  this.preventDefault;
  $('html, body').animate({
    scrollTop: $("#" + div).offset().top
  }, 1500);
}

function TwtCheck($data) {
  data = Object.assign({
    'url': post_urls[0],
    'get_type': post_type[0],
    'token': token
  }, data);
  $.ajax({
    url: path_action,
    method: "POST",
    data: data,
    success: function success(data) {
      if (is_json_string(data)) {
        data = JSON.parse(data);

        if (data.url == 'refresh') {
          location.reload();
        } else if (data.url != '') {
          window.location.href = data.url;
        } else if (data.success == true && data.message != '') {
          $('#' + htmlid).html(success_msg(data.message));
        } else if (data.success == true && data.error == false) {
          $('#' + htmlid).html(success_msg(data.message));
          ret = true;

          if (data.url != '') {// location.reload();
          }
        } else if (data.error = true) {
          $('#' + htmlid).html(alert_msg(data.message));
        }
      } else {// location.reload();
      }
    },
    error: function error(XMLHttpRequest, textStatus, errorThrown) {
      alert('There was an error on your request ! : ' + XMLHttpRequest.statusText);
    }
  });
}