<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

namespace Nortido\ProductBag\Interfaces;


interface Adapter
{
    /**
     * @param array $array
     * @return Entity;
     * @throws \Exception
     */
    static function convert($array);

    /**
     * @param Entity $entity
     * @param mixed $property
     * @return bool
     * @throws \Exception
     */

    static function checkPropertyExist($entity, $property);
}
