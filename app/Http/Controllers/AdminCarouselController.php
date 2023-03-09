<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.carousel.index');
    }
    public function carousel()
    {
        $carousels=Carousel::get();
        return view('dashboard.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.carousel.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'picture' => ['required', 'mimes:jpg,png,jpeg']
        // ]);

        $newThumbnailName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('storage/carousel'), $newThumbnailName);

        $store = Carousel::create([ 
            'name'=> $request->title,
            'picture' => $newThumbnailName 
        ]);

        if($store){
            return redirect('/dashboard/carousel');
        } else {
            return back();
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
    public function edit(Carousel $carousel)
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
    public function deleteCarousel(Request $request)
    {
        $deletecarousel = Carousel::where('id', $request->deleteName)->delete();
        $delete = Carousel::where('id', $request->deletePicture)->delete();
        if($delete){
            return back()->with('error', 'berhasil menghapus carousel');
        } else {
            return back()->with('error', 'gagal menghapus carousel');
        }
    }
}
