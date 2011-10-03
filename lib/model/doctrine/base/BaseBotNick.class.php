<?php

/**
 * BaseBotNick
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nikck
 * @property Doctrine_Collection $IsBot
 * 
 * @method integer             getId()    Returns the current record's "id" value
 * @method string              getNikck() Returns the current record's "nikck" value
 * @method Doctrine_Collection getIsBot() Returns the current record's "IsBot" collection
 * @method BotNick             setId()    Sets the current record's "id" value
 * @method BotNick             setNikck() Sets the current record's "nikck" value
 * @method BotNick             setIsBot() Sets the current record's "IsBot" collection
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Sergei Belov <limitium@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBotNick extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bot_nick');
        $this->hasColumn('id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nikck', 'string', null, array(
             'unique' => true,
             'type' => 'string',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('IsBot', array(
             'local' => 'id',
             'foreign' => 'bot_nick_id'));
    }
}