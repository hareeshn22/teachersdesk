@extends('layouts.admin')

@section ('title') Edit Class @endsection

@section ('css')


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
        Edit Class
    </h2>
    <!-- <h3 class="fs-base fw-medium text-muted mb-0">
            This is the 7th property you are adding to your portfolio.
        </h3> -->
</div>


<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Class <small>Fill Required fields</small></h3>
    </div>
    <div class="block-content">
        <form action="{{ route('admin.courses.update') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="id" value=" {{ $course->id }}">

            <div class="row items-push">

                
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="stream">Syllabus</label>
                                <select class="form-select" id="stream" name="streamid" required="">
                                    <option selected="" disabled>Select Syllabus</option>
                                    @foreach ($streams as $stream)
                                        <option value="{{ $stream->id }}" {{ $course->stream_id == $stream->id ? 'Selected' : '' }}>
                                            {{ $stream->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="name">Class Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $course->name }}">
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




<script>
// bsCustomFileInput.init();


// on change of type

$('#linktype').on('change', function(e) {
    // console.log(e.target.value);


    if (e.target.value == 'post') {
        $('#post').show();
        $('#problem').hide();
        $('#posts').prop("required", true);
        $('#problem').prop("required", false);
    } else if (e.target.value == 'problem') {
        $('#post').hide();
        $('#problem').show();
        $('#problems').prop("required", true);
        $('#posts').prop("required", false);
    } else {
        $('#post').hide();
        $('#problem').hide();
    }

    

});

$(document).ready(function() {
        if ($('#linktype').val() == 'post') {
            $('#post').show();
            $('#posts').prop("required", true);
        }

        if ($('#linktype').val() == 'problem') {
            $('#problem').show();
            $('#problems').prop("required", true);
        }
    });
</script>



@endsection