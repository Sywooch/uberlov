<?php

/**
 * BaseVoteComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Comment $Comment
 * 
 * @method Comment     getComment() Returns the current record's "Comment" value
 * @method VoteComment setComment() Sets the current record's "Comment" value
 * 
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseVoteComment extends Vote
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Comment', array(
             'local' => 'comment_id',
             'foreign' => 'id'));
    }
}