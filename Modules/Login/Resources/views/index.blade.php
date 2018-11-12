@extends('login::layouts.master')

@section('main-content')
    <div class="main-content">
        <section class="sign-in">
            <div class="container">
                {!! Session::has('success') ? '<div class="alert alert-success alert-dismissible"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("success") .'</div>' : '' !!}
                     {!! Session::has('error') ? '<div class="alert alert-danger alert-dismissible"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("error") .'</div>' : '' !!}

                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('/assets/login/')}}/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{url('login/registration')}}" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        {{ Form::open(['url' => 'login/signin', 'method' => 'post', 'id' => 'login-form', 'class' => 'register-form'])}}
                        {{ csrf_field()}}
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               {{ Form::email('email','',['id' => 'email', 'placeholder' => 'Enter Your Email', 'required' ]) }}
                               <span id="email_err"></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                {{ Form::password('password',['class' => '' ,'id' => 'password', 'placeholder' => 'Enter your Password' ,'required']) }}
                                <span id="pass_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                {{ Form::submit('Sign In !', ['id' => 'signin', 'class' => 'form-submit']) }}
                            </div>
                        {{ Form::close() }}
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer_script')

    <script type="text/javascript">
        $(document).ready(function() {
            
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
            });
           
            $('#login-form').validate({
                rules:{
                    email:{
                        required: true,
                        email : true
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 18
                    }
                },
                messages: {
                    email: {
                        required : "Email  Address is required",
                        email : "Enter a valid Email Address",
                    },
                    password:{
                        required : "Password is required",
                        minlength : "Password at least 6 chracter",
                        maxlength : "Password not above 18 chracter"
                    }
                }
            });
        });
    </script>


    @endsection

