<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

use Nortido\ProductBag\Adapters\ProductAdapter;
use Nortido\ProductBag\Controllers\ProductsController;
use Nortido\ProductBag\Support\CsvImporterService;

checkParams($argv);

require_once "Core".DIRECTORY_SEPARATOR."bootstrap.php";

$products = (new CsvImporterService)->run(["filepath" => "./products.csv", "adapterClass" => ProductAdapter::class]);
$result = (new ProductsController())->process(['products' => $products, 'limit' => $argv[2]]);

if (is_array($result) && count($result)) {
    $sum = 0;
    foreach ($result as $key => $value) {
        echo $key." - ".$value.PHP_EOL;
        $sum += intval($value);
    }
    echo "Total: ".$sum.PHP_EOL;
}

/**
 * @param array $args
 */
function checkParams($args) {
    if (!isset($args[1]) || $args[1] != "--sum") {
        echo "Please enter --sum argument with value".PHP_EOL;
    }
    elseif (!isset($args[2]) || is_int($args[2])) {
        echo "Please enter sum argument integer value".PHP_EOL;
    }
}