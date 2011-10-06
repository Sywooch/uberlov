<?php

/**
 * BaseBotNick
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nick
 * @property Doctrine_Collection $Bot
 * 
 * @method integer             getId()   Returns the current record's "id" value
 * @method string              getNick() Returns the current record's "nick" value
 * @method Doctrine_Collection getBot()  Returns the current record's "Bot" collection
 * @method BotNick             setId()   Sets the current record's "id" value
 * @method BotNick             setNick() Sets the current record's "nick" value
 * @method BotNick             setBot()  Sets the current record's "Bot" collection
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
        $this->hasColumn('nick', 'string', 255, array(
             'unique' => true,
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Bot', array(
             'local' => 'id',
             'foreign' => 'bot_nick_id'));
    }
}