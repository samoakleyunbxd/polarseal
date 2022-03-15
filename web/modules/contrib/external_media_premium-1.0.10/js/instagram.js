(function ($, Drupal, drupalSettings) {

  "use strict";

  /**
   * Instagram.
   */
  Drupal.behaviors.ExternalMediaInstagram = {
    attach: function (context, settings) {
      $('.form-type-external-media a.' + settings.instagram_class + ', .webform-submission-form a.' + settings.instagram_class, context).unbind().click(function(e) {
        Drupal.behaviors.emwCore.popupHtml($(this), settings.instagram_redirect_url, 880, 650);
        e.preventDefault();
      });
    }
  };

  Drupal.behaviors.emwCore.initViewer(
    'id', function(plugin_id, max_filesize, extensions, description, cardinality, is_multiselect) {
      Drupal.behaviors.emwCore.loadResource(plugin_id, null, {},
        function(item) {
          var exts = extensions.split(',');
          var selected = Drupal.behaviors.emwCore.selectedClass(plugin_id, item.id);
          var mediaExt = (item.media_type == 'IMAGE' || item.media_type == 'CAROUSEL_ALBUM') ? 'jpg' : 'mp4';
          var thumbnail = (item.media_type == 'IMAGE' || item.media_type == 'CAROUSEL_ALBUM') ? item.media_url : item.thumbnail_url ;
          if (exts.length) {
            if (exts.includes(mediaExt) && Drupal.behaviors.emwCore.isExtSafe(mediaExt)) {
              return `<div class="flex-item item-pick${selected}" data-id="${item.id}" data-ext="${mediaExt}">
                <div class="media-type ${item.media_type.toLowerCase()}">${mediaExt.toUpperCase()}</div>
                <div class="checked">&#10004;</div>
                <div class="image"><img src="${thumbnail}" border="0" /></div>
                <div class="item-caption">${item.caption}</div>
              </div>`;
            }
            else {
              return Drupal.behaviors.emwCore.extNotFound;
            }
          }
        }
      );
  });

}(jQuery, Drupal, drupalSettings));
