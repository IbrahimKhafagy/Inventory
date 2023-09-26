<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\unitt;
use App\Models\stores;
use App\Models\attached;
use App\Models\currancy;
use App\Models\Companies;
use App\Models\inventory;
use App\Models\managesku;
//use App\Http\Requests\StoreInventoryRequest;
use App\Models\Categories;

use App\Models\productype;
use Illuminate\Http\Request;
use App\Models\Subcategories;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit as XmlUnit;
use Illuminate\Support\Facades\Notification;// this important to use send word in notification

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
          //
     }





    public function index()
    {

        return view('Stores.storeindex');

    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Stores.Add_store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
       //
    }



    /**
     * Display the specified resource.
     *
     * @param  inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(inventory $inventory)
    {
        //
    }


    public function destroy($products)
    {
       //
    }







}
