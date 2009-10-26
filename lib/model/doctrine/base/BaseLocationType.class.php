<?php

/**
 * BaseLocationType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $Location
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6485 2009-10-12 18:41:59Z jwage $
 */
abstract class BaseLocationType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('location_type');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'default' => '',
             'notnull' => true,
             'length' => '50',
             ));

        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasMany('Location', array(
             'local' => 'id',
             'foreign' => 'location_type_id'));
    }
}