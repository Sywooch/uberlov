<?php

/**
 * BaseProfit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $location_id
 * @property timestamp $begin
 * @property string $water_state
 * @property string $lure
 * @property string $bait
 * @property string $additive
 * @property string $weather
 * @property string $cordage
 * @property string $description
 * @property Location $Location
 * @property Doctrine_Collection $ProfitDetail
 * @property Doctrine_Collection $CommentProfit
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method integer             getLocationId()    Returns the current record's "location_id" value
 * @method timestamp           getBegin()         Returns the current record's "begin" value
 * @method string              getWaterState()    Returns the current record's "water_state" value
 * @method string              getLure()          Returns the current record's "lure" value
 * @method string              getBait()          Returns the current record's "bait" value
 * @method string              getAdditive()      Returns the current record's "additive" value
 * @method string              getWeather()       Returns the current record's "weather" value
 * @method string              getCordage()       Returns the current record's "cordage" value
 * @method string              getDescription()   Returns the current record's "description" value
 * @method Location            getLocation()      Returns the current record's "Location" value
 * @method Doctrine_Collection getProfitDetail()  Returns the current record's "ProfitDetail" collection
 * @method Doctrine_Collection getCommentProfit() Returns the current record's "CommentProfit" collection
 * @method Profit              setId()            Sets the current record's "id" value
 * @method Profit              setLocationId()    Sets the current record's "location_id" value
 * @method Profit              setBegin()         Sets the current record's "begin" value
 * @method Profit              setWaterState()    Sets the current record's "water_state" value
 * @method Profit              setLure()          Sets the current record's "lure" value
 * @method Profit              setBait()          Sets the current record's "bait" value
 * @method Profit              setAdditive()      Sets the current record's "additive" value
 * @method Profit              setWeather()       Sets the current record's "weather" value
 * @method Profit              setCordage()       Sets the current record's "cordage" value
 * @method Profit              setDescription()   Sets the current record's "description" value
 * @method Profit              setLocation()      Sets the current record's "Location" value
 * @method Profit              setProfitDetail()  Sets the current record's "ProfitDetail" collection
 * @method Profit              setCommentProfit() Sets the current record's "CommentProfit" collection
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseProfit extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profit');
        $this->hasColumn('id', 'integer', null, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             ));
        $this->hasColumn('location_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('begin', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('water_state', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('lure', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('bait', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('additive', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('weather', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('cordage', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
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
             'foreign' => 'id'));

        $this->hasMany('ProfitDetail', array(
             'local' => 'id',
             'foreign' => 'profit_id'));

        $this->hasMany('CommentProfit', array(
             'local' => 'id',
             'foreign' => 'profit_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $blameable0 = new Doctrine_Template_Blameable();
        $this->actAs($timestampable0);
        $this->actAs($blameable0);
    }
}