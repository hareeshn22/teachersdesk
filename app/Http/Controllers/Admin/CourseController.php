<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Stream;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Course::select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $streams = Stream::all();
        return view('admin.course.index', compact('streams'));

    }


    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Course::select('*'))

                ->filter(function ($query) use ($request) {

                    if ($request->get('streamId')) {
                        $lessonId = $request->get('streamId');
                        if ($lessonId) {
                            $query->where('stream_id', '=', $lessonId);
                        }
                    }

                })

                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function coursebys(Request $request)
    {
        //
        return Course::where('stream_id', '=', $request->id)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $streams = Stream::all();
        return view('admin.course.add', compact('streams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            // 'logo'  => 'required',
            // 'content' => 'required',
            // 'phone' => 'required',
        ]);

        Course::create([
            'stream_id' => $request->streamid,
            'name' => $request->name,

        ]);

        return back()->with('success', 'You have successfully created the course.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
