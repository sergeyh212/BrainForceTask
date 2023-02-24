<?php

class Client
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

	public function createOrder($data)
	{

		$sql = "INSERT INTO Clients (clientName, clientNumber, brandName, modelName, detailName)
		VALUES ('{$data['clientName']}', '{$data['clientNumber']}', '{$data['brandName']}', '{$data['modelName']}', '{$data['detailName']}')";

		$this->connection->query($sql);

		$response = [
			'order' => 'success'
		];

		$this->connection->close();
		return json_encode($response);
	}
}
