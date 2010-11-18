<?php

/**
 * BaseLocation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property float $depth
 * @property boolean $is_free
 * @property string $price
 * @property integer $location_flow_id
 * @property integer $location_fundus_id
 * @property integer $location_relief_id
 * @property integer $location_type_id
 * @property integer $location_scope_id
 * @property integer $address_id
 * @property LocationFlow $LocationFlow
 * @property LocationFundus $LocationFundus
 * @property LocationRelief $LocationRelief
 * @property LocationType $LocationType
 * @property LocationScope $LocationScope
 * @property Address $Address
 * @property Doctrine_Collection $Wishers
 * @property Doctrine_Collection $Profit
 * @property Doctrine_Collection $CommentLocation
 * @property Doctrine_Collection $WishList
 * @property Doctrine_Collection $VoteLocation
 * @property Doctrine_Collection $FishEvent
 * @property Doctrine_Collection $PhotoLocation
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getDescription()        Returns the current record's "description" value
 * @method float               getDepth()              Returns the current record's "depth" value
 * @method boolean             getIsFree()             Returns the current record's "is_free" value
 * @method string              getPrice()              Returns the current record's "price" value
 * @method integer             getLocationFlowId()     Returns the current record's "location_flow_id" value
 * @method integer             getLocationFundusId()   Returns the current record's "location_fundus_id" value
 * @method integer             getLocationReliefId()   Returns the current record's "location_relief_id" value
 * @method integer             getLocationTypeId()     Returns the current record's "location_type_id" value
 * @method integer             getLocationScopeId()    Returns the current record's "location_scope_id" value
 * @method integer             getAddressId()          Returns the current record's "address_id" value
 * @method LocationFlow        getLocationFlow()       Returns the current record's "LocationFlow" value
 * @method LocationFundus      getLocationFundus()     Returns the current record's "LocationFundus" value
 * @method LocationRelief      getLocationRelief()     Returns the current record's "LocationRelief" value
 * @method LocationType        getLocationType()       Returns the current record's "LocationType" value
 * @method LocationScope       getLocationScope()      Returns the current record's "LocationScope" value
 * @method Address             getAddress()            Returns the current record's "Address" value
 * @method Doctrine_Collection getWishers()            Returns the current record's "Wishers" collection
 * @method Doctrine_Collection getProfit()             Returns the current record's "Profit" collection
 * @method Doctrine_Collection getCommentLocation()    Returns the current record's "CommentLocation" collection
 * @method Doctrine_Collection getWishList()           Returns the current record's "WishList" collection
 * @method Doctrine_Collection getVoteLocation()       Returns the current record's "VoteLocation" collection
 * @method Doctrine_Collection getFishEvent()          Returns the current record's "FishEvent" collection
 * @method Doctrine_Collection getPhotoLocation()      Returns the current record's "PhotoLocation" collection
 * @method Location            setId()                 Sets the current record's "id" value
 * @method Location            setName()               Sets the current record's "name" value
 * @method Location            setDescription()        Sets the current record's "description" value
 * @method Location            setDepth()              Sets the current record's "depth" value
 * @method Location            setIsFree()             Sets the current record's "is_free" value
 * @method Location            setPrice()              Sets the current record's "price" value
 * @method Location            setLocationFlowId()     Sets the current record's "location_flow_id" value
 * @method Location            setLocationFundusId()   Sets the current record's "location_fundus_id" value
 * @method Location            setLocationReliefId()   Sets the current record's "location_relief_id" value
 * @method Location            setLocationTypeId()     Sets the current record's "location_type_id" value
 * @method Location            setLocationScopeId()    Sets the current record's "location_scope_id" value
 * @method Location            setAddressId()          Sets the current record's "address_id" value
 * @method Location            setLocationFlow()       Sets the current record's "LocationFlow" value
 * @method Location            setLocationFundus()     Sets the current record's "LocationFundus" value
 * @method Location            setLocationRelief()     Sets the current record's "LocationRelief" value
 * @method Location            setLocationType()       Sets the current record's "LocationType" value
 * @method Location            setLocationScope()      Sets the current record's "LocationScope" value
 * @method Location            setAddress()            Sets the current record's "Address" value
 * @method Location            setWishers()            Sets the current record's "Wishers" collection
 * @method Location            setProfit()             Sets the current record's "Profit" collection
 * @method Location            setCommentLocation()    Sets the current record's "CommentLocation" collection
 * @method Location            setWishList()           Sets the current record's "WishList" collection
 * @method Location            setVoteLocation()       Sets the current record's "VoteLocation" collection
 * @method Location            setFishEvent()          Sets the current record's "FishEvent" collection
 * @method Location            setPhotoLocation()      Sets the current record's "PhotoLocation" collection
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLocation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('location');
        $this->hasColumn('id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'default' => '',
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('description', 'string', null, array(
             'default' => '',
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('depth', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('is_free', 'boolean', null, array(
             'default' => 1,
             'type' => 'boolean',
             ));
        $this->hasColumn('price', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('location_flow_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('location_fundus_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('location_relief_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('location_type_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('location_scope_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('address_id', 'integer', 4, array(
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
        $this->hasOne('LocationFlow', array(
             'local' => 'location_flow_id',
             'foreign' => 'id'));

        $this->hasOne('LocationFundus', array(
             'local' => 'location_fundus_id',
             'foreign' => 'id'));

        $this->hasOne('LocationRelief', array(
             'local' => 'location_relief_id',
             'foreign' => 'id'));

        $this->hasOne('LocationType', array(
             'local' => 'location_type_id',
             'foreign' => 'id'));

        $this->hasOne('LocationScope', array(
             'local' => 'location_scope_id',
             'foreign' => 'id'));

        $this->hasOne('Address', array(
             'local' => 'address_id',
             'foreign' => 'id'));

        $this->hasMany('Profile as Wishers', array(
             'refClass' => 'WishList',
             'local' => 'location_id',
             'foreign' => 'profile_id'));

        $this->hasMany('Profit', array(
             'local' => 'id',
             'foreign' => 'location_id'));

        $this->hasMany('CommentLocation', array(
             'local' => 'id',
             'foreign' => 'location_id'));

        $this->hasMany('WishList', array(
             'local' => 'id',
             'foreign' => 'location_id'));

        $this->hasMany('VoteLocation', array(
             'local' => 'id',
             'foreign' => 'location_id'));

        $this->hasMany('FishEvent', array(
             'local' => 'id',
             'foreign' => 'location_id'));

        $this->hasMany('PhotoLocation', array(
             'local' => 'id',
             'foreign' => 'location_id'));

        $blameable0 = new Doctrine_Template_Blameable(array(
             'listener' => 'BlameableFishery',
             'relations' => 
             array(
              'updated' => 
              array(
              'class' => 'Profile',
              'disabled' => false,
              'foreign' => 'id',
              ),
              'created' => 
              array(
              'foreign' => 'id',
              'disabled' => false,
              'class' => 'Profile',
              ),
             ),
             'columns' => 
             array(
              'updated' => 
              array(
              'type' => 'int',
              'length' => 4,
              ),
              'created' => 
              array(
              'type' => 'int',
              'length' => 4,
              ),
             ),
             ));
        $geographical0 = new Doctrine_Template_Geographical();
        $sluggable0 = new Doctrine_Template_Sluggable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $versionable0 = new Doctrine_Template_Versionable();
        $this->actAs($blameable0);
        $this->actAs($geographical0);
        $this->actAs($sluggable0);
        $this->actAs($timestampable0);
        $this->actAs($versionable0);
    }
}