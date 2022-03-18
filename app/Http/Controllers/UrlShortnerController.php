<?php

namespace App\Http\Controllers;

use App\Models\UrlShortner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlShortnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = UrlShortner::latest()->get();

        return view('shortenLink', compact('shortLinks'));
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
        $request->validate([
            'link' => 'required|url',
            'code' => 'unique'
        ]);

        $input['link'] = $request->link;
        $input['code'] = Str::random(6);

        UrlShortner::create($input);

        return redirect('generate-shorten-link')
            ->with('success', 'Shorten Link Generated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UrlShortner  $urlShortner
     * @return \Illuminate\Http\Response
     */
    public function show(UrlShortner $urlShortner,$code)
    {
        $find = UrlShortner::where('code', $code)->first();

        return redirect($find->link);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UrlShortner  $urlShortner
     * @return \Illuminate\Http\Response
     */
    public function edit(UrlShortner $urlShortner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UrlShortner  $urlShortner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UrlShortner $urlShortner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UrlShortner  $urlShortner
     * @return \Illuminate\Http\Response
     */
    public function destroy(UrlShortner $urlShortner)
    {
        //
    }
}
