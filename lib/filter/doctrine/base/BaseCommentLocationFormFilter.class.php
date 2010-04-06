<?php

/**
 * CommentLocation filter form base class.
 *
 * @package    FISHERY
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCommentLocationFormFilter extends CommentFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('comment_location_filters[%s]');
  }

  public function getModelName()
  {
    return 'CommentLocation';
  }
}