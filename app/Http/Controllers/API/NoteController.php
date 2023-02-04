<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notes;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = Notes::all();
        return response()->json([
            'data'=> [
                'note' => $note
            ],
            'message' => 'succes show all'
        ], 200);
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
        $data =$request->only(['title', 'content']);
        $note = Notes::create($data);

        return response()->json([
            'data'=> [
                'note' => $note
            ],
            'message' => 'success created'
        ], 200);

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

        $note = Notes::findOrFail($id);

        return response()->json([
            'data'=> [
                'note' => $note
            ],
            'message' => 'Hello World'
        ], 200);        
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
        $note = Notes::findOrFail($id);
        $data =$request->only(['title', 'content']);
        $note->update($data);

        return response()->json([
            'data'=> [
                'note' => $note
            ],
            'message' => 'Success updated'
        ], 200);       
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
        $note = Notes::findOrFail($id);
        $note->delete();

        return response()->json([
            'message' => 'data deleted'
        ], 200);     
    }
}
