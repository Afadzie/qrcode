<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newqrcode;
use QRCode;

class multipleqrController extends Controller
{
    public function multiqr(){
     
        //runqr();

        function runqr(){

            $qrname = 'kofi';
        $qraction = 0;

                 // function runallqr (){
                    $nqr = new newqrcode();
                    $nqr->qrname = $qrname;
                    $nqr->qraction = $qraction;
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
                    
        
                   // return redirect('/genqr')->with('success', $nqramt); 


        }
           $num = 3;
        for($i=1; $i <= $num ; $i++){

         runqr($i);
              
     }

    
 }

}
