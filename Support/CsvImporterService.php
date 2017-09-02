<?php
/**
 * Author: Nortido <nortido@gmail.com>
 */

namespace Nortido\ProductBag\Support;


use Nortido\ProductBag\Interfaces\Adapter;
use Nortido\ProductBag\Interfaces\Service;

class CsvImporterService implements Service
{
    /**
     * @param array $args
     * @return array
     */
    public function run($args)
    {
        return $this->importCsv($args['filepath'], $args['adapterClass']);
    }

    /**
     * @param string $filename
     * @param string $delimiter
     * @return array
     * @throws \Exception
     */
    private function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new \Exception('Cannot read the file');
        }

        $header = null;
        $data = array();
        $handle = fopen($filename, 'r');

        if ($handle !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }

            fclose($handle);
        }

        return $data;
    }

    /**
     * @param string $file
     * @param Adapter $adapterClass
     * @return array
     * @throws \Exception
     */
    private function importCsv($file, $adapterClass)
    {
        if (!isset($file) || empty($file)) {
            throw new \Exception('File is not setted');
        }

        $itemsArr = $this->csvToArray($file);
        $entitiesArr = [];

        foreach ($itemsArr as $item) {
            $entitiesArr[] = $adapterClass::convert($item);
        }

        return $entitiesArr;
    }
}