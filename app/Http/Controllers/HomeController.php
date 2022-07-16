<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;



use App\Models\Product;

use App\Models\Staffs;

use App\Models\Cart;





class HomeController extends Controller
{
    public function index()
    {

        if(Auth::id())
        {
            return redirect('redirects');
        }

        else

        $data=product::all();

        $data2=staffs::all();
        return view("home",compact("data","data2"));
    }


    public function redirects()
    {

        $data=product::all();

        $data2=staffs::all();

        $usertype= Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.adminhome');
        }

        else
        {

            $user_id=Auth::id();

            $count=cart::where('user_id',$user_id)->count();


            return view('home',compact('data','data2','count'));
        }
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {

            $user_id=Auth::id();

            $productid=$id;
            $quantity=$request->quantity;
            $cart=new cart;
            $cart->user_id=$user_id;
            $cart->product_id=$productid;
            $cart->quantity=$quantity;

            $cart->save();


            return redirect()->back();
        }

        else
        {
            return redirect('/login');
        }

    }


    public function showcart(Request $request, $id)
    {

        $count=cart::where('user_id',$id)->count();

        

    

        return view('showcart',compact('count'));
    }














}
