<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newqrcode;
use QRCode;


class scanqrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $tscanqrs = newqrcode::all();
        // return view('scanqr')->with('tscanqrs', $tscanqrs);

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

       // return view('/scanqr')->with('error', 'baaad');

        //print_r($request->input());

        //$this->validate($request, [
         //   'zscanqr' => 'required'
         //  ]);

        $getscan = $request->input('zscanqr');
       // return redirect('/scanqr')->with('success', $getscan );
       // $vscanqr = newqrcode::select('qrmsg')->where('qrmsg', $getscan)->exists();
       
       $vscanqrs = newqrcode::select('id')
                ->where('qrmsg', '=', $getscan)
                ->get()->id;
               
      //  $vact = $vscanqrs->id;
            if($vscanqrs){

                        // update row
                        newqrcode::where('id', $vscanqr->id)->update(['qraction' => '1']);

            }    

       return view('/scanshow', ['vscanqrs'=>$vscanqrs]);
       
       //$getmsg = $vscanqr->'qrmsg';
       // return view('/scanshow')->with('vscanqrs', $vscanqrs);
               // $don = new newqrcode;
        //if($vscanqr === $getscan){

         //   return redirect('/scanqr')->with('success', 'good');
       // }else{

        //    return redirect('/scanqr')->with('error', 'baaad');
       // }

      
   
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
