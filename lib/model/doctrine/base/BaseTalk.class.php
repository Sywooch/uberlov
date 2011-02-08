<?php

/**
 * BaseTalk
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $message
 * @property integer $talk_section_id
 * @property TalkSection $TalkSection
 * @property Doctrine_Collection $CommentTalk
 * @property Doctrine_Collection $VoteTalk
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method string              getName()            Returns the current record's "name" value
 * @method string              getMessage()         Returns the current record's "message" value
 * @method integer             getTalkSectionId()   Returns the current record's "talk_section_id" value
 * @method TalkSection         getTalkSection()     Returns the current record's "TalkSection" value
 * @method Doctrine_Collection getCommentTalk()     Returns the current record's "CommentTalk" collection
 * @method Doctrine_Collection getVoteTalk()        Returns the current record's "VoteTalk" collection
 * @method Talk                setId()              Sets the current record's "id" value
 * @method Talk                setName()            Sets the current record's "name" value
 * @method Talk                setMessage()         Sets the current record's "message" value
 * @method Talk                setTalkSectionId()   Sets the current record's "talk_section_id" value
 * @method Talk                setTalkSection()     Sets the current record's "TalkSection" value
 * @method Talk                setCommentTalk()     Sets the current record's "CommentTalk" collection
 * @method Talk                setVoteTalk()        Sets the current record's "VoteTalk" collection
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseTalk extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('talk');
        $this->hasColumn('id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '50',
             ));
        $this->hasColumn('message', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('talk_section_id', 'integer', 4, array(
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
        $this->hasOne('TalkSection', array(
             'local' => 'talk_section_id',
             'foreign' => 'id'));

        $this->hasMany('CommentTalk', array(
             'local' => 'id',
             'foreign' => 'talk_id'));

        $this->hasMany('VoteTalk', array(
             'local' => 'id',
             'foreign' => 'talk_id'));

        $blameable0 = new Doctrine_Template_Blameable(array(
             'listener' => 'BlameableFishery',
             'columns' => 
             array(
              'created' => 
              array(
              'length' => 4,
              'type' => 'int',
              ),
              'updated' => 
              array(
              'length' => 4,
              'type' => 'int',
              ),
             ),
             'relations' => 
             array(
              'created' => 
              array(
              'class' => 'sfGuardUserProfile',
              'disabled' => false,
              'foreign' => 'id',
              ),
              'updated' => 
              array(
              'class' => 'sfGuardUserProfile',
              'disabled' => false,
              'foreign' => 'id',
              ),
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $taggable0 = new Taggable();
        $this->actAs($blameable0);
        $this->actAs($timestampable0);
        $this->actAs($taggable0);
    }
}