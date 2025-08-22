<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Lesson;
use App\Models\Stream;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Example;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Example::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $langs    = Language::all();
        $lessons = Lesson::all();
        return view('admin.example.index', ['lessons' => $lessons]);
    }

    /**
     * Filter the listing of the resource.
     */
    public function filter(Request $request)
    {
         return DataTables::of(Example::with('media')->select('examples.*'))
            ->filter(function ($query) use ($request) {

                if ($request->get('topicId')) {
                    $topicId = $request->get('topicId');
                    if ($topicId) {
                        $query->where('course_id', '=', $topicId);
                    }
                }

            })
            ->addColumn('image', function ($row) {
                $media = $row->getFirstMedia('images');
                return $media
                    ? '<img src="' . $media->getUrl('thumb') . '" width="60">'
                    : '';
            })
            // ->addColumn('audio', function ($row) {
            //     $media = $row->getFirstMedia('audio');
            //     return $media
            //         ? '<audio controls style="width:150px">
            //                <source src="'.$media->getUrl().'" type="'.$media->mime_type.'">
            //            </audio>'
            //         : '';
            // })
            ->addColumn('action', 'admin.helper.action')
            ->rawColumns(['action', 'image'])
            ->addIndexColumn()
            ->make(true);
        //
        // if (request()->ajax()) {
        //     return datatables()->of(Example::orderByDesc('id')->select('*'))

        //         ->filter(function ($query) use ($request) {

        //             // if ($request->get('startDate') && $request->get('endDate')) {
        //             //     $startDate = $request->get('startDate');
        //             //     $endDate = $request->get('endDate');
        //             //     if ($startDate && $endDate) {
        //             //         $query->whereDate('appointdate', '>=', \Carbon\Carbon::parse($startDate)->format('Y-m-d'))
        //             //             ->whereDate('appointdate', '<=', \Carbon\Carbon::parse($endDate)->format('Y-m-d'));
        //             //     }
        //             // }
    
        //             if ($request->get('courseId')) {
        //                 $schoolId = $request->get('courseId');
        //                 if ($schoolId) {
        //                     $query->where('course_id', '=', $schoolId);
        //                 }
        //             }

        //         })
        //         // ->addColumn('school', function ($query) {
        //         //     $name = $query->school->name;
        //         //     // $html =  $name ;
        //         //     return $name;
        //         // })
        //         ->addColumn('action', 'admin.helper.action')
        //         ->rawColumns(['action'])
        //         ->addIndexColumn()
        //         ->make(true);
        // }

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
        $topics = Topic::all();
        return view('admin.example.add', compact('streams', 'courses', 'subjects', 'lessons', ));
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
