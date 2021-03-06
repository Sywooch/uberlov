<?php

/**
 * Season filter form base class.
 *
 * @package    FISHERY
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSeasonFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'locations_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Location')),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'locations_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Location', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('season_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addLocationsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.LocationSeason LocationSeason')
          ->andWhereIn('LocationSeason.location_id', $values);
  }

  public function getModelName()
  {
    return 'Season';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'locations_list' => 'ManyKey',
    );
  }
}
