@extends('layout.master')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card card-primary">
                                <form role="form">
                                    <div class="card-body">
                                        <div>ID : {{$doc->id}}</div>
                                        <div>Requestor : {{$doc->requestor}}</div>
                                        <div>Jenis Surat : {{$doc->doc_type}}</div>
                                        <div>Processing Date : {{$doc->req_date}}</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    </section>
</div>


@endsection