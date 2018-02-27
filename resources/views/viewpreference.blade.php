@extends('layouts.app')

@section('title', 'My Preference')
<div id="all">
@section('content')
<?php use App\Http\Controllers\UsersController; ?>

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>My Preference</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h2>Preference</h2>

						@if(count($preference) > 0)
							<table class="table table-hover">
								<tr><th>Product</th><th>Lot Size</th><th>Date Uploaded</th><th>State</th><th>LGA</th><th>Address</th><th>Status</th><th>Action</th></tr>
							@foreach($preference as $preference)
								<tr>
									<td>{{$preference->product_name}}</td>
									<td>{{$preference->product_lot_size}}</td>
									<td>{{$preference->created_at}}</td>
									<td>{{ UsersController::getState($preference->state) }}</td>
									<td>{{ UsersController::getLGA($preference->lga) }}</td>
									<td>{{ $preference->address }}</td>
									<td style="color:{{$preference->status==0?'gray':($preference->status==1?'blue':'green')}}">{{$preference->status==0?'Pending':($preference->status==1?'Booked':'Delivered')}}
									</td>
									<td><a href="/preference/edit/{{$preference->id}}">Edit</a> | <a href="/preference/delete/{{$preference->id}}">Delete</a></td>
								</tr>
						@endforeach
							</table>
						@endif
                        <hr>

                    </div>
                </div>



            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

		@endsection
