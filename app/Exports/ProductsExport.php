<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ProductsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Product::select("id", "user_id", "name", "stock", "price", "deatils", "created_at")->get();

        return view('admin.product.excel.exportExcelProductView', [
            'data' => $data
        ]);
    }
}