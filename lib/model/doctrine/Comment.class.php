<?php

/**
 * Comment
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    FISHERY
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class Comment extends BaseComment {
   public $plused = false;
    public $minused = false;

    public function getRating() {
        return Vote::getRating($this,'Comment');
    }
}