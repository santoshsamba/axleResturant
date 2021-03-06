<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Model\foodCategory;
use App\Model\foodType;
use App\Model\food;

class foodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return foodCategory::orderByDesc('foodCatId')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = foodType::find(1);
        $user->foodcategory()->create($request->all());
            return "sucess";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, foodCategory $foodcategory)
    {
        return $foodcategory->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($foodcatid)
    {
        DB::beginTransaction();
        $delFoodItem = food::where('foodCatId', $foodcatid)->delete();

        $delFoodCat = foodCategory::where('foodCatId', $foodcatid)->delete();
        if(!$delFoodCat || !$delFoodCat){
            DB::rollback();
        }else{
            DB::commit();
        }
    }
}