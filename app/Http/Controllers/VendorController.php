<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors=Vendor::all();
        return response()->view('dsh.vendors.index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('dsh.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator($request->all(),[
            'name'=>'required|string|min:3|max:45',
            'email'=>'required|string|min:3|max:45',
        ]);

        if(!$validator->fails()){
            $vendor=new Vendor();
            $vendor->name=$request->input('name');
            $vendor->email=$request->input('email');
            $isSaved=$vendor->save();
            return response()->json(['message'=>$isSaved?'Created Succesfully':'Created Failed'],Response::HTTP_CREATED);
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        return response()->view('dsh.vendors.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $validator=Validator($request->all(),[
            'name'=>'required|string|min:3|max:45',
            'email'=>'required|string|min:3|max:45',
        ]);
        if(!$validator->fails()){
            $vendor->name=$request->input('name');
            $vendor->email=$request->input('email');
            $isUpdated=$vendor->save();
            return response()->json(['message'=>$isUpdated?'Updated Succesfully':'Updated Failed'],Response::HTTP_OK);
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $isDeleted=$vendor->delete();
        return response()->json([
            'icon' => $isDeleted ? 'success' : 'error',
            'title' => $isDeleted ? 'Deleted Successfully' : 'Deleted Failed!',
        ],$isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}