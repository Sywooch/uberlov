<?php

/**
 * CommentFishEvent form base class.
 *
 * @method CommentFishEvent getObject() Returns the current form's model object
 *
 * @package    FISHERY
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCommentFishEventForm extends CommentForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('comment_fish_event[%s]');
  }

  public function getModelName()
  {
    return 'CommentFishEvent';
  }

}