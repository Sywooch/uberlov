<?php

/**
 * Location filter form base class.
 *
 * @package    FISHERY
 * @subpackage filter
 * @author     Sergei Belov <limitium@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLocationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'        => new sfWidgetFormFilterInput(),
      'depth'              => new sfWidgetFormFilterInput(),
      'is_free'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'price'              => new sfWidgetFormFilterInput(),
      'location_flow_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LocationFlow'), 'add_empty' => true)),
      'location_fundus_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LocationFundus'), 'add_empty' => true)),
      'location_relief_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LocationRelief'), 'add_empty' => true)),
      'location_type_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LocationType'), 'add_empty' => true)),
      'location_scope_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LocationScope'), 'add_empty' => true)),
      'address_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Address'), 'add_empty' => true)),
      'created_by'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedBy'), 'add_empty' => true)),
      'updated_by'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedBy'), 'add_empty' => true)),
      'slug'               => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'latitude'           => new sfWidgetFormFilterInput(),
      'longitude'          => new sfWidgetFormFilterInput(),
      'version'            => new sfWidgetFormFilterInput(),
      'wishers_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUserProfile')),
    ));

    $this->setValidators(array(
      'name'               => new sfValidatorPass(array('required' => false)),
      'description'        => new sfValidatorPass(array('required' => false)),
      'depth'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'is_free'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'price'              => new sfValidatorPass(array('required' => false)),
      'location_flow_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LocationFlow'), 'column' => 'id')),
      'location_fundus_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LocationFundus'), 'column' => 'id')),
      'location_relief_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LocationRelief'), 'column' => 'id')),
      'location_type_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LocationType'), 'column' => 'id')),
      'location_scope_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LocationScope'), 'column' => 'id')),
      'address_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Address'), 'column' => 'id')),
      'created_by'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CreatedBy'), 'column' => 'id')),
      'updated_by'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UpdatedBy'), 'column' => 'id')),
      'slug'               => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'latitude'           => new sfValidatorPass(array('required' => false)),
      'longitude'          => new sfValidatorPass(array('required' => false)),
      'version'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wishers_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUserProfile', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('location_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addWishersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.WishList WishList')
      ->andWhereIn('WishList.profile_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Location';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'name'               => 'Text',
      'description'        => 'Text',
      'depth'              => 'Number',
      'is_free'            => 'Boolean',
      'price'              => 'Text',
      'location_flow_id'   => 'ForeignKey',
      'location_fundus_id' => 'ForeignKey',
      'location_relief_id' => 'ForeignKey',
      'location_type_id'   => 'ForeignKey',
      'location_scope_id'  => 'ForeignKey',
      'address_id'         => 'ForeignKey',
      'created_by'         => 'ForeignKey',
      'updated_by'         => 'ForeignKey',
      'slug'               => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'latitude'           => 'Text',
      'longitude'          => 'Text',
      'version'            => 'Number',
      'wishers_list'       => 'ManyKey',
    );
  }
}
