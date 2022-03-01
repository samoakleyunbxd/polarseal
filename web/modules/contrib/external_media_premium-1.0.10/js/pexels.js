(function ($, Drupal, drupalSettings) {

  "use strict";

  /**
   * Pexels.
   */
  Drupal.behaviors.ExternalMediaPexels = {
    attach: function (context, settings) {
      $('.form-type-external-media a.' + settings.pexels_class + ', .webform-submission-form a.' + settings.pexels_class, context).unbind().click(function(e) {
        Drupal.behaviors.emwCore.popupHtml($(this), settings.pexels_url, 1050, 650);
        e.preventDefault();
      });
    }
  };

  Drupal.behaviors.emwCore.initViewer(
    'url', function(plugin_id, max_filesize, extensions, description, cardinality, is_multiselect) {

      $('select.image-list-type').on('change', function() {
        if ($(this).val() == 'curated') {
          $('input.query').hide();
          $('.form-submit').attr('value', Drupal.t('Show'));
        }
        else {
          $('input.query').show();
          $('.form-submit').attr('value', Drupal.t('Search'));
        }
      });

      Drupal.behaviors.emwCore.loadResource(plugin_id, '.pexels-form', {
          'query': 'input.query', 'page': 'input#current_page', 'image-list-type': 'select.image-list-type'
        },
        function(item) {
          var exts = extensions.split(',');
          var profile = (item.photographer_url !== '') ? '<a href="' + item.photographer_url + '" target="_blank">' + Drupal.t('See profile') + '</a>' : '';
          var fileExt = item.src.large.split('?')[0].split('#')[0].split('.').pop();
          var name = Drupal.t('By @name', {'@name': item.photographer});
          var selected = Drupal.behaviors.emwCore.selectedClass(plugin_id, item.src.large);
          if (exts.length) {
            if (exts.includes(fileExt) && Drupal.behaviors.emwCore.isExtSafe(fileExt)) {
              return `<div class="flex-item item-pick${selected}" data-url="${item.src.large}">
                  <div class="profile-info">
                    <div class="details">
                      <div class="username">${item.photographer}</div>
                      <div class="pexel-name">${profile}</div>
                    </div>
                  </div>
                  <div class="checked">&#10004;</div>
                  <div class="image"><img src="${item.src.large}" border="0" /></div>
                  <div class="item-caption">${name}</div>
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
