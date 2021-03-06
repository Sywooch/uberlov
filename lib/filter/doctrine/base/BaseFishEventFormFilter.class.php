<?php

/**
 * FishEvent filter form base class.
 *
 * @package    FISHERY
 * @subpackage filter
 * @author     Sergei Belov <limitium@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFishEventFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'date'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'        => new sfWidgetFormFilterInput(),
      'schedule'           => new sfWidgetFormFilterInput(),
      'price'              => new sfWidgetFormFilterInput(),
      'contact'            => new sfWidgetFormFilterInput(),
      'rules'              => new sfWidgetFormFilterInput(),
      'users'              => new sfWidgetFormFilterInput(),
      'location_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Location'), 'add_empty' => true)),
      'fish_event_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FishEventType'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedBy'), 'add_empty' => true)),
      'updated_by'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedBy'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'date'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'name'               => new sfValidatorPass(array('required' => false)),
      'description'        => new sfValidatorPass(array('required' => false)),
      'schedule'           => new sfValidatorPass(array('required' => false)),
      'price'              => new sfValidatorPass(array('required' => false)),
      'contact'            => new sfValidatorPass(array('required' => false)),
      'rules'              => new sfValidatorPass(array('required' => false)),
      'users'              => new sfValidatorPass(array('required' => false)),
      'location_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Location'), 'column' => 'id')),
      'fish_event_type_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('FishEventType'), 'column' => 'id')),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CreatedBy'), 'column' => 'id')),
      'updated_by'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UpdatedBy'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('fish_event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FishEvent';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'date'               => 'Date',
      'name'               => 'Text',
      'description'        => 'Text',
      'schedule'           => 'Text',
      'price'              => 'Text',
      'contact'            => 'Text',
      'rules'              => 'Text',
      'users'              => 'Text',
      'location_id'        => 'ForeignKey',
      'fish_event_type_id' => 'ForeignKey',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'created_by'         => 'ForeignKey',
      'updated_by'         => 'ForeignKey',
    );
  }
}
