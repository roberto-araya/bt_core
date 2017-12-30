<?php

namespace Drupal\bt_core\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\page_manager\Entity\Page;

/**
 * Provides menu links of all Node entities with type "Page".
 */
class IpePageMenuLinkDerivative extends DeriverBase{
    /**
     * {@inheritdoc}
     */
    public function getDerivativeDefinitions($base_plugin_definition) {
        $links = array();
        $pages = [
            'home' => 'Website main page',
            'about_us' => 'Learn more about us',
            'services' => 'Get to know our services'
        ];
        foreach ($pages as $page_name => $description) {
            $page = Page::load('ipe_' . $page_name);
            $w = 0;
            $route_name = 'page_manager.page_view_ipe_' . $page_name . '_ipe_' . $page_name . '-panels_variant-0';
            if ($page->status()) {
                $links['main_ipe' . $page->id()] = [
                        'title' => $page->label(),
                        'description' => $description,
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