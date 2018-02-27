@extends('layouts.app')

@section('title','Form')
<div id="all">
@section('content')
	  
	  {!! Form::open(['url' => 'registration/submit']) !!}
	  <div class="form-group">
			{{Form::label('username','Username')}}
			{{Form::text('username','', ['class'=>'form-control', 'placeholder'=>'Enter Username'])}}
			<br/>
			{{ Form::text('email', 'example@gmail.com') }}
            <br/>
     
			{{ Form::password('password') }}
            <br/>
            
            {{Form::checkbox('name', 'value') }}
            <br/>
            
            {{ Form::radio('name', 'value') }}
            <br/>
            
			{{Form::label('message','Message')}}
            {{Form::textarea('message', '', ['class'=>'form-control', 'placeholder'=>'Enter Message']) }}
            <br/>
			
            {{Form::file('image') }}
            <br/>
            
            {{Form::select('size', array('L' => 'Large', 'S' => 'Small')) }}
            <br/>
            
            {{Form::submit('Click Me!')}}
			</div>
			{{ Form::close() }}
   @endsection

