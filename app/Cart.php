<?php

namespace App;


class Cart
{
	public $items = null;
	public $quantity = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if($oldCart){
			$this->items = $oldCart->items;
			$this->quantity = $oldCart->quantity;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($items , $id)
	{
		$storedItems = ['qty'=> 0 , 'price'=>$items->cost , 'items'=>$items];

		if($this->items)
		{
			if (array_key_exists($id, $this->items))
			{
				$storedItems = $this->items[$id];
			}
		}

		$storedItems['qty']++;
		$storedItems['price'] = $items->cost *  $storedItems['qty'];
		$this->items[$id] = $storedItems;

		$this->quantity++;
		$this->totalPrice += $items->cost;
	}
}