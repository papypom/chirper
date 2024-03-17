<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GigController extends Controller
{
    // Show all listings
    public function index() {
        return view('gigs.index', [
            'gigs' => Gig::latest()->filter(request(['tag','search']))->paginate(6)
        ]); 
    }

    public function show(Gig $gig) 
    {
        return view('gigs.show', [
            'gig' => $gig
        ]); 
    }

    public function create() 
    {
        return view('gigs.create'); 
    }

    public function store() 
    {
        $formFields = request()->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('gigs','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => '',
            'description' => 'required'
        ]);

        Gig::create($formFields);

        return redirect('/gigs')-> with('success', 'Gig created successfully!');
    }


    //Show single listing 
}
