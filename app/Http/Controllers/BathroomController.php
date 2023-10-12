<?php

namespace App\Http\Controllers;

use App\Models\Bathroom;
use Illuminate\Http\Request;

class BathroomController extends Controller
{
    public function index()
    {
        return view('bathroom');
    }

    public function create()
    {
        return view('bathroom.create');
    }

    public function store(Request $request)
    {
       $bathroom =  Bathroom::create($request->all());
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos', 'public');
                $bathroom->images()->create([
                    'path' => $path,
                    'caption' => '',  // You can add caption functionality too
                ]);
            }
        }
        // dd($bathroom);
        return redirect()->route('home');
    }
}
