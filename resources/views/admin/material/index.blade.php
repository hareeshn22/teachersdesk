@extends('layouts.admin')

@section ('title') Materials @endsection

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
                    <h3>Materials</h3>
                </div>
                <!-- <div class="col-6">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                                            <li class="breadcrumb-item">Materials</li>
                                            <li class="breadcrumb-item active">Materials List</li>
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


                                <div class="col-lg-3 mt-2">
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

                                <div class="col-lg-3 mt-2">
                                    <div class="form-group">
                                        <label for="school">
                                            Class</label>
                                        <select id="class" name="courseid" class="select2 custom-select form-control"
                                            required>
                                            <option value="" disabled selected> Select Class</option>
                                            {{--@foreach ($courses as $course)
                                            <option value="{{ $course->id }}" {{ old('courseid')==$course->id ? 'Selected' :
                                                '' }}> {{ $course->name }}
                                            </option>
                                            @endforeach--}}

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mt-2">
                                    <div class="form-group">
                                        <label for="school">
                                            Subject</label>
                                        <select id="subject" name="subjectid" class="select2 custom-select form-control"
                                            required>
                                            <option value="" disabled selected> Select Subject</option>
                                            {{--@foreach ($courses as $course)
                                            <option value="{{ $course->id }}" {{ old('courseid')==$course->id ? 'Selected' :
                                                '' }}> {{ $course->name }}
                                            </option>
                                            @endforeach--}}

                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-3 mt-2">
                                    <div class="form-group">
                                        <label for="school">
                                            Lesson </label>
                                        <select id="lesson" name="lessonid" class="select2 custom-select form-control"
                                            required>
                                            <option value="" disabled selected> Select Lesson</option>
                                            @foreach ($lessons as $lesson)
                                                <option value="{{ $lesson->id }}" {{ old('lessonid') == $lesson->id ? 'Selected' : '' }}> {{ $lesson->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mt-2">
                                    <div class="form-group">
                                        <label for="topic">
                                            Topic </label>
                                        <select id="topic" name="topicid" class="select2 custom-select form-control"
                                            required>
                                            <option value="" disabled selected> Select Topic</option>
                                            <!-- @foreach ($lessons as $lesson)
                                                <option value="{{ $lesson->id }}" {{ old('lessonid') == $lesson->id ? 'Selected' : '' }}> {{ $lesson->name }}
                                                </option>
                                            @endforeach -->

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-2">
                                    <div class="form-group">
                                        <label for="subtopic">
                                            SubTopic </label>
                                        <select id="subtopic" name="subtopicid" class="select2 custom-select form-control"
                                            required>
                                            <option value="" disabled selected> Select SubTopic</option>
                                            <!-- @foreach ($lessons as $lesson)
                                                <option value="{{ $lesson->id }}" {{ old('lessonid') == $lesson->id ? 'Selected' : '' }}> {{ $lesson->name }}
                                                </option>
                                            @endforeach -->

                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="duration"> Time Duration </label>
                                                            <select id="duration" name="duration" class="select2 custom-select form-control"
                                                                required>
                                                                <option value="today"> Today </option>
                                                                <option value="week"> This Week </option>
                                                                <option value="month"> This Month </option>
                                                                <option value="custom"> Custom Dates </option>
                                                            </select>
                                                        </div>
                                                    </div> -->

                                <!-- <div id="period" class="col-lg-6 row" style="display: none">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="startdate"> Date From </label>
                                                                <input id="startDate" type="text" name="startdate"
                                                                    class="form-control datepicker" data-provide="datepicker"
                                                                    data-date-format="dd M, yyyy" value="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="enddate"> Date To</label>
                                                                <input id="endDate" type="text" name="enddate" class="form-control datepicker"
                                                                    data-provide="datepicker" data-date-format="dd M, yyyy" value="" required>
                                                            </div>
                                                        </div>
                                                    </div> -->

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
                        <!-- <span>DataTables has most features enabled by default, so all you
                                                need to do to use it with your own tables is to call the construction
                                                function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness
                                                will be immediately added to the table, as shown in this example.</span> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-centered datatable dt-responsive nowrap" id="material">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th class="text-center" style="width: 50px;"></th>
                                        <th>Name</th>
                                        <!-- <th>Logo</th> -->
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

            // On Lesson Change
            $('#topic').on('change', function (e) {
                var cid = e.target.value;
                console.log(cid);
                if (cid != '') {
                    $.ajax({
                        url: "{{ route('admin.topics.filtersub') }}",
                        type: "POST",
                        data: {
                            sid: cid
                        },
                        success: function (data) {
                            $('#subtopic').empty();
                            $('#subtopic').append('<option value="" disabled selected> Select SubTopic</option>');
                            $.each(data, function (index, course) {
                                $('#subtopic').append('<option value="' + course.id + '">' + course.name + '</option>');
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



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var oTable = $('#material').DataTable({
                processing: true,
                serverSide: true,

                ajax: {
                    url: "{{ route('admin.materials.filter') }}",
                    type: "POST",
                    data: function (d) {
                        d.schoolId = $('#school').val();
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
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
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
        //         ajax: "",
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

        function editFunc(id) {
            // var id = pid;
            var currentUrl = document.URL;
            window.location.href = currentUrl + '/edit/' + id;
        }


        // function editSaveFunc(id) {
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ url('materials/edit') }}",
        //         data: {
        //             id: id
        //         },
        //         dataType: 'json',
        //         success: function(res) {
        //             $('#PatientModal').html("Edit Patient");
        //             $('#patient-modal').modal('show');
        //             $('#id').val(res.id);
        //             $('#name').val(res.name);
        //             $('#gender').val(res.gender);
        //             if (res.gender == 'male') {
        //                 $("#genm").prop("checked", true);
        //                 $("#genm").click();
        //             }
        //             if (res.gender == 'female') {
        //                 $("#genf").prop("checked", true);
        //                 $("#genf").click();
        //             }

        //             $('#age').val(res.age);
        //             $('#phone').val(res.phone);
        //             $('#address').val(res.address);
        //         }
        //     });
        // }

        function deleteFunc(id) {
            if (confirm("Delete material?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "GET",
                    url: document.URL + '/delete/' + id,
                    // data: {
                    //     id: id
                    // },
                    dataType: 'json',
                    success: function (res) {
                        var oTable = $('#material').dataTable();
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