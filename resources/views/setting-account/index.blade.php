@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="mx-auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Setting Akun</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Setting Akun</li>
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
                    
                </div>
            </div>
            <br>
                <div class="card card-primary">
                    <div class="card-body">
                    @foreach($user as $data)
                    <form action="{{url('update-proses-akunpassword/'.$data->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('patch')
                <div class="card-body">
                  <div class="form-group row">
                  <hr/>
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                    </div>
                  </div>
        
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ubah Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="myInput" name="password" placeholder="Password">
                      <br>
                      <!-- An element to toggle between password visibility -->
                      <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>
                    
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
                <!-- /.card-footer -->
              </form>
            <!-- /.card -->
            @endforeach
                    </div>
                </div>
        </div>
    </section>
    <br>


@endsection

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>