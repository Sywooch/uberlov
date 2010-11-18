<?php

/**
 * BaseWishList
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $profile_id
 * @property integer $location_id
 * @property Profile $Profile
 * @property Location $Location
 * 
 * @method integer  getProfileId()   Returns the current record's "profile_id" value
 * @method integer  getLocationId()  Returns the current record's "location_id" value
 * @method Profile  getProfile()     Returns the current record's "Profile" value
 * @method Location getLocation()    Returns the current record's "Location" value
 * @method WishList setProfileId()   Sets the current record's "profile_id" value
 * @method WishList setLocationId()  Sets the current record's "location_id" value
 * @method WishList setProfile()     Sets the current record's "Profile" value
 * @method WishList setLocation()    Sets the current record's "Location" value
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWishList extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wish_list');
        $this->hasColumn('profile_id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('location_id', 'integer', 4, array(
             'primary' => true,
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
        $this->hasOne('Profile', array(
             'local' => 'profile_id',
             'foreign' => 'id'));

        $this->hasOne('Location', array(
             'local' => 'location_id',
             'foreign' => 'id'));
    }
}