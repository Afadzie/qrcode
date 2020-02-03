<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\createqr;
use QRCode;
class createqrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // $qrs = createqr::all();
      //var_dump($qrs);
      // $qr = new createqr::orderBy('created_at');
      $qrs = createqr::all();
       return view('qrcodes.index')->with('qrs', $qrs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createqr');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // print_r($request->input());
        //return 'submitted';
        // validate form
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'idnumber' => 'required'
        ]);

        // create form
        $qr = new createqr();
        $qr->firstname = $request->input('firstname');
        $qr->lastname = $request->input('lastname');
        $qr->idnumber = $request->input('idnumber');

        //input and save in db
        $qr->save();

        // get id
        $getid = $qr->id;

        // create upload path
        $file = 'gen_qrcodes/'.$getid.'.png';
        
       // $newQRCode = QRCode::text("qrcodemessage")->setSize(4)->setMargin(2)->setOutfile($file)->png();
      
       // generate random unique strings
       $qrmsg = str_random(22);

       // put the qr image in the directory
       $genQRCode = QRCode::text($qrmsg)->setOutfile($file)->png();

       // get qr code path and unique string
        $qr->qrcodeurl =  $file;
        $qr->qrcodename = $qrmsg;
       
        // update row
        createqr::where('id', $getid)->update(['qrcodeurl' => $qr->qrcodeurl,'qrcodename' => $qr->qrcodename]);

        return redirect('/createqr')->with('success','QR created'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
