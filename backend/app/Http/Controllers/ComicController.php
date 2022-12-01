<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return response()->json([
            'message' => 'successfully',
            'data' => $comics
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Comic::create($request->all());
        return response()->json([
            'message' => 'created successfully',
            'data' => $book
        ], 201, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        if ($comic) {
            return response()->json([
                'message' => 'successfully',
                'data' => $comic
            ], 200, [], JSON_UNESCAPED_UNICODE);
        }
        return response()->json([
            'message' => 'Comic not found',
        ], 404);
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
        $update = [
            'title' => $request->title,
            'author' => $request->author
        ];
        $comic = Comic::where('id', $id)->update($update);
        if ($comic) {
            return response()->json([
                'message' => 'Comic updated successfully',
            ], 200);
        }
        return response()->json([
            'message' => 'Comic not found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::where('id', $id)->delete();
        if ($comic) {
            return response()->json([
                'message' => 'Comic deleted successfully',
            ], 200);
        }
        return response()->json([
            'message' => 'Comic not found',
        ], 404);
    }
}
