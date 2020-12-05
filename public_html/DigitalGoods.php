<?php

class DigitalGoods extends Product
{
	
	public function getFinalCost()
	{
		return self::$cost / 2;
	}

}
