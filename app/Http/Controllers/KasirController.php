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

class KasirController extends Controller
{
    public function tampil_pesan(){
    	$data = Sale::select('namapelayan', 'created_at')
        ->get(); 
    	return view('invoice.kasir',compact('data'));
    }
    public function pembayaran(){
    	/*$data = Sale::select('namapelayan', 'created_at')
        ->get(); */
    	return view('invoice.pembayaran');
    }


    
}
