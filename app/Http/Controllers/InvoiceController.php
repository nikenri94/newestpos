<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Product;
use App\Sale;
use App\Sale_detail;
use App\Unit;
class InvoiceController extends Controller
{
    public function index(){
    	$product_lists = Product::pluck('productname','id');
    	return view('invoice.info',compact('product_lists'));
    }
    public function insert(Request $request){
        
        $customers=new Customer;
        $customers->firstname=$request->fn;
        $customers->lastname=$request->ln;
        $customers->sex=$request->sex;
        $customers->email=$request->email;
        $customers->phone=$request->phone;
        $customers->location=$request->location;
        if ($customers->save()){
            $id = $customers->id;

            $sales = new Sale;
            $sales->id_client=$id;
            $sales->total_all=$request->total;
            $sales->discount='0';
            $sales->save();
            
            foreach ($request -> productname as $key => $v) {
                $data = array('cus_id'=>$id,
                              'pro_id'=>$v,
                              'qty'=>$request->tot_qty [$key],
                              'price'=>$request->price [$key],
                              'dis'=>$request->dis [$key],
                              'amount'=>$request->amount [$key]);
                Sale_detail::insert($data);

            }
        }

        $sales = new Sale;
        $sales->id_client=$id;
        return back();
    }
    public function edit(){
    	return view('invoice.update');
    }
    public function update(){
    	
    }
    public function findPrice(Request $request){
        $data = Product::select('price', 'qty')
        ->join('types', 'types.id', '=', 'products.type_id')
        ->where('products.id', '=', $request->id)
        ->first(); 
        return response()->json($data);
    }
    public function findSatuan(Request $request){
        //$data=Product::select('price','qty')->where('id',$request->id)->first();
        $data = Product::select('price', 'qty', 'units.id', 'name_unit')
        ->join('types', 'types.id', '=', 'products.type_id')
        ->join('units', 'types.id', '=', 'units.type_id')
        ->where('products.id', '=', $request->id)
        ->get(); 
        return response()->json($data);
    }
    public function findConvertion(Request $request){
        //$data=Product::select('price','qty')->where('id',$request->id)->first();
        //return $request->all();
         $data = Unit::select('conversi')
        ->where('id', $request->satuan)        
        ->first();
       /* $data = Unit::select('units.conversi')
        ->join('types', 'types.id', '=', 'products.type_id')
        ->join('units', 'types.id', '=', 'units.type_id')
        ->where('units.id', $request->satuan)        
        ->get();*/
        return response()->json($data);
        //return $request->name_unit;
    }



}
