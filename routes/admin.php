<?php

use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\AIController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ExampleController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\NoteController;

Route::middleware(['auth'])
    ->prefix('admram')
    ->group(function () {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
        // Courses
        Route::name("admin.courses")->middleware(['auth'])->prefix('courses')->group(function () {

            Route::get('/', [CourseController::class, 'index']);
            Route::post('/filter', [CourseController::class, 'filter'])->name('.filter');
            Route::post('/filterbys', [CourseController::class, 'coursebys'])->name('.filterbys');
            Route::get('/create', [CourseController::class, 'create'])->name('.add');
            Route::post('/store', [CourseController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('.edit');
            Route::post('/update', [CourseController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('.delete');

        });
        // Subjects
        Route::name("admin.subjects")->middleware(['auth'])->prefix('subjects')->group(function () {

            Route::get('/', [SubjectController::class, 'index']);
            Route::post('/filter', [SubjectController::class, 'filter'])->name('.filter');
            Route::post('/filterbys', [SubjectController::class, 'filterbys'])->name('.filterbys');
            Route::get('/create', [SubjectController::class, 'create'])->name('.add');
            Route::post('/store', [SubjectController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('.edit');
            Route::post('/update', [SubjectController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('.delete');

        });


        Route::name("admin.lessons")->middleware(['auth'])->prefix('lessons')->group(function () {

            Route::get('/', [LessonController::class, 'index']);
            Route::post('/filter', [LessonController::class, 'filter'])->name('.filter');
            Route::post('/filterbys', [LessonController::class, 'filterbys'])->name('.filterbys');
            Route::get('/add', [LessonController::class, 'create'])->name('.add');
            Route::post('/store', [LessonController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [LessonController::class, 'edit'])->name('.edit');
            Route::post('/update', [LessonController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [LessonController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.topics")->middleware(['auth'])->prefix('topics')->group(function () {

            Route::get('/', [TopicController::class, 'index']);
            Route::post('/filter', [TopicController::class, 'filter'])->name('.filter');
            Route::post('/filtersub', [TopicController::class, 'filtersub'])->name('.filtersub');
            Route::post('/filterbys', [TopicController::class, 'filterbys'])->name('.filterbys');
            Route::get('/add', [TopicController::class, 'create'])->name('.add');
            Route::get('/addsub', [TopicController::class, 'createsub'])->name('.addsub');
            Route::post('/store', [TopicController::class, 'store'])->name('.store');
            Route::post('/storesub', [TopicController::class, 'storesub'])->name('.storesub');
            Route::get('/edit/{id}', [TopicController::class, 'edit'])->name('.edit');
            Route::post('/update', [TopicController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [TopicController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.materials")->middleware(['auth'])->prefix('materials')->group(function () {

            Route::get('/', [MaterialController::class, 'index']);
            Route::get('/sub/{id}', [MaterialController::class, 'subprobs'])->name('.sub');

            Route::post('/filter', [MaterialController::class, 'filter'])->name('.filter');
            Route::get('/create', [MaterialController::class, 'create'])->name('.add');
            Route::get('/createsub', [MaterialController::class, 'createsub'])->name('.addsub');
            Route::post('/store', [MaterialController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('.edit');
            Route::post('/update', [MaterialController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [MaterialController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.examples")->middleware(['auth'])->prefix('examples')->group(function () {

            Route::get('/', [ExampleController::class, 'index']);
            Route::get('/create', [ExampleController::class, 'create'])->name('.add');
            Route::post('/filter', [ExampleController::class, 'filter'])->name('.filter');
            Route::post('/store', [ExampleController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [ExampleController::class, 'edit'])->name('.edit');
            Route::post('/update', [ExampleController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [ExampleController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.notes")->middleware(['auth'])->prefix('note')->group(function () {

            Route::get('/', [NoteController::class, 'index']);
            Route::get('/create', [NoteController::class, 'create'])->name('.add');
            Route::post('/filter', [NoteController::class, 'filter'])->name('.filter');
            Route::post('/store', [NoteController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [NoteController::class, 'edit'])->name('.edit');
            Route::post('/update', [NoteController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [NoteController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.images")->middleware(['auth'])->prefix('images')->group(function () {

            Route::get('/', [ImageController::class, 'index']);
            Route::get('/select', [ImageController::class, 'select'])->name('.select');
            Route::get('/create', [ImageController::class, 'create'])->name('.add');
            Route::post('/store', [ImageController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [ImageController::class, 'edit'])->name('.edit');
            Route::post('/update', [ImageController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [ImageController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.videos")->middleware(['auth'])->prefix('videos')->group(function () {

            Route::get('/', [VideoController::class, 'index']);
            Route::post('/filter', [VideoController::class, 'filter'])->name('.filter');
            Route::get('/create', [VideoController::class, 'create'])->name('.add');
            Route::post('/store', [VideoController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('.edit');
            Route::post('/update', [VideoController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [VideoController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.teachers")->middleware(['auth'])->prefix('teachers')->group(function () {

            Route::get('/', [TeacherController::class, 'index']);
            Route::post('/filter', [TeacherController::class, 'filter'])->name('.filter');
            Route::get('/create', [TeacherController::class, 'create'])->name('.add');
            Route::post('/store', [TeacherController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('.edit');
            Route::post('/update', [TeacherController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [TeacherController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.students")->middleware(['auth'])->prefix('students')->group(function () {

            Route::get('/', [StudentController::class, 'index']);
            Route::post('/filter', [StudentController::class, 'filter'])->name('.filter');
            Route::get('/create', [StudentController::class, 'create'])->name('.add');
            Route::post('/store', [StudentController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('.edit');
            Route::post('/update', [StudentController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('.delete');

        });

        // Route::name("admin.notes")->middleware(['auth'])->prefix('notes')->group(function () {

        //     Route::get('/', [NoteController::class, 'index']);
        //     Route::get('/create', [NoteController::class, 'create'])->name('.add');
        //     Route::post('/store', [NoteController::class, 'store'])->name('.store');
        //     Route::get('/edit/{id}', [NoteController::class, 'edit'])->name('.edit');
        //     Route::post('/update', [NoteController::class, 'update'])->name('.update');
        //     Route::get('/delete/{id}', [NoteController::class, 'delete'])->name('.delete');

        // });
        Route::name("admin.pages")->middleware(['auth'])->prefix('pages')->group(function () {

            Route::get('/', [PageController::class, 'index']);
            Route::get('/create', [PageController::class, 'create'])->name('.add');
            Route::post('/store', [PageController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [PageController::class, 'edit'])->name('.edit');
            Route::post('/update', [PageController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [PageController::class, 'delete'])->name('.delete');

        });


        // Exams
        Route::name("admin.exams")->middleware(['auth'])->prefix('exams')->group(function () {

            Route::get('/', [ExamController::class, 'index']);
            Route::post('/filter', [ExamController::class, 'exambys'])->name('.filterbys');


        });

        // Route::name("admin.categories")->middleware(['auth'])->prefix('cates')->group(function () {
    
        //     Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        //     Route::get('/sub/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'subcates'])->name('.sub');
    
        //     Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('.add');
        //     Route::get('/createsub', [App\Http\Controllers\Admin\CategoryController::class, 'createsub'])->name('.addsub');
    
        //     Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('.store');
        //     Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('.edit');
        //     Route::post('/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('.update');
        //     Route::get('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('.delete');
    
        // });
    
        // Academic
        Route::name("admin.academic")->middleware(['auth'])->prefix('academic')->group(function () {

            Route::get('/', [AcademicController::class, 'index']);
            Route::post('/filter', [AcademicController::class, 'academicbys'])->name('.filterbys');
            Route::get('/add', [AcademicController::class, 'create'])->name('.add');
            Route::post('/store', [AcademicController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [AcademicController::class, 'edit'])->name('.edit');
            Route::post('/update', [AcademicController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [AcademicController::class, 'delete'])->name('.delete');

        });

        // Attendance AI
        Route::name("admin.attendai")->middleware(['auth'])->prefix('attendai')->group(function () {

            Route::get('/', [AIController::class, 'index']);
            Route::get('/add', [AIController::class, 'create'])->name('.add');
            Route::post('/store', [AIController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [AIController::class, 'edit'])->name('.edit');
            Route::post('/update', [AIController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [AIController::class, 'delete'])->name('.delete');

        });
        // Attendance AI
        Route::name("admin.homeworkai")->middleware(['auth'])->prefix('homeworkai')->group(function () {

            Route::get('/', [AIController::class, 'index']);
            Route::get('/add', [AIController::class, 'createhome'])->name('.add');
            Route::get('/addoption', [AIController::class, 'createoption'])->name('.addoption');
            Route::post('/store', [AIController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [AIController::class, 'edit'])->name('.edit');
            Route::post('/update', [AIController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [AIController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.setting")->middleware(['auth'])->prefix('setting')->group(function () {

            Route::get('/', [SettingController::class, 'index']);
            Route::post('/filter', [SettingController::class, 'filter'])->name('.filter');
            Route::get('/create', [SettingController::class, 'create'])->name('.add');
            Route::post('/store', [SettingController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('.edit');
            Route::post('/update', [SettingController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [SettingController::class, 'delete'])->name('.delete');

        });

    });
