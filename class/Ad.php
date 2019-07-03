<?php

require_once(dirname(__FILE__) . '/../interface/IAd.php');
require_once(dirname(__FILE__) . '/MySQL.php');
require_once(dirname(__FILE__) . '/Model.php');

abstract class Ad extends Model
{
    /* PROPERTIES */

    protected $ID;
    protected $identifier = 'ID';
    //private $ref;
    protected $type;
    //private $url;
    //private $isCompany;
    //private $isSale;
    //private $allowCall;
    protected $date;
    //private $pseudo;
    //protected $photo;
    protected $title;
    //protected $price;
    protected $city;
    //protected $postalcode;
    //private $department;
    protected static $typeAd;
    protected $adKind;
    protected static $table = 'data';
    //protected $tableDB = 'data';


    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    /* SETTERS */

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setTitle($title)
    {
        $this->title = strtoupper($title);
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setType($type)
    {
        $this->type = ucfirst($type);
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    public function setDate($date)
    {
        //$date = strtotime($date);
        //$this->date = date("l d M", strtotime($date));
        $this->date = $date;
    }

    public function setTypeAd($typeAd)
    {
        $this->typeAd = $typeAd;
    }

    public function setAdKind($adKind)
    {
        $this->adKind = $adKind;
    }


    /*  GETERS  */
    public function getID()
    {
        return $this->ID;
    }
    
    public function getPhoto()
    {
        return $this->photo;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPostalcode()
    {
        return $this->postalcode;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTypeAd()
    {
        return $this->typeAd;
    }

    public function getAdKind()
    {
        return $this->adKind;
    }
    

    /* METHODS  */

    public function hydrate($array)
    {
        foreach ($array as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public static function getAdsByType($type, $keyWord=false)
    {
        $class = 'Ad' . $type;
        return $class::getAds($keyWord);
    }

    public static function getAds($keyWord = false) 
    {
		$class = get_called_class();
		/*
		if ($KeyWord) {
            $res = MySQL::getInstance()->executeS("SELECT * FROM ".$class::$table." WHERE adKind = '".$class::$typeAd."' AND title LIKE '%".$KeyWord."%' ORDER BY id ASC");
		} else {
            $res = MySQL::getInstance()->executeS("SELECT * FROM ".$class::$table." WHERE adKind = '".$class::$typeAd."' ORDER BY id ASC");
        }
        */
      
        if ($keyWord) {
            $res = MySQL::getInstance()->executeS("SELECT * FROM data WHERE adKind = '".$class::$typeAd."' AND type LIKE '%".$keyWord."%' ORDER BY id ASC");
		} else {
            $res = MySQL::getInstance()->executeS("SELECT * FROM data WHERE adKind = '".$class::$typeAd."' ORDER BY id ASC");
        }

		$collection = [];
		foreach ($res as $row) {
			$ad = new AdLeBonCoin($row['ID']);
			$collection[] = $ad;
		}
		
		return $collection;
    }
    
    /*
    public static function getAds()
    {
        $class = get_called_class();
        //$req = new MySQL('localhost','leboncoindb', 'root', '');
        //$req = $req->query('SELECT * FROM smalltableads ORDER BY id ASC');
        //$res = $mysqli->query("SELECT * FROM smalltableads WHERE typeAd = 'leboncoin' ORDER BY id ASC");

        //$res = MySQL::getInstance()->executeS("SELECT * FROM '. $this->table . ' WHERE typeAd = '" . $class::$typeAd . "' ORDER BY id ASC");
        $res = MySQL::getInstance()->executeS('SELECT * FROM `smalltableads` WHERE typeAd = `leboncoin`');

        $collection = [];
        //while ($row = $req->fetch_assoc()){
        //    $ad = new AdLeBonCoin();
        //    $ad->hydrate ($row);
        //    $collection [] = $ad;
        //}
        //return $collection;

        foreach ($res as $row) {
            $ad = new AdLeBonCoin();
            $ad->hydrate($row);
            $collection[] = $ad;
        }
        return $collection;
    }
    */
}
