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
            $errors = [];
            $imported=0;
            $data = Excel::toArray(new ImportProductsSample(), request()->file('file'));
            if (sizeof($data) > 0) {
                if (sizeof($data[0]) > 0) {
                    foreach ($data[0] as $index=>$value) {
                        if (empty($value['name']) || empty($value['code']))
                        {
                            $errors[]="Row: " .++$index." is empty product name or code.";
                        }
                        else
                        {
                            Products::create([
                                'name'=>$value['name'],
                                'description'=>$value['description'],
                                'code'=>$value['code'],
                                'sku'=>$value['sku'],
                                'qty'=>$value['qty']
                            ]);
                            $imported++;
                        }
                    }
                    if (count($errors)>0)
                    {
                        return redirect()->back()->with('errors',$errors);
                    }
                    else
                    {
                        return redirect()->route('products.list')->with('success',$imported." rows inserted");
                    }
                }
                else
                {
                    return redirect()->back()->with('error','No data exist in file');
                }
            }
            else
            {
                return redirect()->back()->with('error','No data exist in file');
            }
        }
        return view('products.import');
    }
}
