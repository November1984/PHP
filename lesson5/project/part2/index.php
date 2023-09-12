<?php

require_once "Cart.php";
require_once "Product.php";

$products = [];
$products[] = new Product("клавиатура", 5);
$products[] = new Product("мышь", 1);
$products[] = new Product("монитор", 15);
$products[] = new Product("системник", 25);
$products[] = new Product("компьютер");

echo "массив продуктов:".PHP_EOL;
print_r($products);

echo "Добавляю компонент:".PHP_EOL;

foreach ($products as $item) {
    if ($item->getTitle() !== "компьютер")
    {
        $products[4]->setComponents($item);
    }
}

echo "Что в компоненте?".PHP_EOL;
print_r($products[4]);

$userCart = new Cart;

echo "Создал корзину:".PHP_EOL;
print_r($userCart);

echo "Добавляю товар:".PHP_EOL;
$userCart->addProduct($products[4]);
echo "Стоимость товаров в корзине: ";
echo $userCart->getTotalPrice() . PHP_EOL;

$userCart->addProduct($products[2]);
$userCart->addProduct($products[0]);
echo "Стоимость товаров в корзине: ";
echo $userCart->getTotalPrice() . PHP_EOL;

echo "Товары в корзине:" . PHP_EOL;
print_r($userCart);

echo "Удалил один товар:" . PHP_EOL;
$userCart->removeProduct($products[0]->getTitle());
print_r($userCart);