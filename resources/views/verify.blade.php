@extends('layouts.app')

@section('title', 'My Preference')
<div id="all">
@section('content')


        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Verification required</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h3>Access denied. Account verification is required to view this page</h3>
						<p>You may call the admin or write to support@lma.com to speed-up the verification process</p>
                    </div>
                </div>



            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

		@endsection
