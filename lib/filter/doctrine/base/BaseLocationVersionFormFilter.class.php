<?php

/**
 * LocationVersion filter form base class.
 *
 * @package    FISHERY
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseLocationVersionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'depth'              => new sfWidgetFormFilterInput(),
      'location_flow_id'   => new sfWidgetFormFilterInput(),
      'location_fundus_id' => new sfWidgetFormFilterInput(),
      'location_relief_id' => new sfWidgetFormFilterInput(),
      'location_type_id'   => new sfWidgetFormFilterInput(),
      'location_scope_id'  => new sfWidgetFormFilterInput(),
      'created_by'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'updated_by'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'latitude'           => new sfWidgetFormFilterInput(),
      'longitude'          => new sfWidgetFormFilterInput(),
      'slug'               => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'               => new sfValidatorPass(array('required' => false)),
      'description'        => new sfValidatorPass(array('required' => false)),
      'depth'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'location_flow_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'location_fundus_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'location_relief_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'location_type_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'location_scope_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by'         => new sfValidatorPass(array('required' => false)),
      'updated_by'         => new sfValidatorPass(array('required' => false)),
      'latitude'           => new sfValidatorPass(array('required' => false)),
      'longitude'          => new sfValidatorPass(array('required' => false)),
      'slug'               => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('location_version_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LocationVersion';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'name'               => 'Text',
      'description'        => 'Text',
      'depth'              => 'Number',
      'location_flow_id'   => 'Number',
      'location_fundus_id' => 'Number',
      'location_relief_id' => 'Number',
      'location_type_id'   => 'Number',
      'location_scope_id'  => 'Number',
      'created_by'         => 'Text',
      'updated_by'         => 'Text',
      'latitude'           => 'Text',
      'longitude'          => 'Text',
      'slug'               => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'version'            => 'Number',
    );
  }
}