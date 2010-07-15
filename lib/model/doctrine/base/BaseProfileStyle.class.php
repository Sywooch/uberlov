<?php

/**
 * BaseProfileStyle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $style_id
 * @property integer $profile_id
 * @property Style $Style
 * @property Profile $Profile
 * 
 * @method integer      getStyleId()    Returns the current record's "style_id" value
 * @method integer      getProfileId()  Returns the current record's "profile_id" value
 * @method Style        getStyle()      Returns the current record's "Style" value
 * @method Profile      getProfile()    Returns the current record's "Profile" value
 * @method ProfileStyle setStyleId()    Sets the current record's "style_id" value
 * @method ProfileStyle setProfileId()  Sets the current record's "profile_id" value
 * @method ProfileStyle setStyle()      Sets the current record's "Style" value
 * @method ProfileStyle setProfile()    Sets the current record's "Profile" value
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseProfileStyle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile_style');
        $this->hasColumn('style_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('profile_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));

        $this->option('type', 'INNODB');
        $this->option('charset', 'utf8');
        $this->option('collate', 'utf8_general_ci');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Style', array(
             'local' => 'style_id',
             'foreign' => 'id'));

        $this->hasOne('Profile', array(
             'local' => 'profile_id',
             'foreign' => 'id'));
    }
}