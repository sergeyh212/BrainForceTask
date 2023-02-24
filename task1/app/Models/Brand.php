<?php

class Brand
{
	private $connection;

	public function __construct()
	{
		$this->connectionToDatabase();
	}

	private function connectionToDatabase()
	{
		$this->connection = new mysqli("localhost", "root", "Fabregas55.", "Cars");
		if ($this->connection->connect_error) {
			die();
		}
	}

	public function getData()
	{

		$sql = mysqli_query($this->connection, "SELECT * FROM brands");

		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

		return json_encode($result);
	}
}