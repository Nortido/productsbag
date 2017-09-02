<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

namespace Nortido\ProductBag\Controllers;


use Nortido\ProductBag\Entities\Product;
use Nortido\ProductBag\Interfaces\Controller;

class ProductsController implements Controller
{
    /**
     * @param array $args
     * @return array
     * @throws \Exception
     */
    public function process($args)
    {
        if (!is_array($args) || !isset($args['products']) || !isset($args['limit'])) {
            throw new \Exception('Invalid arguments');
        }

        $result = $this->getProductsListByCostLimit($args['products'], $args['limit']);

        return $result;
    }

    /**
     * @param array $array
     * @param int $limit
     * @return array
     * @throws \Exception
     */
    private function getProductsListByCostLimit($array, $limit)
    {
        if (count($array)) {
            $sum = 0;
            $products = [];

            usort($array, function($a, $b)
            {
                return $a->getCost() < $b->getCost();
            });

            /** @var Product $item */
            foreach ($array as $item) {
                if ($sum + $item->getCost() <= $limit) {
                    $products[$item->getName()] = $item->getCost();
                    $sum += $item->getCost();

                    if ($sum == $limit) {
                        break;
                    }
                }
            }

            return $products;
        }

        throw new \Exception('An argument is not type of array or has 0 length');
    }
}