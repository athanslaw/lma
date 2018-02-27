@extends('layouts.app')
@section('title','Make Preference')

<div id="all">
@section('content')

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="/">Home</a>

                        </li>
                        <li>Register Preference</li>
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

                <div class="col-md-12">
                    <div class="box">
                        <h1>Register Preference</h1>

                        <p class="lead">Enter your product preference and delivery option.</p>

                        <hr>


                        {!! Form::open(['url' => 'preference/submitpreference']) !!}
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
							  {{Form::hidden('product_type','Grains')}}
                              {{Form::label('product_id','Product')}}
                               <select name="product_id" id="product_id" class="form-control">
                                 <option value>Select Product</option>
                               @foreach($products as $product)
                                <option value="{{ $product->product_id}}" {{$product->product_id == $data['product_id']? 'selected':''}}>{{ $product->product_name}}</option>
                                @endforeach
                               </select>
                            </div>
							
                            <div class="form-group">
                                {{Form::label('lot_size','Lot Size')}} <i>in Metric Tonnes (MT)</i>
                                {{Form::number('lot_size',$data['product_lot_size'], ['class'=>'form-control', 'placeholder'=>'Enter Lot Size'])}}
                            </div>
							
							<div class="alert alert-info">Delivery Information</div>
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
                              {{Form::label('address','Address:')}} <i>(Kindly add a landmark for easy location)</i>
                               {{Form::textarea('address',$data['address'], ['class'=>'form-control', 'placeholder'=>'Enter Address','rows'=>2])}}

                            </div>
                            
                            <div class="text-center">
								{!! Form::button('Save', array('type' => 'submit', 'class' => 'btn btn-primary form-control', 'name'=>'send')) !!}
                            </div>
                          </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

		@endsection
