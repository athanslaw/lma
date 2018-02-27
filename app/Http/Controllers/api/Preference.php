<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stateoforigin;
use App\Lga;
use App\product;
use App\Collection_center;
use App\Lots_customer;
use App\Customer;

class Preference extends Controller
{	
    public function makepreference(Request $request){
		$products = ''; $lga = "";
		if($request->input('product_type') != null){
			$products = product::where('product_type', $request->input('product_type'))->get();
		}else{
			$products = product::where('product_type', 'Grains')->get();
		} 
		$stateoforigin = stateoforigin::where('country', 161)->get();
		
		$datum = '';

		if(session('data')){
			$datum = session('data');
		}else {
		   $datum =['state'=>'', 'address'=>'', 'villages'=>'', 'lga'=>'', 'lot_size'=>'', 'product_id'=>''];
		}
		
		if($datum['state'] !== ''){
          $lga = lga::where('state', $datum['state'])->get();
		}
		else{
          $lga = lga::all();
		}
		
		//Redirect
  		return response()->json(['stateoforigin'=>$stateoforigin, 'lga'=>$lga, 'products'=>$products, 'data'=>$datum, 'request'=>$request], 204);
	   }

    public function submitpreference(Request $request){
		
           $data['state'] = $request->input('state') != null?$request->input('state'):'';
           $data['address'] = $request->input('address') != null?$request->input('address'):'';
           $data['lga'] = $request->input('lga') != null?$request->input('lga'):'';
           $data['product_type'] = $request->input('product_type') != null?$request->input('product_type'):'';
           $data['lot_size'] = $request->input('lot_size') != null?$request->input('lot_size'):'';
           $data['product_id'] = $request->input('product_id') != null?$request->input('product_id'):'';

           if($request->input('state') !==null && $request->input('address') !==null && $request->input('lga') !==null && $request->input('product_type') !==null && $request->input('product_id') !==null && $request->input('lot_size') !==null){
           		$customer = new Lots_customer;
           		$customer->product_id = $data['product_id'];
           		$customer->customer_id = $request->session()->get('userid');
           		$customer->farmer_id = 0;
           		$customer->state = $data['state'];
           		$customer->lga = $data['lga'];
           		$customer->address = $data['address'];
           		$customer->product_lot_size = $data['lot_size'];
           		$customer->date_booked = '2018-02-21 12:24:15';
				$customer->delivery_period = 1;
				$customer->status = 0;

           		//save customer
           		$customer->save();

           		//Redirect
           		return response()->json(['success'=>'Preference registered successfully'], 201);
            }
           return response()->json($data, 500);
	   }

	   public function edit($id, Request $request){
		//View all preferences
		$customer_id = $request->session()->get('userid');
  		
		if(session('data')){
			$datum = session('data');
		}else {
			$datum = Lots_customer::join('product', 'lots_customer.product_id', '=', 'product.product_id')
		->select('product.product_name', 'lots_customer.*')
		->where('customer_id',$customer_id)->first();
		}
		$stateoforigin = stateoforigin::where('country', 161)->get();
        $lga = lga::where('state', $datum['state'])->get();
		if($request->input('product_type') != null){
			$products = product::where('product_type', $request->input('product_type'))->get();
		}else{
			$products = product::where('product_type', 'Grains')->get();
		} 
		//$datum =['state'=>'', 'address'=>'', 'villages'=>'', 'lga'=>'', 'lot_size'=>'', 'product_id'=>''];
		return view('editpreference')->with(['data'=> $datum, 'products'=>$products, 'stateoforigin'=>$stateoforigin, 'lga'=>$lga]);
		
	   }

    public function viewpreference(Request $request){
  		//View all preferences
		$customer_id = $request->session()->get('userid');
  		$preference = Lots_customer::join('product', 'lots_customer.product_id', '=', 'product.product_id')
		->select('product.product_name', 'lots_customer.*')
		->where('customer_id',$customer_id)->get();
		return view('viewpreference')->with('preference', $preference);
  	}
	
     public static function getAddress($cc_id){
		 try{
			 $stateoforigin = Collection_center::join('stateoforigins', 'collection_centers.state', '=', 'stateoforigins.code')
			->select('stateoforigins.code', 'stateoforigins.state')
			->where('collection_centers.cc_id',$cc_id)
			->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
			->get();

		
			 if($stateoforigin !== null){
				return $stateoforigin[0]->state;
			 }
		 }
		 catch(Exception $e){
		 }
			 return '-';
     }

}
