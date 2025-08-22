@extends('layouts.admin')

@section ('title') Add SubTopic @endsection

@section ('css')

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
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
            Add SubTopic
        </h2>
        <!-- <h3 class="fs-base fw-medium text-muted mb-0">
                        This is the 7th property you are adding to your portfolio.
                    </h3> -->
    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">SubTopic <small>Fill Required fields</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.topics.storesub') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row items-push">

                    <div class="col-12">

                        <div class="col-md-8">
                            <label class="form-label" for="stream">Syllabus</label>
                            <select class="form-select" id="stream" name="streamid" required="">
                                <option selected="" disabled>Select Syllabus</option>
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
                            <label class="form-label" for="course">Class</label>
                            <select class="form-select" id="course" name="courseid" required="">
                                <option selected="" disabled> Select Class </option>
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
                            <label for="school"> Lesson </label>
                            <select id="school" name="schoolid" class="select2 custom-select form-control" required>
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
                            <label for="topic"> Topic </label>
                            <select id="topic" name="topicid" class="select2 custom-select form-control" required>
                                <option value="" disabled selected> Select Topic</option>
                                

                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label" for="name"> Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name">
                        </div>
                    </div>

                    <!-- <div class="row mb-4">
                                <div class="col-md-8">

                                    <input id="select-logo" type="hidden" name="image" value="">
                                    <a class="btn btn-primary mt-2 mt-xl-0" onClick="add()" href="javascript:void(0)"> <i
                                            class="mdi mdi-plus text-white"></i> Select Image </a>
                                </div>
                            </div>
                            <div id="show-image" class="mb-4">

                            </div> -->



                    <!-- <div class="row mb-4">
                                <div class="col-md-8">
                                    <label class="form-label" for="video">Video Link</label>
                                    <input type="text" class="form-control form-control-lg" id="video" name="video_link">
                                </div>
                            </div> -->



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


    <!-- School modal -->
    <div class="modal fade" id="school-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Select Image</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        {{-- <div id="data-wrapper" class="row items-push">
                            @include('admin.helper.data')
                        </div>

                        <div class="text-center">

                            <button class="btn btn-success load-more-data"><i class="fa fa-refresh"></i> Load More
                                Data...</button>

                        </div> --}}



                        <!-- Data Loader -->

                        <div class="auto-load text-center" style="display: none;">

                            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                                enable-background="new 0 0 0 0" xml:space="preserve">

                                <path fill="#000"
                                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

                                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />

                                </path>

                            </svg>

                        </div>
                        {{--<div id="imgs" class="row items-push">
                            @foreach ($images as $image )
                            <div class="col-md-3 animated fadeIn">
                                <div class="options-container">
                                    <img class="img-fluid options-item" src="{{ asset('uploads/large/' . $image->name) }}"
                                        alt="">
                                    <div class="options-overlay bg-black-75">
                                        <div class="options-overlay-content">
                                            <h3 class="h4 text-white mb-1">{{$image->name}}</h3>
                                            <a class="btn btn-sm btn-primary"
                                                onClick="selectImage('{{ $image->id }}', '{{ $image->name }}' )">
                                                Select
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>--}}
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End School model -->

@endsection




@section ('scripts')

    <!-- functions plugin -->
    <script src="{{ asset('backend/js/functions.min.js') }}"></script>

    <script>


        function add() {
            $('#PatientForm').trigger("reset");
            $('#SchoolModal').html("Select Image");
            $('#school-modal').modal('show');
            $('#id').val('');
        }

        function selectImage(id, name) {
            var url = '{{ route('main') }}';
            event.preventDefault();
            // var selectedFriend = $(this).attr("id");
            console.log(id);
            $('#show-image').empty();
            $("#show-image").prepend($('<img>', {
                id: id,
                src: url + '/uploads/small/' + name,
            }));
            $('#select-logo').val(name);
            $('#school-modal').modal('hide');
        }

        $('imgs').on('click', 'img', function (event) {
            event.preventDefault();
            var selectedFriend = $(this).attr("id");
            console.log(selectedFriend);
        });

        $(document).ready(function () {
            //select2

            $("custom-select").select2();
            

        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {


            $('#class').on('change', function (e) {
                var id = e.target.value;
                console.log(id);
                if (id != '') {
                    $.ajax({
                        url: "{{ route('admin.academic.filterbys') }}",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function (data) {
                            $('#pvexam').empty();
                            $('#pvexam').append('<option value="" disabled selected> Select Previous Exam</option>');
                            $.each(data, function (index, exam) {
                                $('#pvexam').append('<option value="' + exam.id + '">' + exam.name + '</option>');
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

@endsection