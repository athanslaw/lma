@extends('layouts.app')

@section('title', 'Registered Users')
<div id="all">
@section('content')


        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Registered Users</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h1>Users</h1>

						@if(count($users) > 0)
							<table class="table table-hover">
								<tr><th>Name</th><th>Email</th></tr>
							@foreach($users as $user)
								<tr>
									<td>{{$user->fname.' '.$user->lname.' '.$user->mname}}</td>
									<td>{{$user->email}}</td>
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
