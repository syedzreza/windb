@extends('admin.dashboardtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
                @if (session('message'))
                <div class="text-primary card-header">
                    {{ session('message') }}
                </div>
                @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="row">
                <div class="col-md-7">
                  <div id="showdiv" style="display:none" class="text-success">

                  </div>
                  <div class="card-body">
                    @foreach ($info as  $info)
                    <form action="{{route('admin.editconfirm',['id'=>$info->id])}}" method="POST" enctype="multipart/form-data" id="main_form">
                      @csrf



                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$info->name}}">

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$info->email}}">

                      </div>



                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                       <textarea name="address" id="" cols="10" rows="2" class="form-control" name="address" >{{$info->address}}</textarea>

                      </div>

















                        @endforeach

                      </div>

                      <input type="submit" name="submit" value="submit" class="btn btn-primary" id="contactForm">




                    </form>

                  </div>
                  @foreach(explode(',', $info->file) as $infot)
                  <div class="" >
                      <form action="{{route('admin.imagesdelete',['id'=>$info->id])}}" method="post">
                          @csrf

                  <td> <img src="{{url('images/'.$infot)}}" alt="" height="80" width="80" >

                     <span><button >Delete</button></span>
                  </td>
              </form>

              </div>
              @endforeach
                </div>




              </div>




            </div>


          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




@endsection
