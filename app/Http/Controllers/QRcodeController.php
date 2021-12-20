<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qrcode.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scan()
    {
        return view('qrcode.scan');
    }


    /**
     * Display a qrcode of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $request->validate(['content'=>'required']);
        $content = $request->content;
        // xml image
         // $qrCode = \QrCode::size(300)->generate($content);
         \QrCode::size(300)->format('svg')->generate($content, public_path('images/qrcode.svg'));
        $qrCode = 'images/qrcode.svg';


        $data = [
                'content'=>$content,
                'qrCode'=>$qrCode,
            ];

        return view('qrcode.index')->with($data);
    }

    /**
     * Display a qrcode of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($type=null)
    {
        if($type=='simple'){
            return response()->download(public_path('images/qrcode.svg'));
        }
            return response()->download(public_path('images/qrcode.svg'));
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
        //
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
