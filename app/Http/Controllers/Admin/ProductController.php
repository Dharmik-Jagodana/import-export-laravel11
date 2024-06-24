<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\User;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('*')->latest();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_id',function($row){
                    return $row->getUser->name ?? '';
                })
                ->addColumn('created_at',function($row){
                    return dynamicDateFormat($row->created_at, 6);
                })
                ->rawColumns(['user_id', 'created_at'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        // Validate incoming request data
        $request->validate([
            'file' => 'required|max:2048',
        ]);
  
        Excel::import(new ProductsImport, $request->file('file'));

        return back()->with('success', 'Product imported successfully.');
    }
}
