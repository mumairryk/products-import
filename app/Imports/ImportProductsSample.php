<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ImportProductsSample implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
        return new Products($row);
    }
    public function rules(): array
    {
        return [
            'name' => 'required',
            'code'=>'required'
        ];
    }
}
