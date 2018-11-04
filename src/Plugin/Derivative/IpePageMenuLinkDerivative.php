<?php

namespace Drupal\bt_core\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\page_manager\Entity\Page;

/**
 * Provides menu links of all Node entities with type "Page".
 */
class IpePageMenuLinkDerivative extends DeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $links = array();
    $langcode = \Drupal::languageManager()->getCurrentLanguage()->getId();

    if ($langcode != 'es' && $langcode != 'en') {
      $langcode = 'en';
    }

    $pages = [
      'home' => [
        'es' => ['Inicio', 'Página principal'],
        'en' => ['Home', 'Website main page'],
      ],
      'about_us' => [
        'es' => ['Nosotros', 'Aprenda más sobre nosotros'],
        'en' => ['About us', 'Learn more about us'],
      ],
      'services' => [
        'es' => ['Servicios', 'Conozca nuestros servicios'],
        'en' => ['Services', 'Get to know our services'],
      ],
    ];
    $w = 0;
    foreach ($pages as $page_name => $description) {
      $page = Page::load('ipe_' . $page_name);
      $route_name = 'page_manager.page_view_ipe_' . $page_name . '_ipe_' . $page_name . '-panels_variant-0';
      if ($page->status()) {
        $links['main_ipe' . $page->id()] = [
          'title' => t($description[$langcode][0]),
          'description' => t($description[$langcode][1]),
          'menu_name' => 'main',
          'weight' => $w,
          'route_name' => $route_name,
        ] + $base_plugin_definition;
      }
      $w++;
    }

    return $links;
  }

}
