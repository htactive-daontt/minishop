<?php


namespace App\Exports;



abstract class AbstractExport
{
    /**
     * @return mixed
     */
    abstract public function handle();

    /**
     * @return array
     */
    abstract protected function headings(): array;
}
