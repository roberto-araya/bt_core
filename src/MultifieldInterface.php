<?php

namespace Drupal\bt_core;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a multifield entity type.
 */
interface MultifieldInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  /**
   * Gets the multifield creation timestamp.
   *
   * @return int
   *   Creation timestamp of the multifield.
   */
  public function getCreatedTime();

  /**
   * Sets the multifield creation timestamp.
   *
   * @param int $timestamp
   *   The multifield creation timestamp.
   *
   * @return \Drupal\bt_core\MultifieldInterface
   *   The called multifield entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the multifield status.
   *
   * @return bool
   *   TRUE if the multifield is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets the multifield status.
   *
   * @param bool $status
   *   TRUE to enable this multifield, FALSE to disable.
   *
   * @return \Drupal\bt_core\MultifieldInterface
   *   The called multifield entity.
   */
  public function setStatus($status);

}
