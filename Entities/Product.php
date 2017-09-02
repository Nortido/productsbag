<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

namespace Nortido\ProductBag\Entities;


use Nortido\ProductBag\Interfaces\Entity;

class Product implements Entity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $cost;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     * @return $this
     */
    public function setCost($cost)
    {
        $this->cost = intval($cost);
        return $this;
    }
}
