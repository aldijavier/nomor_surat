@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quotation</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quotation Form</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form role="form" method="post" action="{{ route('depts') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Departemen</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Input Nama Departmen">
                            </div>
                            <div class="form-group">
                                <label for="code">Kode Departemen</label>
                                <input type="code" class="form-control" name="code"
                                    placeholder="Input Kode Departmen">
                            </div>                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
    </section>


</div>
@endsection