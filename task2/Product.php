<?php

class Product
{
	private static $connection;

	public function __construct()
	{
		self::$connection = new mysqli('localhost', 'root', 'Fabregas55.', 'Goods');

		if (self::$connection->connect_errno) {
			echo 'error';
			die();
		}
	}

	public static function createGoods($data)
	{
		foreach ($data['NA_SKLADE'] as $code => $skladIdAndQuantitys) {
			foreach ($skladIdAndQuantitys as $sklad => $skladIdAndQuantity) {
				$sql = "INSERT INTO info(code, skladId, quantity) VALUES('$code', $skladIdAndQuantity[SKLAD_ID], $skladIdAndQuantity[QUANTITY])";
				self::$connection->query($sql);
			}
		}

		echo 'Данные успешно добавлены!';
	}

	public static function showLeftovers()
	{
		$firstSklad = 0;
		$secondSklad = 0;

		$sql = "SELECT * FROM info";

		$data = mysqli_fetch_all(self::$connection->query($sql), MYSQLI_ASSOC);

		foreach ($data as $product) {
			if ($product['skladId'] == 1)
				$firstSklad += $product['quantity'];
			else
				$secondSklad += $product['quantity'];
		}

		echo "Остатки на первом складе: $firstSklad, остатки на втором: $secondSklad";
	}

	public static function showInformation($data)
	{
		foreach ($data['NA_SKLADE'] as $code => $skladIdAndQuantitys) {
			foreach ($skladIdAndQuantitys as $sklad => $skladIdAndQuantity) {
				if ($skladIdAndQuantity['QUANTITY'] > 0) {
					echo 'Код номенклатура: ' . substr($code, 0, -23) . ', склад: ' . $skladIdAndQuantity['SKLAD_ID']
						. ', кол-во остатков: ' . $skladIdAndQuantity['QUANTITY'] . '<br>';
				}
			}
		}
	}

	public static function getJSON($data)
	{
		$json = [];

		foreach ($data['NA_SKLADE'] as $code => $skladIdAndQuantitys) {
			foreach ($skladIdAndQuantitys as $sklad => $skladIdAndQuantity) {
				$value  = substr($code, 0, -23) . ',' . $skladIdAndQuantity['SKLAD_ID'] . ',' . $skladIdAndQuantity['QUANTITY'];
				array_push($json, [$code => $value]);
			}
		}

		$json = json_encode($json);

		var_dump($json);
	}

	public static function deleteDataFromTable()
	{
		$sql = "TRUNCATE info";

		self::$connection->query($sql);

		echo 'Данные успешно удалены!';
	}
}