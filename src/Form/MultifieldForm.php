<?php

namespace Drupal\bt_core\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the multifield entity edit forms.
 */
class MultifieldForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New multifield %label has been created.', $message_arguments));
      $this->logger('bt_core')->notice('Created new multifield %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The multifield %label has been updated.', $message_arguments));
      $this->logger('bt_core')->notice('Updated new multifield %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.multifield.canonical', ['multifield' => $entity->id()]);
    return $result;
  }

}
