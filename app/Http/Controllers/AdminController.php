<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Product;

use App\Models\Reservation;

use App\Models\Staffs;

use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function user()
    {
        if(Auth::id()){

        $data=user::all();
        return view("admin.users",compact("data"));
    }

    else{
            return redirect('login');
        }

    }

     public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function deletemenu($id)
    {

        $data=product::find($id);

        $data->delete();

        return redirect()->back();

    }


    public function updateview($id)
    {

        $data=product::find($id);

        return view("admin.updateview",compact("data"));
    }


    public function update(Request $request, $id)
    {
        $data=product::find($id);

         $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

                $request->image->move('productimage',$imagename);

                $data->image = $imagename;


                $data->title=$request->title;

                $data->price=$request->price;

                $data->description=$request->description;


                $data->save();
                return  redirect()->back();


    }




    public function productmenu()
    {
         if(Auth::id()){

        $data = product::all();
        
        return view("admin.productmenu", compact("data"));
    }

    else{
            return redirect('login');
        }

    }



    public function upload(Request $request)
    {
      $data = new product;

      $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

                $request->image->move('productimage',$imagename);

                $data->image = $imagename;


                $data->title=$request->title;

                $data->price=$request->price;

                $data->description=$request->description;


                $data->save();
                return  redirect()->back();


        
    }

    public function reservation(Request $request)
    {
      $data = new reservation;

     


                $data->name=$request->name;

                $data->email=$request->email;

                $data->phone=$request->phone;

                $data->guest=$request->guest;

                $data->date=$request->date;

                $data->time=$request->time;

                $data->message=$request->message;


                $data->save();
                return  redirect()->back();


        
    }


    public function viewreservation()
    {
        if(Auth::id()){



        $data=reservation::all();

        return view("admin.adminreservation",compact("data"));

    }

        else{
            return redirect('login');
        }
    }


    public function viewstaffs()
    {
        if(Auth::id()){

        $data=staffs::all();

        return view("admin.adminstaffs",compact("data"));
    }

     else{
            return redirect('login');
        }

    }


    public function uploadstaffs(Request $request)
    {


        $data=new staffs;


        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

                $request->image->move('staffsimage',$imagename);

                $data->image = $imagename;


                $data->name=$request->name;
                $data->speciality=$request->speciality;
                

                $data->save();

                return redirect()->back();
    }

    public function updatestaffs($id)
    {

        $data=staffs::find($id);

        return view("admin.updatestaffs",compact("data"));
    }

    public function updatestaff(Request $request, $id)
    {

        $data=staffs::find($id);


        $image=$request->image;

        if ($image){
              $imagename=time().'.'.$image->getClientOriginalExtension();

                $request->image->move('staffsimage',$imagename);

                $data->image = $imagename;

        }

      


                $data->name=$request->name;
                $data->speciality=$request->speciality;


                $data->save();
                return redirect()->back();
        
    }

    public function deletestaff($id)
    {
 
     $data=staffs::find($id);

     $data->delete();

     return redirect()->back();

    }









}
