<?php

namespace Drupal\external_media_premium\Plugin\ExternalMedia;

use Drupal\Core\Url;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\external_media_premium\Plugin\ExternalMediaPremiumBase;
use EspressoDev\InstagramBasicDisplay\InstagramBasicDisplay;

/**
 * Scrape images from URL.
 *
 * @ExternalMedia(
 *   id = "scraper_picker",
 *   name = @Translation("Scraper"),
 *   description = @Translation("Scrape images from URL"),
 *   css_class = "scraper-picker",
 *   module = "external_media_premium"
 * )
 */
class Scraper extends ExternalMediaPremiumBase {

  /**
   * {@inheritdoc}
   */
  public function getAttachments() {
    return [
      'library' => ['external_media_premium/external_media_premium.' . $this->getPluginId()],
      'drupalSettings' => [
        'scraper_url' => $this->getRedirectUrl()->toString() . '?q=' . uniqid(), // ?q= to make sure page doesn't get cached.
        'scraper_class' => $this->getClassName(),
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries() {
    return [
      'js' => [
        'js/scraper.js' => [],
      ],
      'dependencies' => ['core/drupal', 'core/jquery', 'core/drupalSettings', 'external_media_premium/external_media_premium.core'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function configForm(array $form, FormStateInterface $form_state) {
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigForm(array &$form, FormStateInterface $form_state) {
    //$this
      //->setSetting('', $form_state->getValue(''));
  }

  /**
   * {@inheritdoc}
   */
  public function getRestResponse() {
    $request = \Drupal::request()->query;
    $remote_url = $request->get('remote_url');
    $min_width = $request->get('min_width');
    $max_width = $request->get('max_width');
    $html = file_get_contents($remote_url);
    preg_match_all('/<img(.*?)src=("|\'|)(.*?)("|\'| )(.*?)>/s', $html, $matches);
    $results = [];
    $index = 0;
    foreach ($matches[3] as $url) {
      $results[] = [
        'url' => $this->makeAbsolute($url, $this->baseUrl($remote_url)),
      ];
      $index++;
    }
    preg_match_all('/<source(.*?)srcset=("|\'|)(.*?)("|\'| )(.*?)>/s', $html, $matches);
    foreach ($matches[3] as $url) {
      if ($src = explode(',', $url)) {
        foreach ($src as $img_url) {
          if ($src_urls = explode(' ', $img_url)) {
            $results[] = [
              'url' => $this->makeAbsolute(trim($src_urls[0]), $this->baseUrl($remote_url)),
            ];
          }
          else {
            $results[] = [
              'url' => $this->makeAbsolute(trim($img_url), $this->baseUrl($remote_url)),
            ];
          }
        }
      }
      else {
        $results[] = [
          'url' => $this->makeAbsolute($url, $this->baseUrl($remote_url)),
        ];
      }
      $index++;
    }
    return $results;
  }

  /**
   * {@inheritdoc}
   */
  public function getFile($url, $destination) {
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    return [
      'source' => $url,
      'destination' => $destination . '/' . basename($parts['path']),
    ];
  }

  protected function makeAbsolute($url, $base) {
    // Return base if no url
    if (!$url) return $this->removeQueryParam($base);

    // Return if already absolute URL
    if (parse_url($url, PHP_URL_SCHEME) != '') return $this->removeQueryParam($url);
   
    // Urls only containing query or anchor
    if ($url[0] == '#' || $url[0] == '?') return $this->removeQueryParam($base . $url);
   
    // Parse base URL and convert to local variables: $scheme, $host, $path
    extract(parse_url($base));

    // If no path, use /
    if ( ! isset($path)) $path = '/';
 
    // Remove non-directory element from path
    $path = preg_replace('#/[^/]*$#', '', $path);
 
    // Destroy path if relative url points to root
    if ($url[0] == '/') $path = '';
   
    // Dirty absolute URL
    $abs = "$host$path/$url";
 
    // Replace '//' or '/./' or '/foo/../' with '/'
    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
    for ($n = 1; $n > 0; $abs = preg_replace($re, '/', $abs, -1, $n)) {}
   
    // Absolute URL is ready!
    return $this->removeQueryParam($scheme . '://'. $abs);
  }

  protected function baseUrl($url) {
    $result = parse_url($url);
    return $result['scheme']. '://' . $result['host'];
  }

  protected function removeQueryParam($url) {
    return strtok($url, '?');
  }

}
