@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Audit Log</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Audit Log</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <button type="button" class="btn btn-primary" id="btnExportExcel" data-toggle="modal" data-target="#myModalExport" data-backdrop="static" data-keyboard="false">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    <span class="nav-text">
                        Export to Excel with date
                    </span>
                </button>
            </div>
            <div class="modal fade" id="myModalExport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><b>Export to Excel</b>
                            <button type="button" class="close" data-dismiss="modal" onclick="resetExport()" aria-label="Close">
                                <span aria-hidden="true" style="color:black"><i class="fa fa-times"></i></span>
                            </button>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/tickets/exportreturn')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label>From</label>
                                    <input type="date" id="date_start" name="date_start" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Until</label>
                                    <input type="date" id="date_finish" name="date_finish" class="form-control">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnResetModalExport" class="btn btn-primary"><i class="fa fa-refresh"></i> Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-file-text"></i> Export Now</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            <br>
                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table table-bordered table-striped example4">
                            <thead>
                                <tr class="bg-light">
                                    <th>No.</th>
                                    <th>Email</th>
                                    <th>Ip Address</th>
                                    <th>Access From</th>
                                    <th>Activity</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                @foreach($data_pengguna as $pengguna)
                                <?php $no++ ;?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$pengguna->username}}</td>
                                    <td>{{$pengguna->ip_address}}</td>
                                    <td>{{$pengguna->access_from}}</td>
                                    <td>{{$pengguna->activity}}</td>
                                    <td>{{$pengguna->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </section>
    <br>


@endsection