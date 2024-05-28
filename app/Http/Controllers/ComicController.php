<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

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
        $data = [
            'comics' => $comics
        ];
        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'title' => 'required|max:99',
                'thumb' => 'required',
                'price' => 'required',
                'series' => 'required|max:99',
                'sale_date' => 'required',
                'type' => 'required|max:49',
                'description' => 'nullable|min:10|max:5000',
            ],
            [
                'title.required' => 'Please insert a title for this new comic',
                'thumb.required' => "Plese insert the comic's image URL",
                'price.required' => "Plese insert the comic's price",
                'series.required' => "Plese insert this comic's serie",
                'sale_date.required' => "Plese insert when they released this comic",
                'type.required' => "Plese insert this comic's type",
                'description.min' => 'The description must be at least 10 characters long',
                'description.max' => "The description can't be more than 5000 characters long"
            ]
        );
        $formData = $request->all();
        $newComic = new Comic();
        // $newComic->title = $data['title'];
        $newComic->thumb = 'https://picsum.photos/200';
        // $newComic->price = $data['price'];
        // $newComic->series = $data['series'];
        // $newComic->sale_date = $data['sale_date'];
        // $newComic->type = $data['type'];
        // $newComic->description = $data['description'];
        $newComic->fill($formData);
        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        $data = [
            'comic' => $comic
        ];
        // dd($comic);
        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        $data = [
            'comic' => $comic
        ];
        return view('comics.edit', $data);
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
        $validate = $request->validate(
            [
                'title' => 'required|max:99',
                'thumb' => 'required',
                'price' => 'required',
                'series' => 'required|max:99',
                'sale_date' => 'required',
                'type' => 'required|max:49',
                'description' => 'nullable|min:10|max:5000'
            ],
            [
                'title.required' => 'Please insert a title for this comic',
                'thumb.required' => "Plese insert the comic's image URL",
                'price.required' => "Plese insert the comic's price",
                'series.required' => "Plese insert this comic's serie",
                'sale_date.required' => "Plese insert when they released this comic",
                'type.required' => "Plese insert this comic's type",
                'description.min' => 'The description must be at least 10 characters long',
                'description.max' => "The description can't be more than 5000 characters long"
            ]
        );
        $formData = $request->all();
        $comic = Comic::findOrFail($id);
        // La funzione update() mi fa il Mass Assignment dei dati presi dal forum e me li mette come nuovi valori degli attibuti del comic selezoinato tramite $id
        $comic->update($formData);
        // dd($formData, $comic);
        return redirect()->route('comics.show', ['comic' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
