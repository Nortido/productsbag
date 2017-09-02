<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

namespace Nortido\ProductBag\Adapters;


use Nortido\ProductBag\Entities\Product;
use Nortido\ProductBag\Interfaces\Adapter;

class ProductAdapter implements Adapter
{
    /**
     * @param array $array
     * @return Product
     * @throws \Exception
     */
    public static function convert($array)
    {
        self::checkIsArray($array);

        $entity = new Product();

        /** @var string $key */
        foreach ($array as $key => $value) {
            self::checkPropertyExist($entity, strtolower($key));
            $propertyName = "set".ucfirst($key);

            $entity->$propertyName($value);
        }

        return $entity;
    }

    /**
     * @param array $array
     * @return bool
     * @throws \Exception
     */
    static function checkIsArray($array)
    {
        if (!is_array($array)) {
            throw new \Exception("An argument should be type of array");
        }

        return true;
    }

    /**
     * @param string $entity
     * @param mixed $property
     * @return bool
     * @throws \Exception
     */
    static function checkPropertyExist($entity, $property)
    {
        if (!property_exists($entity, $property)) {
            throw new \Exception("Property doesn't exist");
        }

        return true;
    }
}