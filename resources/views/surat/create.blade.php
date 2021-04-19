@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jenis Surat</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Form Nomor Surat</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form role="form" method="post" action="{{ route('surat') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group">
                                <label for="requestor">Requestor</label>
                                <input type="text" class="form-control" name="requestor"
                                    placeholder="Input Jenis Surat" autocomplete="off" value="{{Auth::user()->name}}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="doc_type">Jenis Surat</label>
                                <select class="form-control select2" name="doc_type" id="doc_type" aria-placeholder="Jenis Surat" required>
                                    @foreach($doccodes as $dc)
                                    <option value='{{$dc->code}}'>{{$dc->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="department">Departemen</label>
                                <select class="form-control select2" name="department" id="department" aria-placeholder="Departemen" required>
                                    @foreach($depts as $dept)
                                    <option value='{{$dept->code}}'>{{$dept->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="req_date">Processing Date</label>
                                <input type="date" class="form-control" name="req_date" required>
                            </div>

                            <div>
                                <label for="notes">Notes</label>
                                <input type="text-area" class="form-control" name="notes" autocomplete="off">
                            </div>


                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary float-right" type="submit" value="Submit">
                        <a class="btn btn-success" href="/surat/create"><i class="fas fa-sync"></i> Clear Data</a>
                    </div>
            </div>
    </section>


</div>
@endsection