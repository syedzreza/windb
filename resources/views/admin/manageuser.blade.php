@extends('admin.dashboardtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lead Management</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @if(session('status'))
        <p class="login-box-msg bg-danger">{{session('status')}}</p>

        @endif
        <div class="row">

          <!-- ./col -->

          <!-- ./col -->

          <!-- ./col -->




          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">

                @if (session('message'))
             <div class="text-primary card-header">
                 {{ session('message') }}
             </div>
             @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>email</th>

                        <th>address</th>
                        <th>file</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($user as $user)
                      <div>
                        <tr>
                             <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td>{{$user->address}}</td>
                            @if($user->file)
                            @foreach(explode(',', $user->file) as $info)

                            <td> <img src="{{url('images/'.$info)}}" alt="" height="50" width="50"></td>
                            @endforeach

                            @endif
                                 <form action="{{route('admin.terminateuser',['id'=>$user->id])}}" method="post">
                                     @csrf
                              <td><button class="btn btn-success" type="submit">Delete</button></td>
                            </form>



                         <td><a href="{{route('admin.edit',['id'=>$user->id])}}">Edit</a></td>

                          </tr>
                    </div>

                    @endforeach
                    </tbody>
                    {{-- blade component used above and props see doccumentation --}}
                         {{-- Pagination --}}

                  </table>

            <!-- /.card-body -->
            </div>

          </section>


          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection
