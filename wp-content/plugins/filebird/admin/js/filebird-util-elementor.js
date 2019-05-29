'use strict';
var ntWMC = {};
ntWMC.filebird_begin_loading = function () {
  jQuery('.njt-filebird-loader').addClass('loading');
}
ntWMC.filebird_finish_loading = function () {

  jQuery('.njt-filebird-loader.loading').removeClass('loading').addClass('finish');
  setTimeout(function () {
    jQuery('.njt-filebird-loader.finish').removeClass('finish');
  }, 400);

}
ntWMC.ntWMCgetBackboneOfMedia = function (obj) {
  // Get the attachments browser
  var parentModal = obj.parents(".media-modal"),
    browser, backboneView;
  if (parentModal.length > 0) {
    browser = parentModal.find(".attachments-browser");
  } else {
    browser = jQuery("#wpbody-content .attachments-browser");
  }
  backboneView = browser.data("backboneView");
  return { browser: browser, view: backboneView };
}
ntWMC.updateCount = function (term_from, term_to) {

  if (term_from == -1) {
    jQuery('.menu-item.uncategory .jstree-anchor').addClass('need-refresh');
  }

  if (term_from != term_to) {
    if (term_from) {
      var count_term_from = jQuery('.menu-item[data-id="' + term_from + '"]').attr('data-number');
      count_term_from = Number(count_term_from) - 1;
      if (count_term_from) {
        jQuery('.menu-item[data-id="' + term_from + '"]').attr('data-number', count_term_from);
      } else {
        jQuery('.menu-item[data-id="' + term_from + '"]').removeAttr('data-number');
      }
    }
    if (term_to) {
      var count_term_to = jQuery('.menu-item[data-id="' + term_to + '"]').attr('data-number');
      if (!count_term_to) {
        count_term_to = 0;
      }
      count_term_to = Number(count_term_to) + 1;
      jQuery('.menu-item[data-id="' + term_to + '"]').attr('data-number', count_term_to);
    }
  }

}

ntWMC.updateCountAfternDeleteFolder = function (deleted_count) {

  var count_term_to = jQuery('.menu-item.uncategory').attr('data-number');
  if (typeof count_term_to == 'undefined') {
    count_term_to = 0;
  }
  count_term_to = Number(count_term_to) + Number(deleted_count);
  jQuery('.menu-item.uncategory').attr('data-number', count_term_to);
  jQuery('.menu-item.uncategory .jstree-anchor').addClass('need-refresh');
}
ntWMC.dragFile = function (container) {
  // var text_drag = filebird_translate.move_1_file;
  // $("body").append('<div id="njt-filebird-attachment" data-id="">' + text_drag + '</div>');
  // var drag_item = $("#njt-filebird-attachment");
  // container.drag("start", function (ev) {
  //   var selected_files = $(".attachments li.selected:not(.selection)");
  //   if (selected_files.length > 0) {

  //     text_drag = filebird_translate.Move + ' ' + selected_files.length + ' ' + filebird_translate.files;
  //   }
  //   drag_item.html(text_drag);
  //   $('body').addClass('njt-draging');
  //   drag_item.show();
  // })
  //   .drag("end", function () {
  //     drag_item.hide();
  //     $('body').removeClass('njt-draging');
  //   })
  //   .drag(function (ev, dd) {
  //     var id = $(this).data("id");

  //     drag_item.data("id", id);

  //     drag_item.css({
  //       "top": ev.clientY - 15,
  //       "left": ev.clientX - 15,
  //     });
  //   }, { click: true })

  var text_drag = filebird_translate.move_1_file;
  $("body").append(
    '<div id="njt-filebird-attachment" data-id="">' + text_drag + "</div>"
  );
  var drag_item = $("#njt-filebird-attachment");
  container.draggable({
    cursorAt: { top: 0, left: 0 },
    helper: function (event) {
      return $("<span></span>");
    },
    start: function (event, ui) {
      var selected_files = $(".attachments li.selected:not(.selection)");
      if (selected_files.length > 0) {
        text_drag =
          filebird_translate.Move +
          " " +
          selected_files.length +
          " " +
          filebird_translate.files;
      }
      drag_item.html(text_drag);
      $("body").addClass("njt-draging");
      drag_item.show();
    },

    stop: function (event, ui) {
      drag_item.hide();
      $("body").removeClass("njt-draging");
    },

    drag: function (ev, dd) {
      var id = $(this).data("id");

      drag_item.data("id", id);

      drag_item.css({
        top: ev.clientY - 15,
        left: ev.clientX - 15
      });
    }
  });
}

