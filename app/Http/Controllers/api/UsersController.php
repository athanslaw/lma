<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Customer;
use App\stateoforigin;
use App\Lga;

class UsersController extends Controller
{

	public function verified(){
		return view('verify');
	}
	
    public function signin($status="", Request $request){
  		$this->validate($request, [
  		'email' => 'required',
  		'password' => 'required'
  		]);
  		$email = $request->input('email');
  		$password = md5($request->input('password'));
		$customer = Customer::where([
       ['email', $email],
       ['password', $password]])->first();
      if(count($customer) > 0){
          $request->session()->put('userid', $customer->id);
		  
          //$value = $request->session()->get('key');
		  /*
		  $state = $this->getState($customer->state);
		  $lga = $this->getLga($customer->lga);
		  */
          //return view('users')->with(['users'=> $customer, 'state'=>$state, 'lga'=>$lga]);
          return redirect('myprofile');
      }
      return redirect('/login')->with(['failed'=>'Invalid login information supplied','request'=>$request]);
  	}

    public function login(Request $request){

  		$email = $request->input('email');
  		$password = md5($request->input('password'));

      $customer = Customer::where([
       ['email', $email], ['password', $password]])->get();
      if(count($customer) > 0){
        $request->session()->put('userid', $customer->customer_id);
        //$value = $request->session()->get('key');
        return view('users')->with('users', $customer);
      }
      return view('login')->with(['failed'=>'Invalid login information supplied','request'=>$request]);
    }

    public function signup(Request $request){
			//$stateoforigin = stateoforigin::all();
      $stateoforigin = stateoforigin::select('code','state')
      ->orderBy('state', 'desc')->get();

      $datum = '';

      if(session('data')){
       $datum = session('data');
     }else {
       $datum =['fname'=>'', 'mname'=>'', 'lname'=>'', 'phone'=>'', 'state'=>'', 'email'=>'', 'lga'=>'', 'address'=>''];
     }
      if($datum['state'] !== null){
          $lga = Lga::where([
          		['state', $datum['state']]
          ])->get();
      }
      else{
          $lga = Lga::where('state', 1)->orderBy('lga', 'asc')
               //->take(5)
               ->get();
      }

      //Redirect
  		return view('register')->with(['stateoforigin'=>$stateoforigin, 'lga'=>$lga, 'data'=>$datum, 'request'=>$request]);
	}

    public function register(Request $request){
			//create a new user
			$this->validate($request, [
			'email' => 'required',
			'password' => 'required| min:6',
			'confirmpassword' => 'required'
  		]);
		
           $data['fname'] = $request->input('fname') != null?$request->input('fname'):'';
           $data['phone'] = $request->input('phone') != null?$request->input('phone'):'';
           $data['state'] = $request->input('state') != null?$request->input('state'):'';
           $data['email'] = $request->input('email') != null?$request->input('email'):'';
           $data['lga'] = $request->input('lga') != null?$request->input('lga'):'';
           $data['address'] = $request->input('address') != null?$request->input('address'):'';

           if($request->input('fname') !==null && $request->input('password') !==null && $request->input('email') !==null){

			   $data['password'] = $request->input('password') != null?$request->input('password'):'';
			   $data['confirmpassword'] = $request->input('confirmpassword') != null?$request->input('confirmpassword'):'';
             if($this->checkEmail($data['email'])){
               return redirect('/user/register')->with(['data'=>$data,'failed'=> 'Email address already exists in the database. Kindly login with your email and password']);
             }elseif($data['password'] !== $data['confirmpassword']){
               return redirect('/user/register')->with(['data'=>$data,'failed'=> 'Password and Confirm password fields should have the same values. Kindly re-enter password']);
             }else{
           		$customer = new Customer;
           		$customer->fname = $data['fname'];
           		$customer->password = md5($request->input('password'));
           		$customer->lname = '';
           		$customer->mname = '';
           		$customer->phone = $data['phone'];
           		$customer->state = $data['state'];
           		$customer->email = $data['email'];
           		$customer->lga = $data['lga'];
           		$customer->address = $data['address'];
				$customer->md5_id = md5($data['email']);
           		$customer->verified_status = 0;
           		$customer->m_email = $data['email'];
           		$customer->m_phone = $data['phone'];

           		//save customer
           		$customer->save();

           		//Redirect
           		//return redirect('/user/signin')->with(['success'=> 'Registration successful. Awaiting verification','request'=>$request]);
           		return $this->signin('Registration successful. Awaiting verification',$request);
            }
           }

           return redirect('/user/register')->with('data', $data);
       	}

