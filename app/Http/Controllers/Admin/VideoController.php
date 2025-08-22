<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\Stream;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Video::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $langs    = Language::all();
        $lessons = Lesson::all();
        return view('admin.video.index', ['lessons' => $lessons]);
    }
 /**
     * Filter the listing of the resource.
     */
    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Video::orderByDesc('id')->select('*'))

                ->filter(function ($query) use ($request) {

                    // if ($request->get('startDate') && $request->get('endDate')) {
                    //     $startDate = $request->get('startDate');
                    //     $endDate = $request->get('endDate');
                    //     if ($startDate && $endDate) {
                    //         $query->whereDate('appointdate', '>=', \Carbon\Carbon::parse($startDate)->format('Y-m-d'))
                    //             ->whereDate('appointdate', '<=', \Carbon\Carbon::parse($endDate)->format('Y-m-d'));
                    //     }
                    // }
    
                    if ($request->get('courseId')) {
                        $schoolId = $request->get('courseId');
                        if ($schoolId) {
                            $query->where('course_id', '=', $schoolId);
                        }
                    }

                })
                // ->addColumn('school', function ($query) {
                //     $name = $query->school->name;
                //     // $html =  $name ;
                //     return $name;
                // })
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $streams = Stream::all();
        $courses = Course::all();
        $subjects = Subject::all();
        $lessons = Lesson::all();
        $topic = Topic::all();
        return view('admin.video.add', compact('streams', 'courses', 'subjects', 'lessons'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
