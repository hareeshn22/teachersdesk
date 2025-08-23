<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\Stream;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;


class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Material::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $langs    = Language::all();
        $streams = Stream::all();
        $lessons = Lesson::all();
        return view('admin.material.index', compact('lessons', 'streams' ));
    }

    /**
     * Filter the listing of the resource.
     */
    public function filter(Request $request)
    {
        //
        // $materials = Material::with('media')->select('materials.*');

        return DataTables::of(Material::with('media')->select('materials.*'))
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

        // if (request()->ajax()) {
        //     return datatables()->of(Material::orderByDesc('id')->select('*'))

        //         ->filter(function ($query) use ($request) {

        //             if ($request->get('topicId')) {
        //                 $topicId = $request->get('topicId');
        //                 if ($topicId) {
        //                     $query->where('course_id', '=', $topicId);
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
        $topic = Topic::all();
        return view('admin.material.add', compact('streams', 'courses', 'subjects', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subtopicid' => 'required|exists:topics,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'info' => 'required|string',
            'audio_path' => 'nullable|mimes:mp3,wav,ogg|max:5120',
        ]);

        $material = Material::create([
            'topic_id' => $validated['subtopicid'],
            'content' => $validated['info'],
        ]);

        // Attach image
        $material->addMedia($request->file('image'))
            ->toMediaCollection('images');

        // Attach audio if present
        if ($request->hasFile('audio_path')) {
            $material->addMedia($request->file('audio_path'))
                ->toMediaCollection('audio');
        }


        // return response()->json([
        //     'message'  => 'Material created successfully.',
        //     'material' => $material
        // ], 201);


        return back()->with('success', 'You have successfully created the Material.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $page = Material::find($id);
        $page->delete();

        return redirect()->back()->with('success', 'You have successfully deleted the material.');

    }
}
