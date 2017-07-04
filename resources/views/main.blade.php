<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EZ Adventurer</title>
        {!! HTML::style('css/bootstrap.min.css') !!}
    	{!! HTML::script('js/jquery-3.1.1.min.js') !!}
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
        {!! HTML::script('js/bootstrap.min.js') !!}
        {!! HTML::style('css/custom.css') !!}
        {!! HTML::style('font-awesome/css/font-awesome.min.css') !!}
        @yield('css')
</head>
<body>

        <div class="container-fluid">
                <div class="row justify-content-center bg-brown">
                    <div class="col-4 hidden-sm-down">
                        <div class="row text-center align-items-center" style="height: 100%">
                            <div class="col"></div>
                            <div class="col"><a class="text-vanilla" href=" {{ URL::route('pub_tours') }}"><h5>TOURS</h5></a></div>
                            <div class="col"><a class="text-vanilla" href="{{ URL::route('contact') }}"><h5>CONTACT</h5></a></div>
                        </div>
                    </div>
                    <div  class="text-center col-md-4 align-items-center text-center align-self-center">
                        <a href="{{ URL::route('home') }}" class=" text-center align-self-center text-dark-brown" style="text-decoration: none">
                            {!! HTML::image('img/logo.png', 'so EZ', array('style' => 'max-width: 127px;')) !!}
                            <h2 class="text-center display-6"><strong>EZ Adventurer</strong></h2>
                        </a>
                    </div>
                    <div class="col-4 hidden-sm-down">
                        <div class="row text-center align-items-center" style="height: 100%">
                            <div class="col"><a class="text-vanilla" href="{{ URL::route('about_us') }}"><h5>ABOUT US</h5></a></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row hidden-md-up justify-content-center">
                            <div class="col-6 text-center"><a class=" text-dark-brown" href=" {{ URL::route('pub_tours') }}">Tours</a></div>
                            <div class="col-6 text-center"><a class=" text-dark-brown" href="">Contact</a></div>
                        </div>
                    </div>


                </div>


        </div>
        <div  style="min-height: 640px;">
        @yield('content')
        </div>

        <div class="container-fluid jumbotron bg-dark-brown" style="margin-bottom: 0">
            <div class="container text-white">
                <div class="row">
                    <div class="col-md-3">
                        <p class="lead text-center">EZ adventurer</p>
                        <div id="footer_menu">
                            <p class="text-center"><a href="{{ URL::route('pub_tours') }}" class="text-white"></a>Tours</p>
                            <p class="text-center"><a href="{{ URL::route('about_us') }}" class="text-white">About Us</a></p>
                            <p class="text-center"><a href="{{ URL::route('contact') }}" class="text-white">Contact</a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="lead text-center">Follow Us On Social Media</p>
                        <div id="footer_social">
                            <p class="text-center">
                                <a href="https://www.facebook.com/ezadventurer.travelandtours/" class="text-white">
                                    {!! HTML::image('img/fb.png', 'so EZ', array('style' => 'max-width: 47px;')) !!}
                                </a>
                                <a href="https://www.instagram.com/ezadventurer/" class="text-white">
                                    {!! HTML::image('img/ig.png', 'so EZ', array('style' => 'max-width: 47px;')) !!}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="lead">Search EZ Adventurer</h3>

                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Find Tours</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <br/><br/>
                <div class="row">
                    <div class="col text-white ">
                    <h6 class="text-center ">EZ adventurer © 2017</h6>
                    <p class="text-center"><small>Philippine Travel Agency</small></p>
                    </div>
                </div>
            </div>
        </div>
<!--            -->
<!--            <div class="row">-->
<!---->
<!--                <div class="media">-->
<!--                    <img src="http://placehold.it/350x150" class="d-flex mr-3">-->
<!--                    <div class="media-body">-->
<!--                        <h5 class="mt-0">Media heading</h5>-->
<!--                        Cras sit amet nibh libero, in gravi da nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

@yield('js')
</body>
</html>