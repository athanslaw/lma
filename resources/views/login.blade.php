@extends('layouts.app')
@section('title','Secured Login')

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
@if(session('info'))
<div class="alert alert-info">
	{{session('info')}}
</div>
@elseif(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@elseif(session('failed'))
<div class="alert alert-danger">
	{{session('failed')}}
</div>
@endif

                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                        <p class="text-muted">Login to access the numerous packages in stock for you.</p>

                        <hr>


                        {!! Form::open(['url' => 'user/signin']) !!}
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::email('email','', ['class'=>'form-control', 'placeholder'=>'Enter Email', 'required'=>'required'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('password','Password')}}
                                {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password', 'required'=>'required'])}}
                            </div>
                            <div class="text-center">
								{!! Form::button('<i class="fa fa-sign-in" aria-hidden="true"></i> Log in', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
				<div class="col-md-2"></div>



            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

		@endsection
