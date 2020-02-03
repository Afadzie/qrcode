<?php

namespace App\Http\Controllers;

use App\newqrcode;
use Illuminate\Http\Request;
use QRCode;

class NewqrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $scanqrs = newqrcode::all();
       // return view('scanqr')->with('scanqrs', $scanqrs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
         'qramount' => 'required',
         'qrname' => 'required'
        ]);

        //get data from form input
        $nqramt = $request->input('qramount');
        $defamt = 0;

         // function runallqr (){
            $nqr = new newqrcode();
            $nqr->qrname = $request->input('qrname');
            $nqr->qraction = $request->input('qraction');
            $nqr->save();
    
            //get id
            $getid = $nqr->id;
    
            
            // create upload path
            $file = 'newgen_codes/'.$getid.'.png';
            
           // $newQRCode = QRCode::text("qrcodemessage")->setSize(4)->setMargin(2)->setOutfile($file)->png();
          
           // generate random unique strings
           $qrmsg = str_random(22);
    
           // put the qr image in the directory
           $genQRCode = QRCode::text($qrmsg)->setOutfile($file)->png();
    
           // get qr code path and unique string
            $nqr->qrurl =  $file;
            $nqr->qrmsg = $qrmsg;
           
            // update row
            newqrcode::where('id', $getid)->update(['qrurl' => $nqr->qrurl,'qrmsg' => $nqr->qrmsg]);
            

            return redirect('/genqr')->with('success', $nqramt); 
    

     //  }

        //$fall = runallqr();

      //  @while($defamt <= $fall)
      //   {{$fall++}}
       // @endwhile

       // return redirect('/genqr')->with('success', $nqramt);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\newqrcode  $newqrcode
     * @return \Illuminate\Http\Response
     */
    public function show(newqrcode $newqrcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\newqrcode  $newqrcode
     * @return \Illuminate\Http\Response
     */
    public function edit(newqrcode $newqrcode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\newqrcode  $newqrcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, newqrcode $newqrcode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\newqrcode  $newqrcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(newqrcode $newqrcode)
    {
        //
    }
}
