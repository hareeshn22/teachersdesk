<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Subject::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $streams = Stream::all();
        $courses = Course::all();
        return view('admin.subject.index', compact('courses', 'streams'));
    }

    /**
     * Filter the listing of the resource.
     */
    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Subject::orderByDesc('id')->select('*'))

                ->filter(function ($query) use ($request) {


                    if ($request->get('courseId')) {
                        $courseId = $request->get('courseId');
                        if ($courseId) {
                            $query->where('course_id', '=', $courseId);
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
    public function filterbys(Request $request)
    {
        //
        return Subject::where('course_id', '=', $request->id)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $streams = Stream::all();
        $courses = Course::all();
        return view('admin.subject.add', compact('courses', 'streams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'courseid' => 'required',
            // 'content' => 'required',
            // 'phone' => 'required',
        ]);

        $course = Course::find($request->courseid);
        $stream = $course->stream->name;
        Subject::create([
            'course_id' => $request->courseid,
            'name' => $request->name,
            'code' => strtoupper(str_replace(' ', '', $stream) . '-' . str_replace(' ', '',$course->name) . '-' . substr($request->name, 0, 3))

        ]);

        return back()->with('success', 'You have successfully created the Subject');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $streams = Stream::all();
        $subject = Subject::find($id);
        return view('admin.subject.edit', compact('subject', 'streams', ));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $subject = Subject::find($request->id);

        // $Lesson->Lesson_id = $request->Lessonid;
        $subject->name = $request->name;

        $subject->stream_id = $request->streamid;

        $subject->save();

        return redirect()->back()->with('success', 'You have successfully updated the Subject.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
