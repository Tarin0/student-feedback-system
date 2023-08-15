@include('partials/header')

<section class="container">
    @if (session()->get('changeSuccess') == 1)
        <div class="col-md-6 mx-auto p-3 alert alert-success text-center mb-3">
            <span>Successfully changed admin password.</span>
        </div>
    @elseif(session()->get('changeSuccess') == -1)
        <div class="col-md-6 mx-auto p-3 alert alert-danger text-center mb-3">
            <span>Failed to change admin password! Wrong old password.</span>
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            <h5>Admin Panel</h5>
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-success disabled">Admin</button>
        </div>
    </div>
    {{-- students table --}}
    <div id="sdata" class="my-shadow my-3">
        <div class="card-header light-bg-purple p-3">
            <b>Students list</b>
        </div>
        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped my-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Student ID</th>
                            <th>Full name</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Email</th>
                            <th>Reg. date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$student->std_id}}</td>
                                <td>{{$student->fullName}}</td>
                                <td>{{$student->dept}}</td>
                                <td>{{$student->semester}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->regDate}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="/deleteUser?type=student&id={{$student->std_id}}">Delete user</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- teachers table --}}
    <div id="tdata" class="my-shadow mb-3">
        <div class="card-header p-3 light-bg-green">
            <b>Teachers list</b>
        </div>
        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped my-0">
                    <thead class="table-danger">
                        <tr>
                            <th>Teacher ID</th>
                            <th>Full name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Reg. date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->t_id}}</td>
                                <td>{{$teacher->fullName}}</td>
                                <td>{{$teacher->dept}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->regDate}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="/deleteUser?type=teacher&id={{$teacher->t_id}}">Delete user</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- feedback table --}}
    <div id="fdata" class="my-shadow mb-3">
        <div class="card-header p-3 light-bg">
            <b>Feedback data</b>
        </div>
        <div class="card-body p-2">
            <div class="row">
                <div class="col-md-4 col-mb">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered my-0">
                            <thead class="table-success">
                                <tr>
                                    <th>Serial</th>
                                    <th>Aspects of evaluation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Q1</th>
                                    <td>How much you are satisfied with your teacher performance?</td>
                                </tr>
                                <tr>
                                    <th>Q2</th>
                                    <td>I had enough prior knowledge to be able to follow the course.</td>
                                </tr>
                                <tr>
                                    <th>Q3</th>
                                    <td>The course outcomes in course plan clearly describe what I should expect from the course.</td>
                                </tr>
                                <tr>
                                    <th>Q4</th>
                                    <td>The course teacher followed course outline properly to deliver expected outcomes from the course.</td>
                                </tr>
                                <tr>
                                    <th>Q5</th>
                                    <td>The course teacher provided necessary course materials when needed.</td>
                                </tr>
                                <tr>
                                    <th>Q6</th>
                                    <td>How effective was the teaching method of the course overall?</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="applyShadow text-center bg-light">
                        <span>Total feedback of </span>
                        <button class="btn btn-sm btn-warning">{{count($feedbacks)}} student(s)</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped my-0">
                            <thead class="table-success">
                                <tr>
                                    <th>Teacher ID</th>
                                    @for ($i = 1; $i <= 6; $i++)
                                        <th>Q{{$i}}</th>
                                    @endfor
                                    <th>Student ID</th>
                                    <th>Submission date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $feedback)
                                    <tr>
                                        <td>{{$feedback->t_id}}</td>
                                        <td>{{$feedback->q1}} <i class="bi bi-star-fill"></i></td>
                                        <td>{{$feedback->q2}} <i class="bi bi-star-fill"></i></td>
                                        <td>{{$feedback->q3}} <i class="bi bi-star-fill"></i></td>
                                        <td>{{$feedback->q4}} <i class="bi bi-star-fill"></i></td>
                                        <td>{{$feedback->q5}} <i class="bi bi-star-fill"></i></td>
                                        <td>{{$feedback->q6}} <i class="bi bi-star-fill"></i></td>
                                        <td>{{$feedback->std_id}}</td>
                                        <td>{{$feedback->submissionDate}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" href="/deleteData?id={{$feedback->f_id}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- change password --}}
    <div class="my-shadow col-md-5 mx-auto">
        <div class="card-header p-3 light-bg-red">
            <b>Change admin password</b>
        </div>
        <div class="card-body p-3">
            <form action={{url("/changeAdminPass")}} method="post">
                @csrf
                <div class="mb-3">
                    <label for="oldPass" class="form-label">Enter old password</label>
                    <input type="password" name="oldPass" required class="form-control" id="oldPass">
                </div>
                <div class="mb-3">
                    <label for="newPass" class="form-label">Enter new password</label>
                    <input type="password" name="newPass" required class="form-control" id="newPass">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger">Change</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- for hiding noti -->
<script>
    $().ready(function () {
      $("div.alert").delay(5000);
      $("div.alert").hide(2000);
    });
</script>

@include('partials/footer')