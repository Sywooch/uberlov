<?php

/**
 * LocationVersion form base class.
 *
 * @method LocationVersion getObject() Returns the current form's model object
 *
 * @package    FISHERY
 * @subpackage form
 * @author     Sergei Belov <limitium@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLocationVersionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'name'               => new sfWidgetFormInputText(),
      'description'        => new sfWidgetFormTextarea(),
      'depth'              => new sfWidgetFormInputText(),
      'is_free'            => new sfWidgetFormInputCheckbox(),
      'price'              => new sfWidgetFormTextarea(),
      'location_flow_id'   => new sfWidgetFormInputText(),
      'location_fundus_id' => new sfWidgetFormInputText(),
      'location_relief_id' => new sfWidgetFormInputText(),
      'location_type_id'   => new sfWidgetFormInputText(),
      'location_scope_id'  => new sfWidgetFormInputText(),
      'address_id'         => new sfWidgetFormInputText(),
      'created_by'         => new sfWidgetFormInputText(),
      'updated_by'         => new sfWidgetFormInputText(),
      'slug'               => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'latitude'           => new sfWidgetFormInputText(),
      'longitude'          => new sfWidgetFormInputText(),
      'version'            => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'        => new sfValidatorString(array('required' => false)),
      'depth'              => new sfValidatorNumber(array('required' => false)),
      'is_free'            => new sfValidatorBoolean(array('required' => false)),
      'price'              => new sfValidatorString(array('required' => false)),
      'location_flow_id'   => new sfValidatorInteger(array('required' => false)),
      'location_fundus_id' => new sfValidatorInteger(array('required' => false)),
      'location_relief_id' => new sfValidatorInteger(array('required' => false)),
      'location_type_id'   => new sfValidatorInteger(array('required' => false)),
      'location_scope_id'  => new sfValidatorInteger(array('required' => false)),
      'address_id'         => new sfValidatorInteger(array('required' => false)),
      'created_by'         => new sfValidatorPass(),
      'updated_by'         => new sfValidatorPass(),
      'slug'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
      'latitude'           => new sfValidatorPass(array('required' => false)),
      'longitude'          => new sfValidatorPass(array('required' => false)),
      'version'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('version')), 'empty_value' => $this->getObject()->get('version'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('location_version[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LocationVersion';
  }

}
