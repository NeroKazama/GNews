<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Game $game,Request $request)
    {
        $game->create([
            'name' => $request->name,
            'description_one' => $request->Adescription,
            'description_two' => $request->Bdescription,
            'image' => '/image/game/game'.$game->id.'.jpg'
        ]);

        if ($request->input('images') != null) {
                $avatarName = 'game' . $game->_id . '.' . 'jpg';
                $img = imagecreatetruecolor(1500, 1500);
                $bg = imagecolorallocate ( $img, 255, 255, 255 );
                imagefilledrectangle($img,0,0,1500,1500,$bg);
                imagejpeg($img,$_SERVER['DOCUMENT_ROOT'] . '/image/game/' . $avatarName, 80);
                $name = $image;
                $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/image/game/' . $avatarName, "wb");
                $data = explode(',', $name);
                fwrite($file, base64_decode($data[1]));
                fclose($file);
        }

        response()->json('OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Auth::user()->roles->role;
        if($role == "Admin") {
            $games = Game::find($id);
            return view('admin.game', compact('games'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

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
        $game = Game::findOrFail($id);
        $game->update([
            'name' => $request->name,
            'description_one' => $request->Adescription,
            'description_two' => $request->Bdescription
        ]);

        response()->json('ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Game::find($id)->delete();
    }
}
