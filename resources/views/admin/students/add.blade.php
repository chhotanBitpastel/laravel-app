@extends('admin.main-layout')

@section('content-header')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Students</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('students.list')}}">Students</a></li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('body')
<div class="row">
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Student</h3>
            </div>
            <!-- /.card-header -->
            @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
              </div>
            @endif
            <!-- form start -->
            <form method="POST" action="{{ route('students.store') }}" id="addStudentForm" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                <div class="form-group">
                    <label for="studentName">Name</label>
                    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Enter Name" value="{{ old('studentName')}}">
                    <span class="text-danger">
                       @error('studentName')
                           {{$message}}
                       @enderror
                    </span>  
                </div>

                <div class="form-group">
                    <label for="rollnumber">Roll Number</label>
                    <input type="text" class="form-control" id="rollnumber" name="rollnumber" placeholder="Enter roll number" value="{{ old('rollnumber')}}">
                    <span class="text-danger">
                       @error('rollnumber')
                           {{$message}}
                       @enderror
                    </span>  
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Contact Number" value="{{ old('email')}}">
                    <span class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                     </span>  
                </div>
                <div class="form-group">
                  <label for="photo">Photo</label>
                  <input type="file" class="form-control" id="photo" name="photo" >
                  <span class="text-danger">
                      @error('photo')
                          {{$message}}
                      @enderror
                   </span>  
              </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            
            <!-- /.card -->

            <!-- Input addon -->
            <!-- /.card -->
            <!-- Horizontal Form -->
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection