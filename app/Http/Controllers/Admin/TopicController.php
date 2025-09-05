<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Topic::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $langs    = Language::all();
        $streams = Stream::all();
        $lessons = Lesson::all();
        return view('admin.topic.index', compact('lessons', 'streams'));

    }

    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Topic::orderByDesc('id')->with('lesson')->select('*'))

                ->filter(function ($query) use ($request) {

                    if ($request->get('lessonId')) {
                        $lessonId = $request->get('lessonId');
                        if ($lessonId) {
                            $query->where('lesson_id', '=', $lessonId);
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
        return Topic::where('lesson_id', '=', $sid)->where('parent_id', '=', null)->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function filtersub(Request $request)
    {
        // $st_id = $request->stid;
        // $cid = $request->cid;
        $sid = $request->sid;
        return Topic::where('parent_id', '=', $sid)->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $streams = Stream::all();
        $courses = Course::all();
        $subjects = Subject::all();
        $lessons = Lesson::all();
        return view('admin.topic.add', compact('lessons', 'streams', 'courses', 'subjects'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createsub()
    {
        //
        $streams = Stream::all();
        // $courses = Course::all();
        // $subjects = Subject::all();
        // $lessons = Lesson::all();
        return view('admin.topic.addsub', compact(
            'streams',
            // 'lessons', 'courses', 'subjects'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'logo'  => 'required',
            // 'content' => 'required',
            // 'phone' => 'required',
        ]);

        Topic::create([
            'lesson_id' => $request->lessonid,
            'name' => $request->name,

        ]);

        return back()->with('success', 'You have successfully created the Topic.');
    }

    /**
     * Store a newly created subtopic in storage.
     */
    public function storesub(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'topicid' => 'required',
            // 'logo'  => 'required',
            // 'content' => 'required',
            // 'phone' => 'required',
        ]);

        Topic::create([
            'lesson_id' => $request->lessonid,
            'name' => $request->name,
            'parent_id' => $request->topicid,
        ]);

        return back()->with('success', 'You have successfully created the Topic.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
