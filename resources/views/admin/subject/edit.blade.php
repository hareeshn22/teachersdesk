@extends('layouts.admin')

@section ('title') Edit Subject @endsection

@section ('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/functions.css') }}">

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
            Edit Subject
        </h2>
        <!-- <h3 class="fs-base fw-medium text-muted mb-0">
                    This is the 7th property you are adding to your portfolio.
                </h3> -->
    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Subject <small>Fill Required fields</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.subjects.update') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <input type="hidden" name="id" value=" {{ $subject->id }}">

                <div class="row items-push">

                    <div class="col-12">

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="stream">Syllabus</label>
                                <select class="form-select " id="stream" name="streamid" required="">
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
                                <label class="form-label" for="class">Class</label>
                                <select class="form-select select2" id="class" name="courseid" required="">
                                    <option selected="" disabled> Select Class </option>
                                    {{-- @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('courseid')==$course->id ? 'Selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                    @endforeach --}}
                                </select>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="name">Subject Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name"
                                    value="{{ $subject->name }}">
                            </div>
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

    <script>
        // bsCustomFileInput.init();
        $(".form-select").select2();

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


        });
    </script>





@endsection