@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Akun User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manajemen Akun User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form role="form" method="post" action="{{ route('proses_tambah') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }} <br/>
                            @endforeach
                        </div>
                        @endif
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Input Nama" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Input Email" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select name="level" class="form-control" required>
                                    <option value="">Pilih Level</option>
                                    <option value="Super Admin" {{ old('level') == "Super Admin" ? 'selected' : '' }}>Super Admin</option>
                                    <option value="Admin" {{ old('level') == "Admin" ? 'selected' : '' }}>Admin</option>
                                    <option value="User" {{ old('level') == "User" ? 'selected' : '' }}>User</option>
                                </select>
                            </div>

                            <!-- <div class="form-group">
                                <label for="department_id">Department</label>
                                <select class="form-control " name="department_id" required>
                                    <option value>Pilih Department</option>
                                    @foreach($department ?? '' as $department)
                                    <option value="{{ $department->id }}" {{ old('id') == "$department->id" ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select> 
                            </div> -->

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Input Password" autocomplete="off" id="myInput" required>
                                <br>
                                <!-- An element to toggle between password visibility -->
                                <input type="checkbox" onclick="myFunction()">Show Password
                            </div>
                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary float-right" type="submit" value="Submit">
                        <a class="btn btn-success" href="/tambah-data"><i class="fas fa-sync"></i> Clear Data</a>
                    </div>
            </div>
    </section>


</div>
@endsection

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>