<?php

namespace App\Imports;


use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel,WithHeadingRow ,WithValidation
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */



    public function model(array $row)
    {
        return new Product([
            'title' => $row['title'],
            'brand' => $row['brand'],
            'about' => $row['about'],
            'characteristic' => $row['characteristic'],
            'composition' => $row['composition'],
            'price' => $row['price'],
            'discount' => $row['discount'],
            'quantity' => $row['quantity'],
        ]);
    }

    public function rules(): array
    {
       return [
           '*.title' => ['required'],
           '*.brand' => ['required'],
           '*.about' => ['required'],
           '*.characteristic' => ['required'],
           '*.composition' => ['required'],
           '*.price' => ['required', 'integer'],
           '*.discount' => ['required', 'integer'],
           '*.quantity' => ['required', 'integer'],
       ];
    }
}
