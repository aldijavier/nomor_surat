@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Department</h1>
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
                        @if(count($depts)> 1)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($depts as $depts)
                                <tr>
                                    <td>{{$depts->id}}</td>
                                    <td>{{$depts->name}}</td>
                                    <td>{{$depts->code}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                        @else
                        <p>No data found</p>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection