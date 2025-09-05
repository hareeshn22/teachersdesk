<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExampleResource;
use App\Models\Material;
use App\Models\Example;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid)
    {
        return ExampleResource::collection(Example::where('topic_id', '=', $sid)->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function examplesbys($id)
    {
        // $subject = Subject::where('code','=', $code)->first();
        return Example::collection(Example::where('topic_id', '=', $id)->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        // $courses = Course::all();
        // $subjects = Subject::all();
        // return view('admin.lesson.add', compact('courses', 'subjects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Example $example)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Example $example)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Example $example)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Example $example)
    {
        //
    }
}
