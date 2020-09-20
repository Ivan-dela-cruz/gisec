<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $searches = Search::orderBy('created_at', 'DESC')->get();
        return view('welcome',compact('searches'));
    }
    public function filter(Request $request)
    {
        $query = trim($request->get('description'));
        $location = trim($request->get('location'));
        $title = trim($request->get('title'));

        $searches = Search::orderBy('title','DESC')
            ->where('description', 'like', '%' . $query . '%')
            ->orWhere('location', 'like', '%' . $location . '%')
            ->orWhere('title', 'like', '%' . $title . '%')
            ->get();
        return view('welcome',compact('searches','query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $search = new Search();
        $search->url = $request->url;
        $search->title = $request->title;
        $search->image = $this->loadImage($request);
        $search->description = $request->description;
        $search->location = $request->location;
        $search->ip = $request->ip;
        $search->rating = $request->rating;
        $search->views = $request->views;
        $search->longitude = $request->longitude;
        $search->latitude = $request->latitude;
        $search->save();
        return redirect()->route('home')->with('status', '¡Tú solicitud se ha enviado satisfactoriamente!');;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $search = Search::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'data' => $search,
            'success' => true
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadImage(Request $request)
    {
        $ruta_archivo = "#";

        if ($request->file('image')) {

            $archivo = $request->file('image');
            $nombre_archivo = "image-" . time() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('images'), $nombre_archivo);
            $ruta_archivo = "images/" . $nombre_archivo;
        } else {
            $ruta_archivo = "#";
        }
        return $ruta_archivo;
    }
}
