    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">CM</a>  <a href="/">Crop Mart</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                    <li><a href="{{ URL::asset('/user/register') }}">Register</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => 'user/signin']) !!}
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::email('email','', ['class'=>'form-control', 'placeholder'=>'Enter Email', 'id'=>'email-modal'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('password','Password')}}
                                {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password', 'id'=>'password-modal'])}}
                            </div>
                            <div class="text-center">
								<i class="fa fa-user-md"></i>
								{{Form::submit('Log in', ['class'=>'btn btn-primary'])}}
                            </div>
                        {{ Form::close() }}

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="/user/register"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="/" data-animate-hover="bounce">
                    <img src="{{ URL::asset('assets/img/logo1.png') }}" alt="" class="hidden-xs">
                    <img src="{{ URL::asset('assets/img/logo1.png') }}" alt="LMA logo" class="visible-xs"><span class="sr-only">LMA - go to homepage</span>
                </a>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="{{Request::is('/') ? 'active':'' }}"><a href="{{ URL::asset('/') }}">Home</a></li>
                    <li class="{{Request::is('user/register') ? 'active':'' }}"><a href="{{ URL::asset('/user/register') }}">Signup</a></li>
                    <!--<li class="{{Request::is('user/view') ? 'active':'' }}"><a href="{{ URL::asset('/user/view') }}">View Users</a></li>-->
                </ul>

            </div>

            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->
