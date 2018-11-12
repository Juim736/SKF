@extends('login::layouts.master')

@section('main-content')
    <div class="">
	   <section class="signup">
            <div class="container">
            	{!! Session::has('success') ? '<div class="alert alert-success alert-dismissible"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("success") .'</div>' : '' !!}
    				 {!! Session::has('error') ? '<div class="alert alert-danger alert-dismissible"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("error") .'</div>' : '' !!}
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        {{ Form::open(['url' => 'login/signup', 'method' => 'post', 'id' => 'sign_up_form', 'class' => 'register-form'])}}
                            {{ csrf_field()}}

                            @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" style="color: red;display:block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                {{ Form::text('first_name','',['id' => 'first_name', 'placeholder' => 'Enter Your First Name', 'required']) }}
                            </div>
                            @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" style="color: red;display:block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                             @endif
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                {{ Form::text('last_name','',['id' => 'last_name', 'placeholder' => 'Enter Your Last Name', 'required']) }}
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="color: red;display:block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                {{ Form::email('email','',['id' => 'email', 'placeholder' => 'Enter Your  Email', 'required']) }}
                                <span id="email_err"></span>
                            </div>
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="color: red;display:block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                {{ Form::password('password',['class' => '' ,'id' => 'password', 'placeholder' => 'Enter your Password', 'required']) }}
                                <span id="pass_err"></span>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" style="color: red;display:block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                {{ Form::password('password_confirmation',['class' => '' ,'id' => 'password_confirmation', 'placeholder' => 'Repeat your password' , 'required']) }}
                                <span id="con_pass_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"  required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                {{ Form::submit('Sign Up !', ['id' => 'signup', 'class' => 'form-submit']) }}
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('/assets/login/')}}/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{url('/login')}}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection
    
    @section('footer_script')
    <script>
        $(document).ready(function(){

            $("#email").keyup(function(){
            var email = $("#email").val();
            if(email != 0) {
              if(isValidEmailAddress(email)) {
                       $('#email_err').html(''); 
                    }else {
                        $('#email_err').html('<p style="color:red">Enter a valid Email Address</p>');
                    }
                }
            });

        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }
           
            $('#password').on('keyup',function(){
                var password = $(this).val();
                if(password.length < 18 && password.length > 5){
                    $('#pass_err').html('');
                }else{
                    $('#pass_err').html('<p style="color:red">Password should be 6 to 18 chracter</p>');
                }
                var con_pass = $('#password_confirmation').val();
                if(con_pass != ''){
                    if(password === con_pass){
                        $('#con_pass_err').html('');
                    }else{
                        $('#con_pass_err').html('<p style="color:red">Password Does not Match</p>');
                    }
                }
            });
            $('#password_confirmation').on('keyup',function(){
                var con_pass = $(this).val();
                var pass     = $('#password').val();
                if(pass === con_pass){
                    $('#con_pass_err').html('');
                }else{
                    $('#con_pass_err').html('<p style="color:red">Password Does not Match</p>');
                }
            })
            $('#sign_up_form').validate({
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2,
                    },
                    last_name: {
                        required: true,
                        minlength: 2,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 18,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 6,
                        maxlength: 18,
                        equalTo : '#password'
                    }
                },
                messages: {
                    first_name: {
                        required : "First Name is required",
                        minlength : "First Name at least 2 Chracter",
                    },
                    last_name: {
                        required : "Last Name is required",
                        minlength : "Last Name at least 2 Chracter",
                    },
                    email: {
                        required : "Email is required",
                        email : "Enter a valid email",
                    },
                    password : {
                        required : "Password is required",
                        minlength : "Password at least 6 Chracter",
                        maxlength : "Password at not above 18 Chracter",
                    },
                    password_confirmation : {
                        required : "Confirm Password is required",
                        minlength : "Confirm Password at least 6 Chracter",
                        maxlength : "Confirm Password at not above 18 Chracter",
                        equalTo : "Password Doen't match ,Please enter the same password as above",
                    }
                }
            });
        });
    </script>

    @endsection