<?php

/**
 * collector components.
 *
 * @package    HT
 * @subpackage collector
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class eventComponents extends sfComponents {

    public function executeLast() {
        $this->events = Doctrine::getTable('FishEvent')
                        ->createQuery('f')
                        ->where('f.date >= ?', array(date('Y-m-d', time())))
                        ->orderBy('f.date DESC')
                        ->limit(5)
                        ->execute();
    }

}