    public function profile_edit(Request $request){
        
		$customer_id = $request->session()->get('userid');
		$customer = Customer::where([['id', $customer_id]])->first();
	   
        $data['fname'] = $request->input('fname') != null?$request->input('fname'):$customer->fname;
        $data['lname'] = $request->input('lname') != null?$request->input('lname'):$customer->lname;
        $data['mname'] = $request->input('mname') != null?$request->input('mname'):$customer->mname;
        $data['phone'] = $request->input('phone') != null?$request->input('phone'):$customer->phone;
        $data['state'] = $request->input('state') != null?$request->input('state'):$customer->state;
        $data['lga'] = $request->input('lga') != null?$request->input('lga'):$customer->lga;
        $data['address'] = $request->input('address') != null?$request->input('address'):$customer->address;

           if($request->input('send') !==null && $request->input('fname') !==null && $request->input('phone') !==null && $request->input('state') !==null && $request->input('lga') !==null){
				$customer = Customer::find($customer_id);

           		$customer->fname = $data['fname'];
           		$customer->lname = $data['lname'];
           		$customer->mname = $data['mname'];
           		$customer->phone = $data['phone'];
           		$customer->state = $data['state'];
           		$customer->lga = $data['lga'];
           		$customer->address = $data['address'];

           		//save customer
           		$customer->save();

           		//Redirect
           		return redirect('/myprofile')->with(['success'=> 'Profile updated successfully','request'=>$request]);
            
           }

           return redirect('/profile/update')->with('data', $data);
       	}

    public function profile_update(Request $request){
		$stateoforigin = stateoforigin::select('code','state')->orderBy('state', 'desc')->get();

		$datum = '';

		if(session('data')){
			$datum = session('data');
		}else {
			$customer_id = $request->session()->get('userid');
			$datum = Customer::where([['id', $customer_id]])->first();
		}
		if($datum['state'] !== null){
			$lga = Lga::where('state', $datum['state'])->get();
		}else{
			$lga = Lga::all()->orderBy('lga', 'asc');
		}

		//Redirect
  		return view('profile_update')->with(['stateoforigin'=>$stateoforigin, 'lga'=>$lga, 'data'=>$datum, 'request'=>$request]);
	}

    public function checkEmail($email){
        $customer = Customer::where('email', $email)->get();
        if(count($customer) > 0){
            return true;
        }
        return false;
    }

	 public static function getState($code){
		 try{
			 $state = stateoforigin::where('code', $code)->first();
			 if($state !== null)
				return $state->state;
		 }
		 catch(Exception $e){
		 }
			 return '-';
     }

     public static function getLga($code){
		 try{
			$lga = Lga::where('code', $code)->first();
			if($lga != null)
				return $lga->lga;
		 }
		 catch(Exception $e){
		 }
			 return '-';
     }

     public function getCustomerIdByEmail($email){
       $customer = Customer::where([
   			['email', $email]])->get();
       if(count($customer) > 0){
         $request->session()->put('userid', $email);
         //$value = $request->session()->get('key');
       }
     }

     public function logout(Request $request){
		Auth::logout();
		return redirect('/login');
     }

    public function getUsers(Request $request){
  		//View all users
		echo $request->session()->get('userid');
  		$customer = Customer::all();
  		return view('users')->with(['users'=> $customer, 'name'=>'Samuel']);
  	}

    public function myprofile(Request $request){
  		//View all users
		$customer_id = $request->session()->get('userid');
		$customer = Customer::where([['id', $customer_id]])->first();
	   
		$state = $this->getState($customer->state);
		$lga = $this->getLga($customer->lga);
	   
  		return view('myprofile')->with(['users'=> $customer, 'state'=>$state, 'lga'=>$lga, 'request'=>$request]);
  	}

    public static function getLgas($id)
  	{
  		if (Request::ajax())
  		{
  			$positions = DB::table('sports_positions')->select('position_id','name')->where('sport_id', '=', $id)->get();
  			return Response::json( $positions );
  		}
  	}
}
