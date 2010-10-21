<?php

/**
 * TalkSection form base class.
 *
 * @method TalkSection getObject() Returns the current form's model object
 *
 * @package    FISHERY
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTalkSectionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'parent' => new sfWidgetFormInputText(),
      'name'   => new sfWidgetFormInputText(),
      'lft'    => new sfWidgetFormInputText(),
      'rgt'    => new sfWidgetFormInputText(),
      'level'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'parent' => new sfValidatorInteger(array('required' => false)),
      'name'   => new sfValidatorString(array('max_length' => 50)),
      'lft'    => new sfValidatorInteger(array('required' => false)),
      'rgt'    => new sfValidatorInteger(array('required' => false)),
      'level'  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('talk_section[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TalkSection';
  }

}