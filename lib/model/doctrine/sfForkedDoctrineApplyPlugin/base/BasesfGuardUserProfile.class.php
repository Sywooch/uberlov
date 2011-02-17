<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $email_new
 * @property timestamp $validate_at
 * @property string $validate
 * @property integer $id
 * @property boolean $sex
 * @property date $birth_date
 * @property string $userpic
 * @property string $description
 * @property sfGuardUser $User
 * @property Doctrine_Collection $Wishes
 * @property Doctrine_Collection $MyFirends
 * @property Doctrine_Collection $MyFirends2
 * @property Doctrine_Collection $Inboxes
 * @property Doctrine_Collection $ReadComment
 * @property Doctrine_Collection $WishList
 * @property Doctrine_Collection $Friend
 * @property Doctrine_Collection $Votes
 * @property Doctrine_Collection $VoteProfile
 * @property Doctrine_Collection $Inboxed
 * 
 * @method integer             getUserId()      Returns the current record's "user_id" value
 * @method string              getEmailNew()    Returns the current record's "email_new" value
 * @method timestamp           getValidateAt()  Returns the current record's "validate_at" value
 * @method string              getValidate()    Returns the current record's "validate" value
 * @method integer             getId()          Returns the current record's "id" value
 * @method boolean             getSex()         Returns the current record's "sex" value
 * @method date                getBirthDate()   Returns the current record's "birth_date" value
 * @method string              getUserpic()     Returns the current record's "userpic" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method sfGuardUser         getUser()        Returns the current record's "User" value
 * @method Doctrine_Collection getWishes()      Returns the current record's "Wishes" collection
 * @method Doctrine_Collection getMyFirends()   Returns the current record's "MyFirends" collection
 * @method Doctrine_Collection getMyFirends2()  Returns the current record's "MyFirends2" collection
 * @method Doctrine_Collection getInboxes()     Returns the current record's "Inboxes" collection
 * @method Doctrine_Collection getReadComment() Returns the current record's "ReadComment" collection
 * @method Doctrine_Collection getWishList()    Returns the current record's "WishList" collection
 * @method Doctrine_Collection getFriend()      Returns the current record's "Friend" collection
 * @method Doctrine_Collection getVotes()       Returns the current record's "Votes" collection
 * @method Doctrine_Collection getVoteProfile() Returns the current record's "VoteProfile" collection
 * @method Doctrine_Collection getInboxed()     Returns the current record's "Inboxed" collection
 * @method sfGuardUserProfile  setUserId()      Sets the current record's "user_id" value
 * @method sfGuardUserProfile  setEmailNew()    Sets the current record's "email_new" value
 * @method sfGuardUserProfile  setValidateAt()  Sets the current record's "validate_at" value
 * @method sfGuardUserProfile  setValidate()    Sets the current record's "validate" value
 * @method sfGuardUserProfile  setId()          Sets the current record's "id" value
 * @method sfGuardUserProfile  setSex()         Sets the current record's "sex" value
 * @method sfGuardUserProfile  setBirthDate()   Sets the current record's "birth_date" value
 * @method sfGuardUserProfile  setUserpic()     Sets the current record's "userpic" value
 * @method sfGuardUserProfile  setDescription() Sets the current record's "description" value
 * @method sfGuardUserProfile  setUser()        Sets the current record's "User" value
 * @method sfGuardUserProfile  setWishes()      Sets the current record's "Wishes" collection
 * @method sfGuardUserProfile  setMyFirends()   Sets the current record's "MyFirends" collection
 * @method sfGuardUserProfile  setMyFirends2()  Sets the current record's "MyFirends2" collection
 * @method sfGuardUserProfile  setInboxes()     Sets the current record's "Inboxes" collection
 * @method sfGuardUserProfile  setReadComment() Sets the current record's "ReadComment" collection
 * @method sfGuardUserProfile  setWishList()    Sets the current record's "WishList" collection
 * @method sfGuardUserProfile  setFriend()      Sets the current record's "Friend" collection
 * @method sfGuardUserProfile  setVotes()       Sets the current record's "Votes" collection
 * @method sfGuardUserProfile  setVoteProfile() Sets the current record's "VoteProfile" collection
 * @method sfGuardUserProfile  setInboxed()     Sets the current record's "Inboxed" collection
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('email_new', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => '255',
             ));
        $this->hasColumn('validate_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('validate', 'string', 33, array(
             'type' => 'string',
             'length' => '33',
             ));
        $this->hasColumn('id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('sex', 'boolean', null, array(
             'default' => 1,
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('birth_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('userpic', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));


        $this->index('user_id_unique', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             'type' => 'unique',
             ));
        $this->option('type', 'INNODB');
        $this->option('charset', 'utf8');
        $this->option('collate', 'utf8_general_ci');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('Location as Wishes', array(
             'refClass' => 'WishList',
             'local' => 'profile_id',
             'foreign' => 'location_id'));

        $this->hasMany('sfGuardUserProfile as MyFirends', array(
             'refClass' => 'Friend',
             'local' => 'related_profile_id',
             'foreign' => 'source_profile_id'));

        $this->hasMany('sfGuardUserProfile as MyFirends2', array(
             'refClass' => 'Friend',
             'local' => 'source_profile_id',
             'foreign' => 'related_profile_id'));

        $this->hasMany('Inbox as Inboxes', array(
             'refClass' => 'Inboxed',
             'local' => 'profile_id',
             'foreign' => 'inbox_id'));

        $this->hasMany('Comment as ReadComment', array(
             'refClass' => 'ReadComment',
             'local' => 'profile_id',
             'foreign' => 'comment_id'));

        $this->hasMany('WishList', array(
             'local' => 'id',
             'foreign' => 'profile_id'));

        $this->hasMany('Friend', array(
             'local' => 'id',
             'foreign' => 'related_profile_id'));

        $this->hasMany('Vote as Votes', array(
             'local' => 'id',
             'foreign' => 'voter'));

        $this->hasMany('VoteProfile', array(
             'local' => 'id',
             'foreign' => 'profile_id'));

        $this->hasMany('Inboxed', array(
             'local' => 'id',
             'foreign' => 'profile_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}