<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

namespace Nortido\ProductBag\Interfaces;


interface Controller
{
    /**
     * @param array $args
     * @return mixed
     * @throws \Exception
     */
    public function process($args);
}
