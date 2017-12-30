<?php

namespace Drupal\bt_core\Config;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Config\ConfigFactoryOverrideInterface;

/**
 *
 */
class ConfigCoreOverride implements ConfigFactoryOverrideInterface {

    /**
     * {@inheritdoc}
     */
    public function loadOverrides($names) {
        $overrides = array();
        if (in_array('system.site', $names)) {
            // Set front page to "home".
            $overrides['system.site']['page']['front'] = '/home';
        }
        /*if (in_array('system.theme', $names)) {
            // Configure default and system themes
            $overrides['system.theme']['admin'] = 'adminimal_theme';
        }*/
        return $overrides;
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheSuffix() {
        return 'ConfigCoreOverride';
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheableMetadata($name) {
        return new CacheableMetadata();
    }

    /**
     * {@inheritdoc}
     */
    public function createConfigObject($name, $collection = StorageInterface::DEFAULT_COLLECTION) {
        return NULL;
    }
}