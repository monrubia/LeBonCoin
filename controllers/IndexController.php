<?php

require_once (dirname(__FILE__) . '/../class/Controller.php');
require_once (dirname(__FILE__) . '/../class/Ad.php');
require_once (dirname(__FILE__) . '/../class/AdLeBonCoin.php');
require_once (dirname(__FILE__) . '/../class/AdPAP.php');

class IndexController extends Controller
{

	public function showAction()
	{
		//render($template, $arrayDataToShow)
		$this->render('index3.tpl', [
			'adsMain' 		=> Ad::getAdsByType('LeBonCoin'),
			'adsSide' 		=> Ad::getAdsByType('PAP'),
		]);
	
	}

	public function listAction() {
		$this->render('list.tpl', [
			//'name' 		=> 'Romain', 
			//'lastname' 	=> 'Montagne'
		]);
	}

}
