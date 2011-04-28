<?php

/**
 * BaseFishEvent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property date $date
 * @property string $name
 * @property string $description
 * @property string $rules
 * @property string $users
 * @property integer $location_id
 * @property integer $fish_event_type_id
 * @property Location $Location
 * @property FishEventType $FishEventType
 * @property Doctrine_Collection $VoteFishEvent
 * @property Doctrine_Collection $CommentFishEvent
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method date                getDate()               Returns the current record's "date" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getDescription()        Returns the current record's "description" value
 * @method string              getRules()              Returns the current record's "rules" value
 * @method string              getUsers()              Returns the current record's "users" value
 * @method integer             getLocationId()         Returns the current record's "location_id" value
 * @method integer             getFishEventTypeId()    Returns the current record's "fish_event_type_id" value
 * @method Location            getLocation()           Returns the current record's "Location" value
 * @method FishEventType       getFishEventType()      Returns the current record's "FishEventType" value
 * @method Doctrine_Collection getVoteFishEvent()      Returns the current record's "VoteFishEvent" collection
 * @method Doctrine_Collection getCommentFishEvent()   Returns the current record's "CommentFishEvent" collection
 * @method FishEvent           setId()                 Sets the current record's "id" value
 * @method FishEvent           setDate()               Sets the current record's "date" value
 * @method FishEvent           setName()               Sets the current record's "name" value
 * @method FishEvent           setDescription()        Sets the current record's "description" value
 * @method FishEvent           setRules()              Sets the current record's "rules" value
 * @method FishEvent           setUsers()              Sets the current record's "users" value
 * @method FishEvent           setLocationId()         Sets the current record's "location_id" value
 * @method FishEvent           setFishEventTypeId()    Sets the current record's "fish_event_type_id" value
 * @method FishEvent           setLocation()           Sets the current record's "Location" value
 * @method FishEvent           setFishEventType()      Sets the current record's "FishEventType" value
 * @method FishEvent           setVoteFishEvent()      Sets the current record's "VoteFishEvent" collection
 * @method FishEvent           setCommentFishEvent()   Sets the current record's "CommentFishEvent" collection
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Sergei Belov <limitium@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFishEvent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('fish_event');
        $this->hasColumn('id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('date', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('rules', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('users', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('location_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('fish_event_type_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));

        $this->option('type', 'INNODB');
        $this->option('charset', 'utf8');
        $this->option('collate', 'utf8_general_ci');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Location', array(
             'local' => 'location_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('FishEventType', array(
             'local' => 'fish_event_type_id',
             'foreign' => 'id'));

        $this->hasMany('VoteFishEvent', array(
             'local' => 'id',
             'foreign' => 'fish_event_id'));

        $this->hasMany('CommentFishEvent', array(
             'local' => 'id',
             'foreign' => 'fish_event_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $blameable0 = new Doctrine_Template_Blameable(array(
             'listener' => 'BlameableFishery',
             'relations' => 
             array(
              'updated' => 
              array(
              'class' => 'sfGuardUserProfile',
              'disabled' => false,
              'foreign' => 'id',
              ),
              'created' => 
              array(
              'class' => 'sfGuardUserProfile',
              'disabled' => false,
              'foreign' => 'id',
              ),
             ),
             'columns' => 
             array(
              'updated' => 
              array(
              'length' => 4,
              'type' => 'int',
              ),
              'created' => 
              array(
              'length' => 4,
              'type' => 'int',
              ),
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($blameable0);
    }
}