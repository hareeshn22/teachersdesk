@extends('layouts.admin')

@section ('title') Add Example @endsection

@section ('css')

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/functions.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet" />

@endsection




@section ('content')

    @if ($message = Session::get('success'))

        <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h3 class="alert-heading fs-5 fw-bold mb-1">Success</h3>
            <p class="mb-0">
                {{ $message }}!
            </p>
        </div>

    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h3 class="alert-heading fs-5 fw-bold mb-1">Errors</h3>
            <p><strong>Whoops!</strong> There were some problems with your input.</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }} !</li>
                @endforeach
            </ul>
        </div>

    @endif


    <div class="my-3 text-center">
        <h2 class="fw-bold mb-2">
            Add Example
        </h2>
        <!-- <h3 class="fs-base fw-medium text-muted mb-0">
                This is the 7th property you are adding to your portfolio.
            </h3> -->
    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Example <small>Fill Required fields</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.examples.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row items-push">

                    <div class="col-12">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="stream">Stream</label>
                                <select class="form-select" id="stream" name="streamid" required="">
                                    <option selected="" disabled>Select Stream</option>
                                    @foreach ($streams as $stream)
                                        <option value="{{ $stream->id }}" {{ old('streamid') == $stream->id ? 'Selected' : '' }}>
                                            {{ $stream->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="class">Course</label>
                                <select class="form-select" id="class" name="courseid" required="">
                                    <option selected="" disabled> Select Course </option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('courseid') == $course->id ? 'Selected' : '' }}>
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="subject">Subject</label>
                                <select class="form-select" id="subject" name="subjectid" required="">
                                    <option selected="" disabled>Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subjectid') == $subject->id ? 'Selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                         <div class="row mb-4">
                            <div class="col-md-8">
                                <label for="lesson"> Lesson </label>
                                <select id="lesson" name="lessonid" class="select2 custom-select form-control" required>
                                    <option value="" disabled selected> Select Lesson</option>
                                    @foreach ($lessons as $lesson)
                                        <option value="{{ $lesson->id }}" {{ old('lessonid') == $lesson->id ? 'Selected' : '' }}>
                                            {{ $lesson->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="topic">Topic</label>
                                <select class="form-select" id="topic" name="topicid" required="">
                                    <option selected="" disabled>Select Topic</option>
                                    {{--@foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subjectid') == $subject->id ? 'Selected' : '' }}>{{ $subject->name }}
                                        </option>
                                    @endforeach--}}
                                </select>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="fname">Image</label>
                                <input type="file" class="form-control form-control-lg" id="fname" name="image">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label" for="content"> Content </label>
                                <!-- Hidden input to hold HTML content -->
                                <input type="hidden" name="info" id="hiddenContent">

                                <!-- <textarea id="editor" name="content" class="postcontent" rows="20"
                                                                                cols="100%"> {{ old('content') }}</textarea> -->
                                <div id="editor" style="height: 400px;"></div>

                            </div>
                        </div>


                         <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="fname">Voice</label>
                                <input type="file" class="form-control form-control-lg" id="fname" name="voice">
                            </div>
                        </div>




                    </div>

                </div>

                <!-- Form Submission -->
                <div class="row items-push">
                    <div class="col-lg-7 offset-lg-4">
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-plus opacity-50 me-1"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Form Submission -->
            </form>
        </div>
    </div>

@endsection




@section ('scripts')

 <script src="{{ asset('backend/js/functions.js') }}"></script>

    <script type="text/javascript">
        $(".select2").select2();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {

            // On Stream Change
            $('#stream').on('change', function (e) {
                var cat_id = e.target.value;
                console.log(cat_id);
                $.ajax({
                    url: "{{ route('admin.courses.filterbys') }}",
                    type: "POST",
                    data: {
                        id: cat_id
                    },
                    success: function (data) {
                        $('#class').empty();
                        $('#class').append('<option value="" disabled selected> Select Class</option>');
                        $.each(data, function (index, course) {
                            $('#class').append('<option value="' + course.id + '">' + course.name + '</option>');
                            // $.each(subcategory.subcategories, function (index, subcategory) {
                            //     $('#subcategory').append('<option value="' + subcategory.id + '">&nbsp;&nbsp;' + subcategory.name + '</option>');
                            // })
                        })
                    }
                })
            });
            // On Course Change
            $('#class').on('change', function (e) {
                var cid = e.target.value;
                console.log(cid);
                if (cid != '') {
                    $.ajax({
                        url: "{{ route('admin.subjects.filterbys') }}",
                        type: "POST",
                        data: {
                            id: cid
                        },
                        success: function (data) {
                            $('#subject').empty();
                            $('#subject').append('<option value="" disabled selected> Select Subject</option>');
                            $.each(data, function (index, course) {
                                $('#subject').append('<option value="' + course.id + '">' + course.name + '</option>');
                                // $.each(subcategory.subcategories, function (index, subcategory) {
                                //     $('#subcategory').append('<option value="' + subcategory.id + '">&nbsp;&nbsp;' + subcategory.name + '</option>');
                                // })
                            })
                        }
                    })


                }

            });
             // On Subject Change
            $('#subject').on('change', function (e) {
                var cid = e.target.value;
                console.log(cid);
                if (cid != '') {
                    $.ajax({
                        url: "{{ route('admin.lessons.filterbys') }}",
                        type: "POST",
                        data: {
                            id: cid
                        },
                        success: function (data) {
                            $('#lesson').empty();
                            $('#lesson').append('<option value="" disabled selected> Select Lesson</option>');
                            $.each(data, function (index, course) {
                                $('#lesson').append('<option value="' + course.id + '">' + course.name + '</option>');
                                // $.each(subcategory.subcategories, function (index, subcategory) {
                                //     $('#subcategory').append('<option value="' + subcategory.id + '">&nbsp;&nbsp;' + subcategory.name + '</option>');
                                // })
                            })
                        }
                    })


                }

            });

            // On Lesson Change
            $('#lesson').on('change', function (e) {
                var cid = e.target.value;
                console.log(cid);
                if (cid != '') {
                    $.ajax({
                        url: "{{ route('admin.topics.filterbys') }}",
                        type: "POST",
                        data: {
                            sid: cid
                        },
                        success: function (data) {
                            $('#topic').empty();
                            $('#topic').append('<option value="" disabled selected> Select Topic</option>');
                            $.each(data, function (index, course) {
                                $('#topic').append('<option value="' + course.id + '">' + course.name + '</option>');
                                // $.each(subcategory.subcategories, function (index, subcategory) {
                                //     $('#subcategory').append('<option value="' + subcategory.id + '">&nbsp;&nbsp;' + subcategory.name + '</option>');
                                // })
                            })
                        }
                    })


                }

            });


        });
    </script>


    <!-- functions plugin -->
    <!-- <script src="{{ asset ('backend/js/functions.min.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
    <!-- HTML Edit Button plugin -->
    <script src="https://unpkg.com/quill-html-edit-button@2.2.7/dist/quill.htmlEditButton.min.js"></script>
    <script>
        // Make sure htmlEditButton is available globally
        Quill.register("modules/htmlEditButton", window.htmlEditButton);
    </script>



    <script>
        $(document).ready(function () {
            const toolbarOptions = [
                // [{ font: [] }, { 'size': ['small', false, 'large', 'huge'] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'list': 'check' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'align': [] }, { 'direction': 'rtl' }],
                ['link'],
                ['clean']
            ];

            var quill = new Quill("#editor", {

                theme: "snow",
                modules: {
                    toolbar: toolbarOptions,
                    htmlEditButton: {
                        debug: true,
                        msg: "Edit HTML here",
                        okText: "OK",
                        cancelText: "Cancel"
                    }


                    //     toolbar: [
                    //     [{ 'color': [] }, { 'background': [] }],
                    //     ['bold', 'italic', 'underline'],
                    //     ['clean']
                    // ]
                }

            });




            $('form').on('submit', function () {
                var htmlContent = quill.root.innerHTML;
                $('#hiddenContent').val(htmlContent);
            });
        });
    </script>



@endsection