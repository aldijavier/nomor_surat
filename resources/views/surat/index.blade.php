@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nomor Surat</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Nomor Surat</li>
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
                    
                    <a href="/surat/create" type="button" class="btn btn-secondary"><i class="fas fa-plus-square"></i>
                        Generate New Document
                    </a>
                </div>
            </div>
            <br>
                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table table-bordered table-striped example4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal Proses</th>
                                    <th>Departemen</th>
                                    <th>Nomor Surat</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php $no = 1 @endphp
                                @foreach($docs as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->doc_type}}</td>
                                    <td>{{$d->req_date}}</td>
                                    <td>{{$d->department}}</td>
                                    <td>{{$d->no_surat}}</td>
                                    <td>
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

    @foreach($docs as $data)
    <div class="modal fade" id="modal-detail-{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form action="{{route('surat.show', 'id')}}" method="get"> -->
                        <table class="table table-bordered no-margin">
                            <tbody>
                                <tr>
                                    <th>No. Dokumen</th>
                                    <td>{{$data->no_surat}}</td>
                                </tr>
                                <tr>
                                    <th>Requestor</th>
                                    <td>{{$data->requestor}}</td>
                                </tr>
                                <tr>
                                    <th>Departemen</th>
                                    <td>{{$data->department}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Request</th>
                                    <td>{{$data->req_date}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Dokumen</th>
                                    <td>{{$data->doc_type}}</td>
                                </tr>
                                <tr>
                                    <th>Notes</th>
                                    <td>{{$data->notes}}</td>
                                </tr>
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
