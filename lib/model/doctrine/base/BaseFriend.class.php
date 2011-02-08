<?php

/**
 * BaseFriend
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $source_profile_id
 * @property integer $related_profile_id
 * @property sfGuardUserProfile $sfGuardUserProfile
 * 
 * @method integer            getSourceProfileId()    Returns the current record's "source_profile_id" value
 * @method integer            getRelatedProfileId()   Returns the current record's "related_profile_id" value
 * @method sfGuardUserProfile getSfGuardUserProfile() Returns the current record's "sfGuardUserProfile" value
 * @method Friend             setSourceProfileId()    Sets the current record's "source_profile_id" value
 * @method Friend             setRelatedProfileId()   Sets the current record's "related_profile_id" value
 * @method Friend             setSfGuardUserProfile() Sets the current record's "sfGuardUserProfile" value
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseFriend extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('friend');
        $this->hasColumn('source_profile_id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('related_profile_id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'length' => '4',
             ));

        $this->option('type', 'INNODB');
        $this->option('charset', 'utf8');
        $this->option('collate', 'utf8_general_ci');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUserProfile', array(
             'local' => 'related_profile_id',
             'foreign' => 'id'));
    }
}