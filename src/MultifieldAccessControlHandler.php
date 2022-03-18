<?php

namespace Drupal\bt_core;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for the multifield entity type.
 */
class MultifieldAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view multifield');

      case 'update':
        return AccessResult::allowedIfHasPermissions(
          $account,
          ['edit multifield', 'administer multifield'],
           'OR'
        );

      case 'delete':
        return AccessResult::allowedIfHasPermissions(
          $account,
          ['delete multifield', 'administer multifield'],
          'OR'
        );

      default:
        // No opinion.
        return AccessResult::neutral();
    }

  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermissions(
      $account,
      ['create multifield', 'administer multifield'],
      'OR'
    );
  }

}
