<?php

require 'config.php';

//The Database Object
class Porm
{
	public $con = NULL;
	public $dbname = NULL;
	
	public function __construct($dbname = false)
	{
		global $porm_config;
		
		//Set Database Name
		if($dbname)
		{
			$this->dbname = $dbname;
		}
		
		else
		{
			$this->dbname = $porm_config['default_db'];
		}
		
		
		//Connect to Database
		try {
			$this->con = new PDO('mysql:host=localhost;dbname=_cfa','root','');
			//$this->con = new PDO($porm_config['pdo_string'], $porm_config['user'], $porm_config['pass']);
			
			$this->con->query("USE {$this->dbname}");
			
		} catch (PDOException $e) {
			print $e->getMessage();
			die("Could not connect to the database.");
		}
	}
	
	/*
		CRUD Methods:
			Create	(INSERT)
			Read	(SELECT)
			Update	(UPDATE)
			Delete	(DELETE)
	*/
	
	//Create (INSERT into Table)
	public function create($row)
	{
		//Get Table
		$table = $this->getTableName($row);
		
		//SQL
		$sql = "INSERT INTO $table(";
			
		//Properties, Values, ?'s (for preparing)
		$props = [];
		$vals = [];
		$qmarks = [];
			
		foreach($row->fields as $prop)
		{
			$val = $row->{$prop};
			
			if($val === false)
				continue;
			
			$vals[] = $val;
			$props[] = $prop;
			$qmarks[] = '?';
		}
			
		//Create SQL Command
		$sql .= implode(",", $props) . ") VALUES(" . implode(",", $qmarks) . ")";
		
		//Statement
		$stmt = $this->createStatement($sql, $vals);

		$error = [];
		
		//Execute Statement
		if(!$stmt->execute())
		{
			$error = $stmt->errorInfo();
		}
		
		//Close Statement
		$stmt->closeCursor();
		
		//Add Last Insert ID
		if($row->id === false)
		{
			$row->id = $this->con->lastInsertId();
		}
		
		return $error;
	}
	
	//Read (SELECT FROM table)
	public function read($sql, $params = [], $type = 'StdClass')
	{
		//Prepare Query
		$stmt = $this->createStatement($sql, $params);
		
		//Execute Statement
		$stmt->execute();
		
		//Result Array
		if($type === false)
		{
			$array = $stmt->fetchAll();
		}
		
		else
		{
			$array = $stmt->fetchAll(PDO::FETCH_CLASS, $type);
		}
		
		
		$stmt->closeCursor();
		
		return $array;
	}
	
	//Read One
	public function readOne($sql, $params = [], $type = 'StdClass')
	{
		$results = $this->read($sql, $params, $type);
		
		if(count($results))
		{
			return $results[0];
		}
		
		else
		{
			return NULL;
		}
	}
	
	//Get by ID and Class
	public function get($id, $class)
	{
		$table = $this->getTableName($class);
		
		$result = $this->readOne("SELECT * FROM $table WHERE id = ?", [$id], $class);
		
		return $result;
	}
	
	//Update Table (UPDATE)
	public function update($row)
	{
		//Get Table
		$table = $this->getTableName($row);
		
		//SQL
		$sql = "UPDATE $table SET";
		
		//Properties and Values
		$props = [];
		$vals = [];
		
		//Get Values to Update
		foreach($row->fields as $prop)
		{
			//Value
			$val = $row->{$prop};
			
			if($val === false || $prop == "id")
				continue;
			
			//Add Property and Value
			$props[] = $prop;
			$vals[] = $val;
		}
		
		//Any Values?
		if(count($props) > 0)
		{
			do{
				//Get Value and Property
				$prop = array_shift($props);
				
				//Add to SQL
				$sql .= " $prop = ? ";
				
				//Add Comma if More Updates
				if(count($props))
				{
					$sql .= ",";
				}
			} while(count($props));
		}
		
		//Set WHERE Clause
		$vals[] = $row->id;
		$sql .= "WHERE id = ?";
		
		//Create Statement
		$stmt = $this->createStatement($sql, $vals);
		
		$error = [];
		
		//Execute Statement
		if(!$stmt->execute())
		{
			$error = $stmt->errorInfo();
		}
		
		//Close Statement
		$stmt->closeCursor();
		
		return $error;
	}
	
	//Delete from Table (DELETE)
	public function delete($row)
	{
		//Get Table
		$table = $this->getTableName($row);
		
		//SQL
		$sql = "DELETE FROM $table WHERE id = ?";
		
		//Create Statement
		$stmt = $this->createStatement($sql, [$row->id]);
		
		$error = [];
		
		//Execute Statement
		if(!$stmt->execute())
		{
			$error = $stmt->errorInfo();
		}
		
		//Close Statement
		$stmt->closeCursor();
		
		return $error;
	}
	
	//Get Table Name from Class
	public function getTableName($class)
	{
		global $porm_config;
		
		$name = get_class($class);
		return $porm_config['dbs'][$this->dbname][$name];
	}
	
	//Create Statement and Bind Values
	public function createStatement($sql, $vals = [])
	{
		//Prepare Statement
		$stmt = $this->con->prepare($sql);
		
		//Bind Values
		foreach($vals as $key => $val)
		{
			$stmt->bindValue($key+1, $val);
		}
		
		return $stmt;
	}
}

?>
