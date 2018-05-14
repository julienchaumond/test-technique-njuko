<?php

namespace Classement\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ClassementController extends AbstractActionController
{

	 /** @var EntityManager $entityManager */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
    	// Event type
    	$events = $this->entityManager->getRepository('Application\Entity\Event')->findAll();
    	$selectedEventId = $this->params()->fromRoute('event_id', 0);
    	$selectedEvent = null;
    	if (empty($selectedEventId)) {
    		$selectedEvent = $events[0];
    	} else {
    		$selectedEvent = $this->entityManager->getRepository('Application\Entity\Event')->find($selectedEventId);
    	}

    	// Array representing the different type of Classement
    	$typeList = [
    		'general' => 'Général',
    		'female' => 'Femme',
    		'male' => 'Homme'];

        $selectedType = $this->params()->fromRoute('type', 0);
        if (empty($selectedType)) {
        	$selectedType = 'general';
        }

        // Sort part
        $sortList = [
        	'dossard_number' => 'Dossard', 
        	'lastname' => 'Nom', 
        	'firstname' => 'Prénom',
        	'measured_time' => 'Temps de passage'];

		$selectedSort = $this->params()->fromRoute('sort', 0);
		if (empty($selectedSort)) {
        	$selectedSort = 'dossard_number';
        }

 		// Building the query
       	$searchParameters = ['event' => $selectedEvent];
        if ($selectedType != 'general') {
        	$searchParameters['sex'] = $selectedType;
        }

        $participants = $this->entityManager->getRepository('Application\Entity\Participant')->findBy($searchParameters, [$selectedSort => 'ASC']);

        return new ViewModel([
        	'typeList' => $typeList,
        	'selectedType' => $selectedType,
        	'events' => $events,
        	'selectedEvent' => $selectedEvent->getId(),
        	'sortList' => $sortList,
        	'selectedSort' => $selectedSort,
        	'participants' => $participants
        ]);
    }
}
