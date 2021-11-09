@extends('admin.logintheme')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Register</b>LTE</a>
        </div>
        <!-- /.login-logo -->

        <div class="card">

            <div class="card-body login-card-body">
                <div id="showdiv" style="display:none" class="text-success">

                </div>
                <br>
                <div id="content-login">
                <form action="{{route('admin.registeradmin')}}"  method="post" id="main_form">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="name" name="name" >
                        <div class="input-group-append">
                            <span class="text-danger error-text name_error">        @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror</span>
                        </div>

                    </div>


                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="email" name="email">
                        <div class="input-group-append">
                            <span class="text-danger error-text email_error">        @error('email')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror</span>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password is 'password' " name="password">
                        <div class="input-group-append">
                            <span class="text-danger error-text password_error">        @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror</span>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" class="btn btn-primary btn-block" value="Register">
                        </div>
                        <!-- /.col -->

                    </div>
                </form>
                </div>




            </div>
            <!-- /.login-card-body -->
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </div>
    <script src="{{ url('/backend/register.js') }}"></script>
@endsection
