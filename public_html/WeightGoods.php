<?php

class WeightGoods extends Product
{

	static $cost = 3;
	private $qty;

	public function __construct()
	{
		$this->qty = 0;
	}

	public function setQty(float $qty)
	{
		$this->qty = $qty;
	}

	public function getQty()
	{
		$this->qty = $qty;
	}

	public function getFinalCost()
	{
		return $this->qty * static::$cost;
	}
}
