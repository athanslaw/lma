    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">CM</a>  <a href="#">Crop Mart</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="{{ URL::asset('/logout') }}">logout</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
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
                    <li class="{{Request::is('myprofile') ? 'active':'' }}"><a href="{{ URL::asset('/myprofile') }}">My Profile</a></li>
                    <li class="{{Request::is('preference/make') ? 'active':'' }}"><a href="{{ URL::asset('/preference/make') }}">Register Preference</a></li>
                    <li class="{{Request::is('preference/view') ? 'active':'' }}"><a href="{{ URL::asset('/preference/view') }}">View Preference</a></li>
                    <!--<li class="{{Request::is('user/view') ? 'active':'' }}"><a href="{{ URL::asset('/user/view') }}">View Users</a></li>-->
                </ul>

            </div>

            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->
