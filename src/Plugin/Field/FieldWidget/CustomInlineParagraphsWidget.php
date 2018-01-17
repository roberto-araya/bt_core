<?php

namespace Drupal\bt_core\Plugin\Field\FieldWidget;

use Drupal\paragraphs\Plugin\Field\FieldWidget\InlineParagraphsWidget;

/**
 * Plugin implementation of the 'entity_reference paragraphs' widget.
 *
 * We hide add / remove buttons when translating to avoid accidental loss of
 * data because these actions effect all languages.
 *
 * @FieldWidget(
 *   id = "custom_entity_reference_paragraphs",
 *   label = @Translation("Custom Paragraphs Classic"),
 *   description = @Translation("A custom paragraphs inline form widget."),
 *   field_types = {
 *     "entity_reference_revisions"
 *   }
 * )
 */
class CustomInlineParagraphsWidget extends InlineParagraphsWidget {

  /**
   * Builds dropdown button for adding new paragraph.
   *
   * @return array
   *   The form element array.
   */
  protected function buildButtonsAddMode() {
    $add_more_elements = parent::buildButtonsAddMode();
    unset($add_more_elements['#suffix']);

    return $add_more_elements;
  }

}
