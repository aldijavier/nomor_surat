@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manajemen Akun User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Akun User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <a href="{{ route('tambah_user') }}" type="button" class="btn btn-secondary">
                        <i class="fas fa-plus-square"></i>
                        Add User Account
                    </a>
                </div>
            </div>
            <br>
                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table table-bordered table-striped example4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <!-- <th>Department</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>{{$d->level}}</td>
                                    <!-- <td>{{$d->department_name}}</td> -->
                                    <td>
                                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-editbio-{{ $d->id }}"
                                            data-doc_type="" data-req_date>
                                            <span class="fas fa-pencil-alt"></span>
                                        </a>
                                        <!-- <a class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-editpassword-{{ $d->id }}"
                                            data-doc_type="" data-req_date>
                                            <span class="fas fa-lock"></span>
                                        </a>     -->
                                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-detail-{{ $d->id }}"
                                            data-doc_type="" data-req_date>
                                            <span class="fas fa-info"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </section>
    <br>

    @foreach($user as $data)
    <div class="modal fade" id="modal-editbio-{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3> Edit Data </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <form action="{{url('update-proses/'.$data->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" value="{{ $data->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{ $data->email }}">
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control">
                            <option value="" disabled>Pilih Level</option>
                            <option value="{{ $data->level }}">{{ $data->level }} </option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    

                    <!-- <div class="form-group">
                        <label for="level">Department</label>
                        <select name="department_id" class="form-control">
                            <option value="" disabled>Pilih Department</option>
                            <option value="{{ $data->department_id }}">{{ $data->department_name }}</option>
                            
                            @foreach($department ?? '' as $deps)
                            <option value="{{ $deps->id }}">{{ $deps->name }}</option>
                            @endforeach
                        </select>
                    </div> -->
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($user as $data)
    <div class="modal fade" id="modal-editpassword-{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3> Update Password </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('update-proses-password/'.$data->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{ $data->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password"
                        placeholder="Input Password" autocomplete="off" required>    
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

        @foreach($user as $data)
    <div class="modal fade" id="modal-detail-{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3> Detail Data </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form action="{{route('surat.show', 'id')}}" method="get"> -->
                        <table class="table table-bordered no-margin">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    <td>{{$data->level}}</td>
                                </tr>
                                <!-- <tr>
                                    <th>Department</th>
                                    <td>{{$data->department_name}}</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection