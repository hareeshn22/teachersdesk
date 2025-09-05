<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Resources\LessonResource;
use App\Models\Course;
use App\Models\Subject;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid)
    {
        return LessonResource::collection(Lesson::where('subject_id', '=', $sid)->get());
    }

     /**
     * Display a listing of the resource.
     */
    public function lessonsbys($code)
    {
        $subject = Subject::where('code','=', $code)->first();
        return LessonResource::collection(Lesson::where('subject_id', '=', $subject->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $images = Image::paginate(9);
        $courses = Course::all();
        $subjects = Subject::all();
        return view('admin.lesson.add', compact('courses', 'subjects'));

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
            'content' => 'required',
            'phone' => 'required',
        ]);

        Lesson::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'descr' => $request->descr,
            'phone' => $request->phone,
            'address' => $request->address,
            'pcolor' => $request->pcolor,
            'scolor' => $request->scolor,
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
        $Lesson = Lesson::find($id);
        return view('admin.Lesson.edit', ['Lesson' => $Lesson]);

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

        $Lesson->descr = $request->descr;
        $Lesson->phone = $request->phone;
        $Lesson->address = $request->address;
        $Lesson->pcolor = $request->pcolor;
        $Lesson->scolor = $request->scolor;

        if ($request->logo != '') {
            $Lesson->logo = $request->logo;
        }

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
