<?php

/**
 * BaseCity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $sfGuardUserProfile
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getName()               Returns the current record's "name" value
 * @method Doctrine_Collection getSfGuardUserProfile() Returns the current record's "sfGuardUserProfile" collection
 * @method City                setId()                 Sets the current record's "id" value
 * @method City                setName()               Sets the current record's "name" value
 * @method City                setSfGuardUserProfile() Sets the current record's "sfGuardUserProfile" collection
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseCity extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('city');
        $this->hasColumn('id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 30, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '30',
             ));

        $this->option('type', 'INNODB');
        $this->option('charset', 'utf8');
        $this->option('collate', 'utf8_general_ci');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardUserProfile', array(
             'local' => 'id',
             'foreign' => 'city_id'));
    }
}