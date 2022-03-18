<?php

namespace Drupal\bt_core\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Multifield type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "multifield_type",
 *   label = @Translation("Multifield type"),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\bt_core\Form\MultifieldTypeForm",
 *       "edit" = "Drupal\bt_core\Form\MultifieldTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\bt_core\MultifieldTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer multifield types",
 *   bundle_of = "multifield",
 *   config_prefix = "multifield_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/multifield_types/add",
 *     "edit-form" = "/admin/structure/multifield_types/manage/{multifield_type}",
 *     "delete-form" = "/admin/structure/multifield_types/manage/{multifield_type}/delete",
 *     "collection" = "/admin/structure/multifield_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class MultifieldType extends ConfigEntityBundleBase {

  /**
   * The machine name of this multifield type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the multifield type.
   *
   * @var string
   */
  protected $label;

}
