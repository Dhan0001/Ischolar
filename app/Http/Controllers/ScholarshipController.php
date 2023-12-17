<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScholarshipRequest;
use App\Http\Requests\UpdateScholarshipRequest;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $scholarship = Scholarship::all();

        return view('scholarship.index', compact('scholarship'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('scholarship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScholarshipRequest $request)
    {
        Scholarship::create($request->validated());

        return redirect()->route('scholarship.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
       return view('scholarship.show', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $name)
    {
        return view('scholarship.edit', compact('scholarship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScholarshipRequest $request, Scholarship $scholarship)
    {
        $scholarship -> update ($request->validated());

        return redirect()->route('scholarship.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();

        return redirect()->route('scholarship.index');
    }
}
