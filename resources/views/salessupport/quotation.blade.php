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
                <form role="form">
                    <div class="card-body">

                        <table class="table">

                            <div class="form-group">
                                <label for="inputcompanyname">Nama Perusahaan</label>
                                <input type="company_name" class="form-control" id="inputcompanyname"
                                    placeholder="Input Nama Perusahaan">
                            </div>
                            <div class="form-group">
                                <label for="inputcompanyaddress">Alamat Perusahaan</label>
                                <input type="company_address" class="form-control" id="inputcompanyaddress"
                                    placeholder="Input Alamat Perusahaan">
                            </div>

                            <div class="form-group">
                                <label for="inputauthorized">Nama yang diberi wewenang</label>
                                <input type="auth_person" class="form-control" id="inputauthorized"
                                    placeholder="Input Nama diberi wewenang">
                            </div>

                            <div class="form-group">
                                <label for="inputservice">Layanan</label>
                                <input type="service" class="form-control" id="inputservice"
                                    placeholder="Pilih Layanan">
                            </div>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="inputsla">Service Level Agreement</label>
                                        <input type="sla" class="form-control" id="inputsla" placeholder="Input SLA">
                                    </div>
                                </td>

                                <td>

                                    <div class="form-group">
                                        <label for="inputrfs">RFS</label>
                                        <input type="date" class="form-control" id="inputrfs">
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Deskripsi Layanan</th>
                                    <th>Satuan</th>
                                    <th>QTY</th>
                                    <th>Harga(IDR)</th>
                                    <th>Sub Total (IDR)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control" placeholder="Layanan">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" placeholder="Satuan">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" placeholder="Qty">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" placeholder="Harga">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" placeholder="Subtotal">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col">
                                            <button class="btn btn-primary">Add</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
    </section>


</div>
@endsection