@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <section class="content">
                <div class="container-fluid">
                <br>
                    <h5 class="mb-2">Info Box</h5>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Messages</span>
                                    <h3>{!! $count ?? '' !!}</h3>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
@endsection