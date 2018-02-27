@extends('layouts.app')

@section('title', 'My Profile')
<div id="all">
@section('content')


        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>My Profile</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h2 style="color:#339966">Hi {{$users->fname.' '.$users->lname.' '.$users->mname}}</h2>

						@if(count($users) > 0)
							<table class="table table-hover">
								<tr><th>Email</th><td>{{$users->email}}</td></tr>
								<tr><th>Phone Number</th><td>{{$users->phone}}</td></tr>
								<tr><th>State</th><td>{{$state}}</td></tr>
								<tr><th>LGA</th><td>{{$lga}}</td></tr>
								<tr><th>Address</th><td>{{$users->address}}</td></tr>
								<tr><th></th><td><a href="/profile/update">Edit Profile</a></td></tr>
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
