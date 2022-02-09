<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function index(){

        $shortlinks = ShortLink::paginate(10);

        return view('short_links',compact('shortlinks'));
    }

    public function store(Request $request){

        $request->validate([
            'link' => 'required | url | unique:short_links,link'
        ]);

       $data ['link'] = $request->link;
       $data ['code'] = \Illuminate\Support\Str::random(6);

       Shortlink::create($data);

       return redirect('/')->with('success','لقد تم أختصار الرابط بنجاح ');
    }



    public function show($code){

       $row = ShortLink::where('code',$code)->firstOrFail();

       $row->visits_count += 1 ;

       $row->save();

       return redirect($row->link);
    }
}
