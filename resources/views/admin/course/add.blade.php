@extends('layouts.admin')

@section ('title') Add Class @endsection

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
            Add Class
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
            <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row items-push">

                    <div class="col-12">

                        <div class="row mb-4">
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
                                <label class="form-label" for="name">Class Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name">
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

    <script src="{{ asset('backend/js/vendors.js') }}"></script>

    <!-- functions plugin -->
    <script src="{{ asset('backend/js/functions.min.js') }}"></script>

    <script>

        ClassicEditor
            .create(document.querySelector('#js-ckeditor'), {
                // removePlugins: ['Image', 'MediaEmbed'],
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
        //     import { BlockToolbar } from 'ckeditor5';
        // const { BlockToolbar} = CKEDITOR;
        // ClassicEditor
        //     .create(document.querySelector('#js-ckeditor'), {
        //         //  plugins: [ /* ... */ , AutoImage ]
        //         // plugins: [ BlockToolbar,],
        //         removePlugins: ['Image', 'MediaEmbed'],

        //         ClassicEditor
        //             .create(document.querySelector('#editor'), {
        //                 removePlugins: ['Image', 'MediaEmbed'],
        //                 toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
        //         // blockToolbar: [
        //         //     'uploadImage'
        //         // ],

        //     })
        //     .then(editor => {
        //         window.editor = editor;
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });

        // $('#js-ckeditor').ckeditor(function(){}, {toolbar: 'Basic'});





        $(document).ready(function () {
            //select2
            $('.js-select2').select2();
            // summernote init
            // $('.postcontent').summernote({
            //     placeholder: 'Fill Description',
            //     tabsize: 2,
            //     height: 300,
            //     toolbar: [
            //         ['style', ['style']],
            //         ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
            //         ['color', ['color']],
            //         ['para', ['ul', 'ol', 'paragraph']],
            //         ['table', ['table']],
            //         ['insert', ['link', ]],
            //         ['view', ['fullscreen', 'codeview']]
            //     ]
            // });

        });
    </script>



@endsection