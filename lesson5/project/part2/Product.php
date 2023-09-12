<?php

class Product
{
    private string $title;
    private float $price;
    private ?array $components;

    function __construct(string $title, float $price = 0.0)
    {
        $this->title = $title;
        $this->price = $price;
    }
	function setComponents(Product $product): void 
    {
		$this->components[] = $product;
        $this->price += $product->price;
	}
    function getPrice(): float {
		return $this->price;
	}
    function getTitle(): string
    {
        return $this->title;
    }
}