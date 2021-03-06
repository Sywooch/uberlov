<?php

/**
 * event actions.
 *
 * @package    FISHERY
 * @subpackage event
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventActions extends sfActions
{

    public function executeList(sfWebRequest $request)
    {
        $this->pager = htPagerLayout::create(Doctrine::getTable('FishEvent')
            ->createQuery('f')
            ->leftJoin('f.Location l')
            ->leftJoin('f.CreatedBy p')
            ->leftJoin('f.VoteFishEvent v')
            ->leftJoin('f.CommentFishEvent c')
            ->leftJoin('p.User')
            ->where('f.date >= ?', array(date('Y-m-d', time())))
            ->orderBy('f.date ASC'), 'event/list?page={%page_number}', $request->getParameter('page', 1));
    }

    public function executeArchive(sfWebRequest $request)
    {
        $this->pager = htPagerLayout::create(Doctrine::getTable('FishEvent')
            ->createQuery('f')
            ->leftJoin('f.Location')
            ->leftJoin('f.VoteFishEvent v')
            ->leftJoin('f.CommentFishEvent c')
            ->leftJoin('f.CreatedBy p')
            ->leftJoin('p.User')
            ->where('f.date < ?', array(date('Y-m-d', time())))
            ->orderBy('f.date ASC'), 'event/list?page={%page_number}', $request->getParameter('page', 1));
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->event = Doctrine::getTable('Location')->addLocation(
            Doctrine::getTable('FishEvent')->createQuery("e")
                ->leftJoin('e.VoteFishEvent')
                ->leftJoin('e.CreatedBy p')
                ->leftJoin('p.User')
            , 'e')
            ->where('e.id = ?', $request->getParameter('id'))
            ->execute()
            ->getFirst();
        ;
        $this->forward404Unless($this->event);

        $this->comments = Comment::getFor($this->event);

        $this->form = new CommentFishEventForm();
        $this->form->setCommented($this->event);
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->forward404Unless($this->location = Doctrine::getTable('Location')->find(array($request->getParameter('location'))), sprintf('Location does not exist (%s).', $request->getParameter('id')));
        $this->form = new FishEventForm();
        $this->form->setDefault('location_id', $this->location->getId());
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new FishEventForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($fish_event = Doctrine::getTable('FishEvent')->find(array($request->getParameter('id'))), sprintf('Object fish_event does not exist (%s).', $request->getParameter('id')));
        $this->form = new FishEventForm($fish_event);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($fish_event = Doctrine::getTable('FishEvent')->find(array($request->getParameter('id'))), sprintf('Object fish_event does not exist (%s).', $request->getParameter('id')));
        $this->form = new FishEventForm($fish_event);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($fish_event = Doctrine::getTable('FishEvent')->find(array($request->getParameter('id'))), sprintf('Object fish_event does not exist (%s).', $request->getParameter('id')));
        $fish_event->delete();

        $this->redirect('event/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $params = $request->getParameter($form->getName());

        $this->forward404Unless($this->location = Doctrine::getTable('Location')->find(array($params['location_id'])), sprintf('Location does not exist (%s).', $params['location_id']));

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $fish_event = $form->save();
            BotNet::create()->spammed($fish_event, 'description');
            if ($cache = $this->getContext()->getViewCacheManager()) {
                $cache->remove('@sf_cache_partial?module=event&action=_last&sf_cache_key=event', '', 'all');
            }
            $this->redirect('@event_show?id=' . $fish_event->getId());
        }
    }

}
