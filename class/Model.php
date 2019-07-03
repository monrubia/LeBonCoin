<?php

/* 
Create
Read
Update
Delete
*/

abstract class Model
{

	//protected $tableDB;
	//protected $tableDB='data';
	protected $identifier = 'id';

	//READ
	public function __construct($id = null)
	{
		$class = get_called_class();
		if ($id) {
			//$query = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->identifier . '` = ' . (int)$id;
			$query = ' SELECT * FROM `data` WHERE `' . $this->identifier . '` = ' . (int)$id;
			$row = MySQL::getInstance()->getRow($query);
			foreach ($row as $key => $value) {
				$this->$key = $value;
			}
		}
	}

	//CREATE OR UPDATE
	public function save()
	{
		$vars = get_object_vars($this);

		//... AND $this->{$this->identifier} > 0, same thing as without explicitely saying >0.
		if (isset($this->{$this->identifier}) and $this->{$this->identifier}) {
			//UPDATE			
			$update 		= 'UPDATE `data` SET ';
			$updateArray 	= [];

			foreach ($vars as $key => $value) {
				if ($key == 'data' or $key == 'identifier' or $key == $this->identifier) {
					continue;
				}
				$updateArray[] = '`' . $key . '` = "' . $value . '"';
			}

			$update .= implode(',', $updateArray) . ' WHERE `' . $this->identifier . '` = ' . $this->{$this->identifier};

			return MySQL::getInstance()->execute($update);
		} else {
			//INSERT
			$insert 		= 'INSERT INTO `data`';
			$keyArray 		= [];
			$valueArray 	= [];

			foreach ($vars as $key => $value) {
				if ($key == 'data' or $key == 'identifier' or $key == $this->identifier) {
					continue;
				}
				$keyArray[] 	= '`' . $key . '`';
				$valueArray[] 	= '"' . $value . '"';
			}

			$insert .= '(' . implode(',', $keyArray) . ') ';
			$insert .= 'VALUES (' . implode(',', $valueArray) . ') ';

			$res = MySQL::getInstance()->execute($insert);
			if (!$res) {
				return false;
			}

			$this->{$this->identifier} = MySQL::getInstance()->getLastInsertedId();

			return true;
		}
	}

	//DELETE
	public function delete()
	{
		$toDelete = 'DELETE FROM `data` WHERE `data`.`' . $this->identifier . '` =' . $this->{$this->identifier} . ' LIMIT 1';
		$res = MySQL::getInstance()->execute($toDelete);
	}

	//getID is the getter from the calss Ad.
	public function getId(){
		//echo $this->{$this->identifier};
		return $this->{$this->identifier};
	}
}
