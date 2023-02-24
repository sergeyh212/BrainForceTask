<?php

include('../Models/Brand.php');
include('../Models/Model.php');
include('../Models/Detail.php');

class Data
{

	public function getData()
	{
		$brands = new Brand();
		$models = new Model();
		$details = new Detail();

		$data = [
			'brands' => $brands->getData(),
			'models' => $models->getData(),
			'details' => $details->getData()
		];

		return json_encode($data);
	}
}
