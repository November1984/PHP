<?php

class Cart
{
    private ?array $addedProducts;
    private float $totalPrice = 0.0;
    // function __construct()
    // {
    //     $this->addedProducts = [];
    //     $this->totalPrice = 0.0;
    // }
    function getTotalPrice(): float {
		return $this->totalPrice;
	}
    function addProduct(Product $product): void
    {
        $this->addedProducts[] = $product;
        $this->totalPrice += $product->getPrice();
    }
    function getProducts(): array
    {
        return $this->addedProducts;
    }
    function removeProduct(string $titleProduct): void
    {
        foreach ($this->addedProducts as $key => $item)
        {
            if ($item->getTitle() === $titleProduct)
            {
                unset($this->addedProducts[$key]);
                $this->totalPrice -= $item->getPrice();
                echo "Товар $titleProduct удалён";
                return;
            }
            echo "Товар не найден.";
        }
    }
}