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
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Students</li>
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
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
              <div class="row">
                <div class="col-11"></div>
                <div class="col-1"><a href="{{ route('students.add')}}"><button type="button" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add</button></a></div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              {{-- <table id="memberListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll no</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table> --}}
              <table id="studentListTable" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Roll no</th>
                    <th scope="col">Email</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                  <tr>
                    <th>{{ $student->name }}</th>
                    <td>{{ $student->rollno }}</td>
                    <td>{{ $student->email }}</td>
                    <td><img src="../profiles/{{$student->photo }}" class="rounded-circle" width="30" height="30" /></td>
                    <td><a href="students/{{ $student->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                        {{-- <a href="students/{{ $student->id }}/delete" class="btn btn-danger btn-sm">Delete</a> --}}
                        <form method="POST" class="d-inline" action="students/{{$student->id}}/delete">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </td>
                  </tr>  
                  @endforeach
                  
                 
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
 </div>
</div>
@endsection