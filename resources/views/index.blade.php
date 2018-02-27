@extends('layouts.app')

@section('title', 'Home')

<div id="all">
@section('content')
    

        <div id="content">
            <div class="container">     
                    
<div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="{{ URL::asset('assets/img/maize.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{ URL::asset('assets/img/rice.jpg') }}" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-11">
                            <h2 style="font-size:26px">Quality Products | Best Prices | Reliable Vendors</h2>
							<p style="color:#709f00" align="center" class="well">
							Last Mile Aggregator. Bridging the gap between the farmer and the consumer
							</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /#hot -->

            <!-- /.container -->


        </div>					
						

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
		
		@endsection