@extends('admin.logintheme')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->

        <div class="card">
            <div id="rodeo">
                <a href="{{route('admin.login')}}"  id="showlogin">Login</a>
                <a href="{{route('admin.register')}}" id="showregister">Register</a>
            </div>
            <div class="card-body login-card-body">
                @if(session('status'))
                    <p class="login-box-msg bg-danger">{{session('status')}}</p>
                @endif
                <br>
                <div id="content-login">
                <form action="{{route('admin.login')}}" method="post" id="login">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="" name="username" value="">
                        <div class="input-group-append">
                      <span class="input-group-text bg-danger">
                        @error('username')
                        <i class="mdi mdi-check-circle-outline">{{ $message }}</i>
                        @enderror
                      </span>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="">
                        <div class="input-group-append">
                      <span class="input-group-text bg-danger">
                        @error('password')
                        <i class="mdi mdi-check-circle-outline">{{ $message }}</i>
                        @enderror
                      </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" class="btn btn-primary btn-block" value="log in">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                </div>


            
                
                    </div>

                <!-- /.social-auth-links -->

              

            </div>
            <!-- /.login-card-body -->
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </div>
<script>
    $(document).ready(function(){
        var clogin = $("#content-login");
  var cregister = $("#content-register");
  $("#showlogin").on("click", function(e){
 

    $(clogin).css("display", "block");

    $("#showregister").on("click", function(e){
  

    $(cregister).css("display", "block");

  });
    });
    });
</script>
@endsection
