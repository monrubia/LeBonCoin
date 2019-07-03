<?php

require_once(dirname(__FILE__) . '/../class/Model.php');
require_once(dirname(__FILE__) . '/../class/Controller.php');
require_once(dirname(__FILE__) . '/../class/AdLeBonCoin.php');
require_once(dirname(__FILE__) . '/../class/AdPAP.php');
require_once(dirname(__FILE__) . '/../class/MySQL.php');

class AdController extends Controller
{
	public $tableDB = 'data';
	public $id;

	public function showAction()
	{
		$this->render('form.tpl', []);
	}

	public function postAction()
	{
		//$ads = AdLeBonCoin::getAds($_POST['query']);
		$query = "INSERT INTO `" . $this->tableDB . "` (title, photo, price, date, postalcode, city, adKind) VALUES ('$_POST[title]', '$_POST[photo]', '$_POST[price]', '$_POST[date]', '$_POST[postalcode]', '$_POST[city]', '$_POST[adKind]')";
		$ads = MySQL::getInstance()->execute($query);
		header('Location: Index-Show');
	}

	public function searchAction()
	{
		$ads = AdLeBonCoin::getAds($_GET['query']);
		//die(var_dump($ads));
		$this->render('index3.tpl', [
			'adsMain' 		=> $ads,
			'adsSide' 		=> $ads
		]);
	}

	public function deleteAction()
	{
		$ad = new AdLeBonCoin($_GET['id']);
		$ad->delete();
		$this->render('delete.tpl', []);
	}

	public function displayAction() {

	    $ad 		= new AdLeBonCoin($_GET['id']);    
	    $isSaved 	= null;
	
	    if(!empty($_POST)){
	
			$ad->setID($_POST['ID']);
			$ad->setType($_POST['type']);
			$ad->setPhoto($_POST['photo']);
			$ad->setTitle($_POST['title']);
			$ad->setPrice($_POST['price']);
			$ad->setDate($_POST['date']);
			$ad->setPostalcode($_POST['postalcode']);
			$ad->setCity($_POST['city']);
			$ad->setAdKind($_POST['adKind']);
	
	        if ($ad->save()) {
		        header('Location: Ad-Show?adUpdated=1');
				exit;
	        }
	    }
	   
	    $this->render('update.tpl', [
	        'ad' => $ad,
	        'saved' => $isSaved,
	    ]);
	}

	public function updateAjaxAction(){
		$ad = new AdLeBonCoin($_POST['ID']); 
		//$ad = new AdLeBonCoin($_POST['id']);
	    $ad->setType($_POST['type']);
		$ad->setPhoto($_POST['photo']);
		$ad->setTitle($_POST['title']);
		$ad->setPrice($_POST['price']);
		$ad->setDate($_POST['date']);
		$ad->setPostalcode($_POST['postalcode']);
		$ad->setCity($_POST['city']);
		//$ad->setAdKind($_POST['adKind']);
	
        if ($ad->save()) {
	        $json = [
		        'success' => true
	        ];
        } else {
	        $json = [
		        'success' => false
	        ];
        }
		exit(json_encode($json));
	}

	public function showAjaxAction()  //unfinished!!!!
	{
		$query=false;
		if (isset($query)){
		$query = $_GET['query'];
		}
		$this->render('bodyIndex.tpl', [
			'adsMain' => Ad::getAdsByType('LeBonCoin', $query),
			'adsSide' => Ad::getAdsByType('pap', $query),
		]);
	}

	/*
	public function displayAction()
	{

		$ad = new AdLeBonCoin($_GET['id']);

		$this->render('update.tpl', [
			'id'         => $ad->getID(),
			'type'       => $ad->getType(),
			'photo' 	 => $ad->getPhoto(),
			'title' 	 => $ad->getTitle(),
			'price' 	 => $ad->getPrice(),
			'date'		 => $ad->getDate(),
			'postalcode' => $ad->getPostalcode(),
			'city' 		 => $ad->getCity(),
			'adKind'	 => $ad->getAdKind(),
			'saved'		 => FALSE,

		]);
	}
	
	public function updateAction()
	{
		
		if (empty($_POST))
			return;


		$ad = new AdLeBonCoin(null);
		//$ad->hydrate($_POST);

		$ad->setID($_POST['ID']);
		$ad->setType($_POST['type']);
		$ad->setPhoto($_POST['photo']);
		$ad->setTitle($_POST['title']);
		$ad->setPrice($_POST['price']);
		$ad->setDate($_POST['date']);
		$ad->setPostalcode($_POST['postalcode']);
		$ad->setCity($_POST['city']);
		$ad->setAdKind($_POST['adKind']);

		$ad->save();
		$isSaved='saved';

		$this->render('update.tpl', [
			'id'         => $ad->getID(),
			'type'       => $ad->getType(),
			'photo' 	 => $ad->getPhoto(),
			'title' 	 => $ad->getTitle(),
			'price' 	 => $ad->getPrice(),
			'date'		 => $ad->getDate(),
			'postalcode' => $ad->getPostalcode(),
			'city' 		 => $ad->getCity(),
			'adKind'	 => $ad->getAdKind(),
			'saved'		 => $isSaved,

		]);
	}
	
	public function getAction()
	{
		$ads = new AdLeBonCoin($_GET['query']);
		$this->render('list.tpl', [
			'adsMain' 		=> $ads,
			'adsSide' 		=> $ads
		]);
	}
*/
}

