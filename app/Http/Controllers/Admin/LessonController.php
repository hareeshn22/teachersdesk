<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Stream;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Subject;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Lesson::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $langs    = Language::all();
        $streams = Stream::all();
        // $courses = Course::all();
        // $subjects = Subject::all();
        // $lessons = Lesson::all();
        return view('admin.lesson.index', compact('streams', ));

    }

    
    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Lesson::select('*'))

                ->filter(function ($query) use ($request) {

                    if ($request->get('subjectId')) {
                        $lessonId = $request->get('subjectId');
                        if ($lessonId) {
                            $query->where('subject_id', '=', $lessonId);
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
    public function filterbys(Request $request)
    {
        // $st_id = $request->stid;
        // $cid = $request->cid;
        $sid = $request->sid;
        return Lesson::orderByDesc('id')->where('subject_id', '=', $request->id)->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $streams = Stream::all();
        $courses = Course::all();
        $subjects = Subject::all();
        return view('admin.lesson.add', compact('streams', 'courses', 'subjects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'subjectid'  => 'required',
            // 'content' => 'required',
            // 'phone' => 'required',
        ]);

        Lesson::create([
            // 'stream_id' => $request->streamid,
            // 'course_id' => $request->course_id,
            'subject_id' => $request->subjectid,
            'name' => $request->name,
        ]);

        return back()->with('success', 'You have successfully created the Lesson.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $Lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        // $images = Image::paginate(9);
        $streams = Stream::all();
        $courses = Course::all();
        $subjects = Subject::all();
        $lesson = Lesson::find($id);
        $ssubject = Subject::find($lesson->subject_id);
        $scourse = Course::find($ssubject->course_id);

        return view('admin.Lesson.edit', compact('streams', 'courses', 'subjects', 'lesson', 'ssubject', 'scourse' ));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $Lesson = Lesson::find($request->id);

        // $Lesson->Lesson_id = $request->Lessonid;
        $Lesson->name = $request->name;

        // $Lesson->descr = $request->descr;
        // $Lesson->phone = $request->phone;
        // $Lesson->address = $request->address;
        // $Lesson->pcolor = $request->pcolor;
        // $Lesson->scolor = $request->scolor;

        // if ($request->logo != '') {
        //     $Lesson->logo = $request->logo;
        // }

        $Lesson->save();

        return redirect()->back()->with('success', 'You have successfully updated the Lesson.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $Lesson = Lesson::find($id);
        $Lesson->delete();

        return redirect()->back()->with('success', 'You have successfully deleted the Lesson.');

    }
}
