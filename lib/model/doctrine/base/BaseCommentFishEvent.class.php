<?php

/**
 * BaseCommentFishEvent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property FishEvent $FishEvent
 * 
 * @method FishEvent        getFishEvent() Returns the current record's "FishEvent" value
 * @method CommentFishEvent setFishEvent() Sets the current record's "FishEvent" value
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCommentFishEvent extends Comment
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('FishEvent', array(
             'local' => 'FishEvent_id',
             'foreign' => 'id'));
    }
}