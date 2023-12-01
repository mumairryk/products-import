<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportProductsSample implements FromArray,WithHeadings
{
    private $data;
    public function __construct($dataArr)
    {
        $this->data = $dataArr;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        $headings =null;
        foreach ($this->data[0] as $key=>$row){
            $headings[] = $key;
        }
        return $headings;
    }
}
