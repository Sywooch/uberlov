<?php

/**
 * Vote filter form base class.
 *
 * @package    FISHERY
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVoteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'value'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'voter'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Voter'), 'add_empty' => true)),
      'toward'      => new sfWidgetFormFilterInput(),
      'location_id' => new sfWidgetFormFilterInput(),
      'comment_id'  => new sfWidgetFormFilterInput(),
      'profit_id'   => new sfWidgetFormFilterInput(),
      'profile_id'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'value'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'voter'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Voter'), 'column' => 'id')),
      'toward'      => new sfValidatorPass(array('required' => false)),
      'location_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'profit_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'profile_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vote_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vote';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'value'       => 'Number',
      'voter'       => 'ForeignKey',
      'toward'      => 'Text',
      'location_id' => 'Number',
      'comment_id'  => 'Number',
      'profit_id'   => 'Number',
      'profile_id'  => 'Number',
    );
  }
}