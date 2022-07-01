<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class multipleExport implements WithMultipleSheets
{

    private $code;
    private $data;
    public function __construct($code, $data)
    {
        $this->code = $code;
        $this->data = $data;
    }
    public function sheets(): array
    {
        $codeQuery = $this->code;
        $dataQuery = $this->data;
        $sheets = [
            new saleExport($codeQuery, $dataQuery),
            new buyMaterialExport($codeQuery, $dataQuery)
        ];
        return $sheets;
    }
    public function array(): array
    {
        return $this->sheets;
    }
}
