(function ($, Drupal, drupalSettings) {

  "use strict";

  /**
   * Pixabay.
   */
  Drupal.behaviors.ExternalMediaPixabay = {
    attach: function (context, settings) {
      $('.form-type-external-media a.' + settings.pixabay_class + ', .webform-submission-form a.' + settings.pixabay_class, context).unbind().click(function(e) {
        Drupal.behaviors.emwCore.popupHtml($(this), settings.pixabay_url, 1050, 650);
        e.preventDefault();
      });
    }
  };

  Drupal.behaviors.emwCore.initViewer(
    'url', function(plugin_id, max_filesize, extensions, description, cardinality, is_multiselect) {
      Drupal.behaviors.emwCore.loadResource(plugin_id, '.pixabay-form', {
          'query': 'input.query', 'page': 'input#current_page', 'orientation': 'select.orientation',
          'image_type': 'select.image_type', 'type': 'select.type'
        },
        function(item) {
          var exts = extensions.split(',');
          var profile = '<a href="https://pixabay.com/users/' + item.user + '-' + item.user_id + '" target="_blank">' + Drupal.t('See profile') + '</a>';
          var fileExt = item.largeImageURL.split('.').pop();
          var selected = Drupal.behaviors.emwCore.selectedClass(plugin_id, item.largeImageURL);
          if (exts.length) {
            if (exts.includes(fileExt) && Drupal.behaviors.emwCore.isExtSafe(fileExt)) {
              return `<div class="flex-item item-pick${selected}" data-url="${item.largeImageURL}" data-ext="${fileExt}">
                <div class="profile-info">
                  <div class="details">
                    <div class="username">${item.user}</div>
                    <div class="pexel-name">${profile}</div>
                  </div>
                </div>
                <div class="checked">&#10004;</div>
                <div class="image"><img src="${item.previewURL}" border="0" /></div>
                <div class="item-caption"></div>
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
