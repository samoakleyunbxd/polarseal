(function ($, Drupal, drupalSettings) {

  "use strict";

  /**
   * Scraper.
   */
  Drupal.behaviors.ExternalMediaScraper = {
    attach: function (context, settings) {
      $('.form-type-external-media a.' + settings.scraper_class + ', .webform-submission-form a.' + settings.scraper_class, context).unbind().click(function(e) {
        Drupal.behaviors.emwCore.popupHtml($(this), settings.scraper_url, 1050, 650);
        e.preventDefault();
      });
    }
  };

  Drupal.behaviors.emwCore.initViewer(
    'url', function(plugin_id, max_filesize, extensions, description, cardinality, is_multiselect) {
      Drupal.behaviors.emwCore.loadResource(plugin_id, '.scraper-form', {
          'remote_url': 'input.remote_url'
        },
        function(item) {
          var exts = extensions.split(',');
          var fileExt = item.url.split('.').pop();
          var selected = Drupal.behaviors.emwCore.selectedClass(plugin_id, item.url);
          if (exts.length) {
            if (exts.includes(fileExt) && Drupal.behaviors.emwCore.isExtSafe(fileExt)) {
              return `<div class="flex-item item-pick${selected}" data-url="${item.url}" data-ext="${fileExt}">
                <div class="checked">&#10004;</div>
                <div class="image"><img src="${item.url}" border="0" /></div>
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
