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
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="row">
                <div class="col-md-7">
                  <div id="showdiv" style="display:none" class="text-success">

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.addUserConfirm')}}" method="POST" enctype="multipart/form-data" id="main_form">
                      @csrf
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name" >
                        <span class="text-danger error-text name_error">        @error('name')
                          <div class="text-red-500 mt-2 text-sm">
                              {{ $message }}
                          </div>
                      @enderror</span>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" >
                        <span class="text-danger error-text email_error">    @error('email')
                          <div class="text-red-500 mt-2 text-sm">
                              {{ $message }}
                          </div>
                      @enderror</span>
                      </div>



                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                       <textarea name="address" id="" cols="10" rows="2" class="form-control" name="address" ></textarea>
                       <span class="text-danger error-text address_error">   @error('address')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror</span>
                      </div>


                      <div class="" id="dynamicAddRemove">

                        <br><div class="container">
                            <div class="row">
                            <div class="col-sm-4 imgUp">
                              <div class="imagePreview"></div>
                          <label class="btn btn-primary">
                 Upload<input type="file"  name="upload[]" class="uploadFile img" style="width: 0px;height: 0px;overflow: hidden;" multiple>
                                          </label>
                            </div><!-- col-2 -->
                            <i class="fa fa-plus imgAdd"></i>
                           </div><!-- row -->
                          </div><!-- container -->





                        </div>

                      </div>

                      <input type="submit" name="submit" value="submit" class="btn btn-primary" id="contactForm">




                    </form>

                  </div>

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



<script src="{{ url('/backend/update.js') }}"></script>
@endsection
