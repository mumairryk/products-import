<?php

namespace App\Http\Controllers;

use App\Exports\ExportProductsSample;
use App\Imports\ImportProductsSample;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Excel;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products.list',compact('products'));
    }

    public function import(Request $request){
        if ($request->has('download')){
            $sampleData[] = [
                'name'=>'ABC',
                'description'=>'products description',
                'code'=>Str::random(5),
                'sku'=>Str::random('5'),
                'qty'=>1
            ];
            return Excel::download(new ExportProductsSample($sampleData), 'ProductsImportSample.xlsx');
        }

        if ($request->has('import'))
        {

            $this->validate($request,[
                'file'=>'required'
            ]);
            Excel::import(new ImportProductsSample(), request()->file('file'));
            return redirect()->route('products.list')->with('success','Data imported successfully');
        }
        return view('products.import');
    }
}
