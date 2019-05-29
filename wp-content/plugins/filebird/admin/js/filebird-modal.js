// var filebird_media_menu = $(".media-menu");

var FileBird_Popup = {
  init: function () {
    if ($(".media-button-reverse").is(":visible")) {
      return;
    }

    if ($("#filebird_sidebar").length) {
      setTimeout(() => {
        var selector = $("div[id^='__wp-uploader-id-'].supports-drag-drop:visible");
        if (selector) {
          var id_append = $(selector).attr("id");
          $("#filebird_sidebar").appendTo("#" + id_append + " .media-menu");
          var curr_folder = localStorage.getItem('current_folder') || 'all';
          $('#menu-item-' + curr_folder + ' .jstree-anchor').trigger('click');
          $("#filebird_sidebar").show();
          $('.fb-treeview-loading').hide();
        }
      }, 200);
    } else {
      $.ajax({
        url: ajaxurl,
        type: "post",
        dataType: "text",
        data: {
          action: "filebird_ajax_treeview_folder"
        },
        success: function (res) {
          var selector = $("div[id^='__wp-uploader-id-'].supports-drag-drop:visible");
          if (selector.length) {
            var id_append = $(selector).attr("id");
            var mediaMenu = "#" + id_append + " .media-menu";
            $(res).appendTo(mediaMenu);

            $('.fb-treeview-loading').hide();

            DhTreeFolder.init();
            ntWMC.dropFile();

            var curr_folder = localStorage.getItem('current_folder') || 'all';
            $('#menu-item-' + curr_folder + ' .jstree-anchor').trigger('click');

            $("#filebird_sidebar").show();

            setTimeout(() => {
              $('#filebird_sidebar').bind('remove', function () {
                // $(document).off('click', '.filebird_sidebar .jstree-anchor');
                // njt_trigger_folder.tree_view();
                FileBird_Popup.init();
              })
            }, 100);

            var scrollHeight = $(selector).find(".media-frame.hide-router").length ? 330 : 280
            FileBird_Popup.jstree.init();
            $("#njt-filebird-folderTree").mCustomScrollbar({
              autoHideScrollbar: true,
              setHeight: $(mediaMenu).height() - scrollHeight
            });
            FileBird_Popup.toolbar.init();
          }
        }
      });
    }
  },

  // Vakata Jstree
  jstree: {
    init: function () {
      FileBird_Popup.jstree.default();

      if (localStorage.getItem('current_folder') === 'all' || localStorage.getItem('current_folder') === 'undefined' || localStorage.getItem('current_folder') == null) {
        $('#menu-item-all .menu-item-bar').trigger('click');

      }
    },
    // Init

    default: function () {
      if ($("#njt-filebird-defaultTree").length) {

        $("#njt-filebird-defaultTree").jstree({
          'core': {
            'themes': {
              'responsive': false,
              "icons": false
            }
          },
        });

        $('#njt-filebird-defaultTree').on("changed.jstree", function (e, data) {


          if (data.node) {
            //only active selected node
            var catId = data.node.li_attr['data-id'];

            localStorage.setItem('current_folder', catId);
            $(".jstree-anchor.jstree-clicked").removeClass('jstree-clicked');
            $(".jstree-node.current-dir").removeClass('current-dir');
            $(".jstree-node[data-id='" + catId + "']").addClass('current-dir');
            $(".jstree-node[data-id='" + catId + "']").children('.jstree-anchor').addClass('jstree-clicked');

            if ($('.jstree-anchor.need-refresh').length) {

              var $filebird_sidebar = $('.filebird_sidebar');

              var backbone = ntWMC.ntWMCgetBackboneOfMedia($filebird_sidebar);

              if (backbone.browser.length > 0 && typeof backbone.view == "object") {
                // Refresh the backbone view
                try {
                  backbone.view.collection.props.set({
                    ignore: (+new Date())
                  });
                } catch (e) {
                  console.log(e);
                };
              } else {

                window.location.reload();
              }
              $('.jstree-anchor.need-refresh').removeClass('need-refresh');

            }


            //trigger category on topbar
            $('.wpmediacategory-filter').val(catId);
            $('.wpmediacategory-filter').trigger('change');
          }

          if ($('.menu-item.current_folder').length) {
            if (!$('select[name="njt_filebird_folder"]').length) { //grid list
              $('.menu-item.current_folder').removeClass('current_folder');
            }
          }

        });
      }
    },
    // Default      
  },
  //Jstree

  sweetAlert: {
    delete: function (node) {

      var id = 0;
      if (Array.isArray(node)) {
        id = node[0].data("id");;
      } else {
        id = node.data("id");;
      }


      var li = $('menu-item-' + id);

      if ($(li).next().find(".menu-item-data-parent-id").length && $(li).next().find(".menu-item-data-parent-id").val() == id) {
        swal({
          title: filebird_translate.oops,
          text: filebird_translate.folder_are_sub_directories,
          type: "error"
        });
      } else {

        swal({
          title: filebird_translate.are_you_sure,
          text: filebird_translate.not_able_recover_folder,
          type: "warning",
          confirmButtonText: filebird_translate.yes_delete_it,
          showCancelButton: true,
          cancelButtonText: filebird_translate.cancel,
        }).then(function (result) {

          if (result.value) {

            njt_trigger_folder.delete(id);

            swal(filebird_translate.deleted + '!', filebird_translate.folder_deleted, "success");

          }
        });
      }
    }
  },
  //Sweet Alert

  toolbar: {
    init: function () {
      FileBird_Popup.toolbar.create();
      FileBird_Popup.toolbar.delete();
    },
    //Init

    create: function () {
      if ($(".js__nt_create").length) {
        $(".js__nt_create").on("click", function () {

          var ref = $('#njt-filebird-folderTree').jstree(true),
            sel,
            type = $(this).data("type");
          sel = ref.create_node(null, {
            "type": type
          });

          if (sel) {
            ref.edit(sel);
          }

        });
      }
    },
    //Create

    delete: function () {
      if ($(".js__nt_delete").length) {
        $(".js__nt_delete").on("click", function () {
          var ref = $('#njt-filebird-folderTree .current_folder');

          if (!ref.length) {
            return false;
          }
          FileBird_Popup.sweetAlert.delete(ref);
        });
      }
    },
    //Delete

  },
  //Toolbar

  // Tipped Plugin
  tooltip: {
    init: function () {
      if ($(".js__nt_tipped").length) {
        Tipped.create(".js__nt_tipped", function (element) {
          return {
            title: $(element).data("title"),
            content: $(element).data("content"),
          };
        }, {
            skin: 'blue',
            maxWidth: 250,
          });
      }
    }
  },
  //Tooltip
}