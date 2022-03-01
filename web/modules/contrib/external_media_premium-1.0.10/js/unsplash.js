(function ($, Drupal, drupalSettings) {

  "use strict";

  /**
   * Unsplash.
   */
  Drupal.behaviors.ExternalMediaUnsplash = {
    attach: function (context, settings) {
      $('.form-type-external-media a.' + settings.unsplash_class + ', .webform-submission-form a.' + settings.unsplash_class, context).unbind().click(function(e) {
        Drupal.behaviors.emwCore.popupHtml($(this), settings.unsplash_redirect_url, 1050, 650);
        e.preventDefault();
      });
    }
  };

  Drupal.behaviors.emwCore.initViewer(
    'id', function(plugin_id, max_filesize, extensions, description, cardinality, is_multiselect) {
      Drupal.behaviors.emwCore.loadResource(plugin_id, '.unsplash-form', {
          'query': 'input.query', 'page': 'input#current_page', 'orientation': 'select.orientation'
        },
        function(item) {
          var name = Drupal.t('By @name', {'@name': item.user.name});
          var unsplash = 'Unsplash: <a href="https://unsplash.com/@' + item.user.username + '" target="_blank">' + item.user.username + '</a>';
          var instagram = (item.user.instagram_username !== '') ? 'Instagram: <a href="https://www.instagram.com/' + item.user.instagram_username + '" target="_blank">' + item.user.instagram_username + '</a>' : '';
          var selected = Drupal.behaviors.emwCore.selectedClass(plugin_id, item.id);
          // Only show if extensions match at least to jpg/jpeg.
          if (Drupal.behaviors.emwCore.matchSomeExt(extensions, ['jpg', 'jpeg'])) {
            return `<div class="flex-item item-pick${selected}" data-id="${item.id}">
                <div class="profile-info">
                  <div class="details">
                    <div class="username">${item.user.name}</div>
                    <div class="unsplash-name">${unsplash}</div>
                    <div class="instagram-name">${instagram}</div>
                  </div>
                </div>
                <div class="checked">&#10004;</div>
                <div class="image"><img src="${item.urls.thumb}" border="0" /></div>
                <div class="item-caption">${name}</div>
              </div>`;
          }
          else {
            return Drupal.behaviors.emwCore.extNotFound;
          }
        }
      );
    }
  );

}(jQuery, Drupal, drupalSettings));
