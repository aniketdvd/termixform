<?php

namespace Drupal\example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements an example form.
 */
class ExampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'example_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['inp_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('<div style="font-size: 15px; padding: 5px; color: yellow; background: black;">root&#64;form:~# Your full name: </div>'),
    ];
    $form['inp_age'] = [
      '#type' => 'number',
      '#title' => $this->t('<div style="font-size: 15px; padding: 5px; color: yellow; background: black;">root&#64;form:~# Your age: </div>'),
    ];
    $form['inp_dob'] = [
      '#type' => 'date',
      '#title' => $this->t('<div style="font-size: 15px; padding: 5px; color: yellow; background: black;">root&#64;form:~# Your birthdate: </div>'),
    ];
    $form['inp_gender'] = [
      '#type' => 'select',
      '#title' => $this->t('<div style="font-size: 15px; padding: 5px; color: yellow; background: black;">root&#64;form:~# Your gender: </div>'),
      '#options' => [
        'male' => $this->t('Male'),
        'female' => $this->t('Female'),
        'other' => $this->t('Other'),
      ],
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate message :)'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
  **/

  public function validateForm(array &$form, FormStateInterface $form_state) {
    if($form_state->getValue('inp_name')==''){
      $form_state->setErrorByName('inp_name', $this->t('Sorry, but we need your name.'));
    }
    if($form_state->getValue('inp_age')<=0 || $form_state->getValue('inp_age')<=''){
      $form_state->setErrorByName('inp_age', $this->t('Do you even exist ?'));
    }
    if($form_state->getValue('inp_age')>=110){
      $form_state->setErrorByName('inp_age', $this->t('you sure you a hooman?'));
    }
  }

  /**
   * {@inheritdoc}
  **/

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $messenger = \Drupal::messenger();
    $name = $form_state->getValue('inp_name');
    $age = $form_state->getValue('inp_age');
    $gender = $form_state->getValue('inp_gender');
    $dob = $form_state->getValue('inp_dob');
    $messenger->addMessage($this->t('Your name is @name', ['@name'=>$name]));
    $messenger->addMessage($this->t('You are @age years old', ['@age'=>$age]));
    $messenger->addMessage($this->t('You were born on @date', ['@date'=>$dob]));
    $messenger->addMessage($this->t('You are @gender', ['@gender'=>$gender]));
    }
}