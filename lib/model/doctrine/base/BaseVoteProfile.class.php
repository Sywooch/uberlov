<?php

/**
 * BaseVoteProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Profile $Profile
 * 
 * @method Profile     getProfile() Returns the current record's "Profile" value
 * @method VoteProfile setProfile() Sets the current record's "Profile" value
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseVoteProfile extends Vote
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Profile', array(
             'local' => 'profile_id',
             'foreign' => 'id'));
    }
}