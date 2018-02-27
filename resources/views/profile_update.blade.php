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

                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="box">
                        <h1>Update Profile</h1>

                        <hr>

                        {!! Form::open(['url' => '/profile/edit']) !!}
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::label('fname','First Name')}}
                                {{Form::text('fname',$data['fname'], ['class'=>'form-control', 'placeholder'=>'Enter First Name', 'required'=>'required'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('lname','Last Name')}}
                                {{Form::text('lname',$data['lname'], ['class'=>'form-control', 'placeholder'=>'Enter Last Name', 'required'=>'required'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('mname','Middle Name')}}
                                {{Form::text('mname',$data['mname'], ['class'=>'form-control', 'placeholder'=>'Enter Middle Name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('phone','Phone Number')}}
                                {{Form::tel('phone',$data['phone'], ['class'=>'form-control', 'placeholder'=>'Enter Phone'])}}
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::label('state','State')}}
                                 <select name="state" id="state" class="form-control" onchange="this.form.submit()">
                                   <option value>Select State</option>
                                 @foreach($stateoforigin as $state)
                                  <option value="{{$state->code}}" {{$state->code == $data['state']? 'selected':''}}>{{ $state->state}}</option>
                                  @endforeach
                                 </select>
                            </div>


                            <div class="form-group">
                              {{Form::label('lga','LGA')}}
                               <select name="lga" id="lga" class="form-control">
                                 <option value>Select LGA</option>
                               @foreach($lga as $lgas)
                                <option value="{{ $lgas->code}}" {{$lgas->code == $data['lga']? 'selected':''}}>{{ $lgas->lga}}</option>
                                @endforeach
                               </select>

                            </div>
                            <div class="form-group">
                                {{Form::label('address','Address')}}
                                {{Form::textarea('address',$data['address'], ['class'=>'form-control', 'placeholder'=>'Enter Address', 'rows'=>'2'])}}
                            </div>
                            <div class="text-center">
							{{Form::hidden('send','')}}
							<input type="submit" name="send" value="Save" class="btn btn-primary form-control">
                            </div>
                          </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>



            </div><div class="col-md-2"></div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

		@endsection
