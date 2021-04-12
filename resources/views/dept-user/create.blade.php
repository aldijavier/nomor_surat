@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Dept User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manajemen Dept User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form role="form" method="POST" action="/tambah/proses-deptuser" enctype="multipart/form-data">
                {{ csrf_field() }}

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
                                <label for="user_id">Nama</label>
                                <select class="form-control " name="user_id" required>
                                    <option value>Pilih Nama</option>
                                    @foreach($user ?? '' as $user)
                                    <option value="{{ $user->id }}" {{ old('id') == "$user->id" ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select> 
                            </div>
                            

                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select class="form-control " name="department_id" required>
                                    <option value>Pilih Department</option>
                                    @foreach($department ?? '' as $department)
                                    <option value="{{ $department->id }}" {{ old('id') == "$department->id" ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select> 
                            </div>

                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary float-right" type="submit" value="Submit">
                        <a class="btn btn-success" href="/tambah-data-deptuser"><i class="fas fa-sync"></i> Clear Data</a>
                    </div>
            </div>
    </section>


</div>
@endsection
