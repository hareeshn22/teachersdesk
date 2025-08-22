@extends('layouts.admin')

@section ('title') Topic @endsection

@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('backend/css/data.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/functions.css') }}">
@endsection


@section ('content')


    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Topic</h3>
                </div>
                <!-- <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Topic</li>
                        <li class="breadcrumb-item active">Topic List</li>
                    </ol>
                </div> -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <form method="POST" id="search-form" class="form form-horizontal py-3" role="form">

                        

                        <div class="row ">

                            <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="school">
                                            Syllabus </label>
                                        <select id="stream" name="streamid" class="select2 custom-select form-control"
                                            required>
                                            <option value="" disabled selected> Select Syllabus</option>
                                            @foreach ($streams as $stream)
                                                <option value="{{ $stream->id }}" {{ old('streamid') == $stream->id ? 'Selected' : '' }}> {{ $stream->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="school">
                                            Class</label>
                                        <select id="class" name="courseid" class="select2 custom-select form-control"
                                            required>
                                            <option value="" disabled selected> Select Class</option>
                                            {{--@foreach ($courses as $course)
                                                <option value="{{ $course->id }}" {{ old('courseid') == $course->id ? 'Selected' : '' }}> {{ $course->name }}
                                                </option>
                                            @endforeach--}}

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="school">
                                            Subject</label>
                                        <select id="subject" name="subjectid" class="select2 custom-select form-control"
                                            required>
                                            <option value="" disabled selected> Select Subject</option>
                                            {{--@foreach ($courses as $course)
                                                <option value="{{ $course->id }}" {{ old('courseid') == $course->id ? 'Selected' : '' }}> {{ $course->name }}
                                                </option>
                                            @endforeach--}}

                                        </select>
                                    </div>
                                </div>


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="school"> 
                                        Lesson </label>
                                    <select id="lesson" name="lessonid" class="select2 custom-select form-control"
                                        required>
                                        <option value="" disabled selected> Select Lesson</option>
                                        @foreach ($lessons as $lesson)
                                        <option value="{{ $lesson->id }}"
                                            {{ old('lessonid') == $lesson->id ? 'Selected' : '' }}> {{ $lesson->name }}
                                        </option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>

                           

                            <div class="col-lg-3 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg  ">Search</button>
                            </div>

                        </div>

                    </form>

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

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-centered datatable dt-responsive nowrap" id="page">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th class="text-center" style="width: 50px;"></th>
                                        
                                        <th>Lesson</th>
                                        <th>Name</th>
                                        <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th> -->
                                        <th class="text-center" style="width: 130px;">Actions</th>
                                    </tr>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection







@section('scripts')

    <script src="{{ asset('backend/js/data.js') }}"></script>
    <script src="{{ asset('backend/js/functions.js') }}"></script>

    <script type="text/javascript">
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


        });
    </script>

    <script>
        $(".select2").select2();

        // $('.datepicker').datepicker("setDate", new Date());


        $(document).ready(function () {

            // $('#duration').on('change', function(e) {
            //     var dur = $('#duration').val();
            //     if (dur == 'today') {
            //         $('.datepicker').datepicker("setDate", new Date());
            //         // console.log($( '#startDate' ).val());
            //         $('#period').hide();

            //     }
            //     if (dur == 'week') {
            //         var date = new Date();
            //         var sdate = new Date();
            //         sdate.setDate(date.getDate() - 7);
            //         $('#startDate').datepicker("setDate", sdate);
            //         // console.log($( '#startDate' ).val());
            //         $('#endDate').datepicker("setDate", date);
            //         $('#period').hide();

            //     }
            //     if (dur == 'month') {
            //         var date = new Date();
            //         var m = date.getMonth();
            //         var y = date.getFullYear();
            //         var sdate = new Date(y, m, 1);
            //         var edate = new Date(y, m + 1, 0);
            //         // sdate.setDate( date.getDate(1));
            //         $('#startDate').datepicker("setDate", sdate);
            //         // console.log($( '#startDate' ).val());
            //         // edate.setDate( date.Month() + 1, );
            //         $('#endDate').datepicker("setDate", edate);
            //         $('#period').hide();

            //     }
            //     if (dur == 'custom') {
            //         $('#period').show();
            //     }
            // });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var oTable = $('#page').DataTable({
                processing: true,
                serverSide: true,

                ajax: {
                    url: "{{ route('admin.topics.filter') }}",
                    type: "POST",
                    data: function(d) {
                        d.lessonId = $('#lesson').val();
                        // d.startDate = $('#startDate').val();
                        // console.log(d.startDate);
                        // d.endDate = $('#endDate').val();
                    }
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'lesson.name',
                        name: 'lesson.name',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                order: [
                    [0, 'desc']
                ]
            });

            // $('.datepicker').on('change', function() {
            //     var from = $("#startDate").val();
            //     var to = $("#endDate").val();
            //     if(from && to) {
            //         oTable.draw();
            //     }
            // });
            $('#search-form').on('submit', function (e) {
                oTable.draw();
                e.preventDefault();
            });
        });


        // $(document).ready(function() {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $('#channel').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: "{{ route('admin.topics') }}",
        //         columns: [
        //             // { data: 'id', name: 'id' },
        //             {
        //                 data: 'DT_RowIndex',
        //                 name: 'DT_RowIndex',
        //                 orderable: false,
        //                 searchable: false
        //             },
        //             {
        //                 data: 'name',
        //                 name: 'name'
        //             },
        //             {
        //                 data: 'logo',
        //                 name: 'logo'
        //             },
        //             {
        //                 data: 'action',
        //                 name: 'action',
        //                 orderable: false
        //             },
        //         ],
        //         order: [
        //             [0, 'desc']
        //         ]
        //     });
        // });

        function add() {
            $('#PatientForm').trigger("reset");
            $('#PatientModal').html("Add patient");
            $('#patient-modal').modal('show');
            $('#id').val('');
        }

        function editFunc(pid) {
            // var id = pid;
            var currentUrl = document.URL;
            window.location.href = currentUrl + '/edit/' + pid;
        }

        function saveEditFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('pages/edit') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (res) {
                    $('#PatientModal').html("Edit Patient");
                    $('#patient-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#gender').val(res.gender);
                    if (res.gender == 'male') {
                        $("#genm").prop("checked", true);
                        $("#genm").click();
                    }
                    if (res.gender == 'female') {
                        $("#genf").prop("checked", true);
                        $("#genf").click();
                    }

                    $('#age').val(res.age);
                    $('#phone').val(res.phone);
                    $('#address').val(res.address);
                }
            });
        }

        function deleteFunc(id) {
            if (confirm("Delete Principal?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('pages/delete') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function (res) {
                        var oTable = $('#principal').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        }
        $('#PatientForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('patients/store')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#patient-modal").modal('hide');
                    var oTable = $('#patient').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    </script>

@endsection