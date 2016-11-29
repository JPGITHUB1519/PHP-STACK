<?php
	class Database
	{
		public $isConn;
		protected $datab;
		// connect to db
		public function __construct($username = "root", $password = "", $host = "localhost", $dbname = "blog", $options = [])
		{
			$this->isConn = TRUE;
			try
			{
				$this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
				// what to do when error exeption
				$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// set the way how to get the results in this case is a dict
				$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC) ;
			}
			catch(PDOException $e)
			{
				// print error
				throw new Exception($e->getMessage());
			}
			
		} 

		//disconect from database
		public function disconnect()
		{
			$this->datab = NULL;
			$this->isConn = FALSE;
		}

		// get only one row
		// returns one only row
		public function getRow($query, $params = [])
		{
			try
			{
				// preparando para ejecutar
				$stmt = $this->datab->prepare($query);
				// executing with the params
				$stmt->execute($params);
				// return one only row
				return $stmt->fetch();
			}
			catch(PDOException $e)
			{
				// print error
				throw new Exception($e->getMessage());
			}
		} 

		// get rows
		// returns all rows
		public function getRows($query, $params = [])
		{
			try
			{
				// preparando para ejecutar
				$stmt = $this->datab->prepare($query);
				// executing with the params
				$stmt->execute($params);
				// fetch all rows
				return $stmt->fetchAll();
			}
			catch(PDOException $e)
			{
				// print error
				throw new Exception($e->getMessage());
			}
		}

		// insert row
		// do not returns row
		// returns True when insert successed
		public function executeQuery($query, $params = [])
		{
			try
			{
				// preparando para ejecutar
				$stmt = $this->datab->prepare($query);
				// executing with the params
				$stmt->execute($params);
				return True;
			}
			catch(PDOException $e)
			{
				// print error
				throw new Exception($e->getMessage());
			}
		}

		// update row
		public function updateRow()
		{

		}
		// delete row
		public function deleteRow()
		{

		}
	}
?>