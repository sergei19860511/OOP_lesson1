<?php

class PieceGoods extends Product
{

	public function getFinalCost()
	{
		return self::$cost;
	}
}
