<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\ticket;

use Illuminate\Http\Request;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('partial.newTicket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreeventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreeventRequest $request)
    {
      $data = $request->all();
         if($event = event::create($data)){
             $this->storeTicket($data,$event->id);
             return redirect()->route('index')->with('message','Succesfully Added Data');
         }
    }

    private function storeTicket($data,$eid)
    { 
      $count = sizeof($data['id']);
      for($a=0;$a<$count;$a++){
         $item['event_id'] = $eid;
         $item['ticket_id'] = $data['id'][$a];
         $item['ticket_number'] = $data['ticketNo'][$a];
         $item['price'] = $data['price'][$a];
         ticket::create($item);
      }
    }
}
