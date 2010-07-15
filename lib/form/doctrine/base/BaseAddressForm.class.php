<?php

/**
 * Address form base class.
 *
 * @method Address getObject() Returns the current form's model object
 *
 * @package    FISHERY
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAddressForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'country_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'area_low_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AreaLow'), 'add_empty' => true)),
      'area_high_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AreaHigh'), 'add_empty' => true)),
      'locality_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Locality'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'country_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'required' => false)),
      'area_low_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AreaLow'), 'required' => false)),
      'area_high_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AreaHigh'), 'required' => false)),
      'locality_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Locality'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('address[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Address';
  }

}