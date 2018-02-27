@extends('layouts.app')
@section('title','User Signup')

<div id="all">
@section('content')

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="/">Home</a>

                        </li>
                        <li>New account / Sign in</li>
                    </ul>

                </div>
@if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
@if(session('failed'))
<div class="alert alert-danger">
	{{session('failed')}}
</div>
@endif

                <div class="col-md-8">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us, you will be able to view available products and make order for a matching product. You will also get regular alerts when matching products are available!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>


                        {!! Form::open(['url' => 'user/signup']) !!}
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                                {{Form::label('fname','Name')}}
                                {{Form::text('fname',$data['fname'], ['class'=>'form-control', 'placeholder'=>'Enter your name', 'required'=>'required'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::email('email',$data['email'], ['class'=>'form-control', 'placeholder'=>'Enter Email', 'required'=>'required'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('phone','Phone Number')}}
                                {{Form::tel('phone',$data['phone'], ['class'=>'form-control', 'placeholder'=>'Enter Phone'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('password','Password')}}
                                {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password', 'required'=>'required'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('confirmpassword','Confirm Password')}}
                                {{Form::password('confirmpassword', ['class'=>'form-control', 'placeholder'=>'Re-enter Password', 'required'=>'required'])}}
                            </div>
                            <div class="text-center">
								{!! Form::button('<i class="fa fa-user-md" aria-hidden="true"></i> Register', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
                            </div>
                          </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                        <p class="text-muted">Login to access the numerous packages in stock for you.</p>

                        <hr>


                        {!! Form::open(['url' => 'user/signin']) !!}
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::email('email','', ['class'=>'form-control', 'placeholder'=>'Enter Email'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('password','Password')}}
                                {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password'])}}
                            </div>
                            <div class="text-center">
								{!! Form::button('<i class="fa fa-sign-in" aria-hidden="true"></i> Log in', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>



            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

		@endsection
