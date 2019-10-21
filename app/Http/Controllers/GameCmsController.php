<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameRequirement;
use App\Game;

class GameCmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $game_info = Game::with(['game_requirement' =>  function ($query) use($request) {
            if($request->filled('event_type') && $request->get('event_type') != 'all') {
                $query->where('id',$request->get('event_type'));
            }
        }])->find(1);

        $event_listing = GameRequirement::all();
        return view('fashion_stylist.show_event',['game_info' => $game_info,'event_listing' => $event_listing]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event_type = config('gamedata');
        $game_listing = Game::all();
        return view('fashion_stylist.create_event',['game_listing' => $game_listing,'event_type' => $event_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'game' => 'required',
            'event_name' => 'required',
            'event_type' => 'required',
            'player_option' => 'required'
        ]);

        $game_need = [
            'game_id' => $request->game,
            'event_name' => $request->event_name,
            'event_type' => $request->event_type,
            'player_option' => $request->player_option,
            'dresses' => $request->dresses,
            'tops' => $request->tops,
            'bottoms' => $request->bottoms,
            'shoes' => $request->shoes,
            'bags' => $request->bags,
            'jewellery' => $request->jewellery,
            'accessories' => $request->accessories,
            'background' => $request->background,
            'hair' => $request->hair,
            'props' => $request->prop
        ];

        if (GameRequirement::create($game_need)) {
            return redirect()->back()->with('msg','Data Added Successfully');
        }

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
