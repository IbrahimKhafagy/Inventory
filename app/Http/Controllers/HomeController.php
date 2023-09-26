<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use App\Models\products;
use App\Models\Companies;
use App\Models\inventory;
use Illuminate\Http\Request;
use App\Models\Advertisements;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $currancy_id = $request->currency_id ? $request->currency_id : 1;
       // $inventory_id =$request->inventory_id ? $request->inventory_id : 1;
        $totalPrice = 0;
       $countProduct = 0;
       $toptotalPrice = [];
       $products=[];
       $Com = DB:: table('companies')->get();
        $curr=DB :: table('currancy')->get();
       // $inv = DB:: table('inventory')->get();
       $adv = Advertisements::get();
        if (Auth::user()->companies_id == 1) {
            $totalPrice =products::sum('Price');

                                                                                                              //,"inventory_id"                                   ,"inv"
            $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id","companies_id")->where("currancy_id",$currancy_id)->with(["curr","Com"])->orderByRaw("TotalPrice DESC")->limit(4)->get();

            $countProduct = products::count();
            $products = DB::table('products') // for total with differance currancy
            ->join('currancy', 'currancy.id', '=', 'products.currancy_id')//->where("inventory_id",$inventory_id)// for total with differance currancy
            ->selectRaw('sum(products.TotalPrice) as total,currancy.name')->groupBy('currancy.name')->get();// for total with differance currancy


        } else {
            $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id")->where('companies_id', Auth::user()->companies_id)->where("currancy_id",$currancy_id)->with(["curr"])->orderByRaw("TotalPrice DESC")->limit(4)->get();
            $totalPrice = products::where('companies_id', Auth::user()->companies_id)->sum('Price');
            $countProduct = products::where('companies_id', Auth::user()->companies_id)->count();
            $products = DB::table('products') // for total with differance currancy
            ->join('currancy', 'currancy.id', '=', 'products.currancy_id')->where('products.companies_id', Auth::user()->companies_id)// for total with differance currancy
            ->selectRaw('sum(products.TotalPrice) as total,currancy.name')->groupBy('currancy.name')->get();// for total with differance currancy


        }

        // Hint: Auth::user() is the currently signed in user object.


            // <---------------    OLD CODE      -------------->

                    // $first_time_login = false;
                    //     if (Auth::user()->first_time_login) {
                    //         $first_time_login = true;
                    //     }
                    //     Auth::user()->first_time_login = false ;
///////////////////////////////////////////////////////////////////////////
                    $first_time_login = false;
                    //     if (Auth::user()->first_time_login) {
                    //         $first_time_login = true;
                    //         Auth::user()->first_time_login = false;
                            // Auth::user()->save();
                        // }
///////////////////////////////////////////////////////////////////////////

        return view('home',compact('totalPrice','countProduct','products','toptotalPrice','curr','first_time_login','Com','adv'));

        // Now send the variable $first_time_login to your view
       // return view('home', ['first_time_login' => $first_time_login]);

    }

   /*function fetch( $id = 1)
    {
        // $currancy_id = $request->currency_id ? $request->currency_id : 1;
        $toptotalPrice = [];

        $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id","companies_id")->where("currancy_id",$id)->with(["curr","Com"])->orderByRaw("TotalPrice DESC")->limit(4)->get();
        return json_encode($toptotalPrice);
    }*/

function fetch( $id)
    {
        $toptotalPrice = [];
        if (Auth::user()->companies_id == 1) {
        $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id","companies_id")->where("currancy_id",$id)->with(["curr","Com"])->orderByRaw("TotalPrice DESC")->limit(4)->get();
        }
        else {
            $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id")->where('companies_id', Auth::user()->companies_id)->where("currancy_id",$id)->with(["curr"])->orderByRaw("TotalPrice DESC")->limit(4)->get();

        }
        return json_encode($toptotalPrice);

    }

    public function allselect(Request $request ){


        // dd($request);

        $ids = $request->input('selected_ids');
        $data = User::get();


        if (!empty($ids)) {
            $selected = User::whereIn('id', $ids)->get();
            $company= Companies::whereIn('id',$ids)->get();

        return view('advertisements.user_dashboard', compact('selected','data','company'))->with('success','Request has been Sent successfully!,Please wait for response');
    } else {
        return back()->with('error','Request has been failed!,Please try again');
    }
}


// public function showIds(Request $request )
// {
//     $ids = Companies::get();
//     //  استعراض الـ IDs المراد عرضها في الجدول
//     return view('advertisements.user_dashboard', compact('ids'));
//     }


    public function userDashboard()
    {
        return view('advertisements.user_dashboard');
    }

}
