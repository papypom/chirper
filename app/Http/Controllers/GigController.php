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

    public function store(Request $request) 
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('gigs','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => '',
            'description' => 'required'
        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        };


        Gig::create($formFields);

        return redirect('/gigs')-> with('success', 'Gig created successfully!');
    }

    public function edit(Gig $gig) {
        return view('gigs.edit',['gig' => $gig]);
    }

    public function update(Request $request, Gig $gig) 
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => '',
            'description' => 'required'
        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        };


        $gig->update($formFields);

        return redirect('/gigs/'.$gig->id)-> with('success', 'Gig updated successfully!');
    }

    public function destroy(Gig $gig) 
    {

        $gig->delete();

        return redirect('/gigs')-> with('success', 'Gig deleted successfully!');
    }


    //Show single listing 
}