ntWMC.dropFile = function () {
  // if ($('.menu-item-bar.jstree-anchor').length || $('.item.jstree-anchor').length) {
  //   $('body').on("drop", ".menu-item-bar.jstree-anchor, .item.jstree-anchor", function (event) {
  //     var des_folder_id = $(this).parent().attr('data-id');

  //     var ids = ntWMC.njt_get_seleted_files();

  //     if (ids.length) {
  //       ntWMC.njt_move_multi_attachments(ids, des_folder_id, event);
  //     } else {
  //       if ($('body').hasClass('njt-draging')) {
  //         ntWMC.njt_move_1_attachment(event, des_folder_id);
  //       }
  //     }
  //   });
  // }

  if (
    $(".menu-item-bar.jstree-anchor").length ||
    $(".item.jstree-anchor").length
  ) {
    $(".menu-item-bar.jstree-anchor, .item.jstree-anchor").droppable({
      drop: function (event, ui) {
        var des_folder_id = $(this)
          .parent()
          .attr("data-id");
        var ids = ntWMC.njt_get_seleted_files();
        if (ids.length) {
          ntWMC.njt_move_multi_attachments(ids, des_folder_id, event);
        } else {
          if ($("body").hasClass("njt-draging")) {
            ntWMC.njt_move_1_attachment(event, des_folder_id);
          }
        }
      }
    });
  }
}

ntWMC.njt_get_seleted_files = function () {
  var selected_files = $('.attachments li.selected');

  var ids = [];

  if (selected_files.length) {

    selected_files.each(function (index, item) {

      ids.push($(item).data("id"));

    });

    return ids;
  }
  return false;
}//njt_get_seleted_files

ntWMC.njt_move_multi_attachments = function (ids, des_folder_id, event) {

  $(event.target).addClass("need-refresh");

  var data = {};

  data.ids = ids;

  data.folder_id = des_folder_id;

  data.action = 'filebird_save_multi_attachments';
  ntWMC.filebird_begin_loading();
  jQuery.ajax({
    type: "POST",
    dataType: 'json',
    data: data,
    url: ajaxurl,
    success: function (res) {
      if (res.success) {

        res.data.forEach(function (item) {
          ntWMC.updateCount(item.from, item.to);
          $('ul.attachments li[data-id="' + item.id + '"]').hide()
        });
        $('.jstree-anchor').addClass("need-refresh");
        //$('#menu-item-' + des_folder_id + ' .jstree-anchor').trigger('click');

      }

      ntWMC.filebird_finish_loading();

    }
  });// ajax 2
}//njt_move_multi_attachments

ntWMC.njt_move_1_attachment = function (event, des_folder_id) {
  var drag_item = $("#njt-filebird-attachment");
  var attachment_id = drag_item.data("id");

  var attachment_item = $('.attachment[data-id="' + attachment_id + '"]');

  var current_folder = $(".wpmediacategory-filter").val();

  if (des_folder_id === 'all' || des_folder_id == current_folder)
    return;

  ntWMC.filebird_begin_loading();

  jQuery.ajax({
    type: "POST",
    dataType: 'json',
    data: { id: attachment_id, action: 'nt_wcm_get_terms_by_attachment' },
    url: ajaxurl,
    success: function (resp) {
      if (!$.trim(resp.data)) {
        console.log("filebird no data found");
        ntWMC.filebird_finish_loading();
      }
      else {
        // get terms of attachment
        var terms = Array.from(resp.data, v => v.term_id);
        //check if drag to owner folder

        if (terms.includes(Number(des_folder_id))) {

          ntWMC.filebird_finish_loading();

          return;
        }

        $(event.target).addClass("need-refresh");

        var data = {};

        data.id = attachment_id;

        //data.nonce = '158b7ba0e5';
        data.attachments = {};

        data.attachments[attachment_id] = { menu_order: 0 };

        data.folder_id = des_folder_id;

        data.action = 'filebird_save_attachment';

        jQuery.ajax({
          type: "POST",
          dataType: 'json',
          data: data,
          url: ajaxurl,
          success: function (res) {

            if (res.success) {

              $.each(terms, function (index, value) {

                ntWMC.updateCount(value, des_folder_id);
              });
              console.log(current_folder, terms.length);
              //if attachment not in any terms (folder)
              if (current_folder === 'all' && !terms.length) {

                //ntWMC.updateCount(-1, null);

                ntWMC.updateCount(-1, des_folder_id);
              }

              if (current_folder == -1) {

                ntWMC.updateCount(-1, des_folder_id);
              }

              if (current_folder != 'all') {

                attachment_item.detach();
              }

            }

            ntWMC.filebird_finish_loading();
            // $('#menu-item-' + des_folder_id + ' .jstree-anchor').trigger('click');

          }
        });// ajax 2
      }
    }
  });//ajax 1
} //njt_move_1_attachment