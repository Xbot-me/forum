<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class RepliesController extends Controller
{
    //
    public function __construct()
    {
        
        $this->middleware('auth');
    }

     /**
     * Display the specified resource.
     *
     * @param $channelId
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function store($channelId,Thread $thread)
    {
        $this->validate(request(),[
            'body' => 'required'
        ]);
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id(),

        ]);
        return back();
    }   
}
