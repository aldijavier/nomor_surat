@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manajemen Dept User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dept User</li>
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
                    <a href="/tambah-data-deptuser" type="button" class="btn btn-secondary">
                        <i class="fas fa-plus-square"></i>
                        Add Dept User
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
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1 @endphp
                                @foreach($dept_user as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->user_name }}</td>
                                    <td>{{ $d->department_name }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-editbio-{{ $d->id }}"
                                            data-doc_type="" data-req_date>
                                            <span class="fas fa-pencil-alt"></span>
                                        </a> 
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-{{ $d->id }}"
                                            data-doc_type="" data-req_date>
                                            <span class="far fa-trash-alt"></span>
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

    @foreach($dept_user as $d)
    <div class="modal fade" id="modal-editbio-{{ $d->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3> Edit Data </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('update-proses-deptuser/'.$d->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('patch')
                     <div class="form-group">
                        <label for="level">Nama</label>
                        <select name="user_id" class="form-control">
                            <option value="" disabled>Pilih Nama</option>
                            <option value="{{ $d->user_id }}">{{ $d->user_name }}</option>
                            
                            @foreach($user ?? '' as $users)
                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="level">Department</label>
                        <select name="department_id" class="form-control">
                            <option value="" disabled>Pilih Department</option>
                            <option value="{{ $d->department_id }}">{{ $d->department_name }}</option>
                            
                            @foreach($department ?? '' as $deps)
                            <option value="{{ $deps->id }}">{{ $deps->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
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

@foreach($dept_user as $d)
    <div class="modal fade" id="modal-hapus-{{ $d->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4>Anda yakin untuk menghapus data ini?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                
                    <form action="{{url('hapus-data-deptuser/'.$d->id)}}" method="get">
                        <button type="submit" class="close btn btn-default float-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection