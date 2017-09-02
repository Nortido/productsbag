<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

namespace Nortido\ProductBag\Interfaces;


interface Service
{
    /**
     * @param array $args
     * @return array
     */
    public function run($args);
}