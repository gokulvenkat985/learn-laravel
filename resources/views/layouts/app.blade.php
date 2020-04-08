<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Adzone</title>
 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{asset('fontawesome-free-5.13.0-web/css/all.css')}}"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('images/s1.jpeg') }}" rel="stylesheet"> -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: green !important;">
            <div class="container">
                <!-- <a class="navbar-brand" href="{{ url('/') }}" style="color:white !important"> -->
                    <!-- Adzone -->
                <!-- </a> -->
                <div class="row">
                    <div class="col-md-2">
                <h3 id="companyname">Adzone</h3>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"   >
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav mr-auto">

                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto"  style="margin-left: -8px !important;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white !important">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white !important">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
<li style="margin-top: 9px;"><a href="{{url('/postadd')}}"  style="color: white; text-decoration: none">AddPost</a></li>
                    </ul>
                </div>
            </div>
                </div>
                <div class="col-md-10" style="margin-top:20px !important;">
                    <div class="row">
                        <div class="col-md-4">
                            <form class="form-horizontal" method="post" action="{{url('/product/search')}}">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="text" name="searchproduct" class="form-control" required="true" placeholder="enter the product">
                                    </div>
                                    <div class="col-md-4">
                    <input type="submit" name="" class="btn btn-success" value="Search">
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <form class="form-horizontal" method="post" action="{{url('/search/add')}}">
                                {{csrf_field()}}
                                <div class="form-group row">
                                <div class="col-md-7">
                                    <input type="text" id="state" name="searchlocation" placeholder="Search Location" class="form-control" autocomplete="off">
                                    <div id="statelist"></div>
                                    <div id="cityList" style="display: block; position: absolute;
                                    border-radius: 0px;
                                    background:#fff;
                                    width: 88%;
                                    padding: 0px 13px;
                                    overflow-y:auto;
                                    z-index:1;"></div>
                                    <input type="text" name="city" id="city">
                                </div>

                                <div class="col-md-4 form-group">
       
                                      <select class="form-control" id="sel1" name="category">
                                        
                                      </select>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" name="searchlocation" placeholder="Search Location" class="btn btn-success" value="Search">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>


            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            
        </main>
    </div>
</body>
</html>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    
$(document).ready(function(){
    $('#state').keyup(function(){
         var data;
        var indiastates= $(this).val();
       
        if(indiastates != ''){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url:"{{route('searchlocation.fetch')}}",
                method:"POST",
                data:{indiastates:indiastates , _token:_token},
                success:function(data){
                    // alert(data);
                     $('#statelist').fadeIn();
                      $('#statelist').html(data);
                }
             });
        }
        else{
             $('#statelist').fadeOut();
            $('#statelist').html(data);
        }
    });
//display the recoment in tetx field
    $(document).on('click','#search',function(){
         $('#state').val($(this).text());
            $('#statelist').fadeOut();
    });
});
   
   $(document).on('click','#statelist ul li',function(){
    // var  state= $('#statelist').val();
    var id=$(this).val();   
    // console.log('id'+id);
    var _token=$('input[name="_token"]').val();
    $.ajax({
        url:"{{route('state.cities')}}",
        type:'post',
        data:{id:id,_token:_token},
        success:function(data){
            // alert(data);
            $('#cityList').fadeIn();
            $('#cityList').html(data);
        }
    });
   }); 
   $(document).on('click','#cityList',function(e){
       var txt =$(e.target).text();
       $('#city').fadeIn();
       $('#city').val(txt);
       $('#cityList').fadeOut();  
    });

$(document).ready(function(){
    var _token=$('input[name="_token"]').val();
$.ajax({
url:"{{route('maincategories.retrive')}}",
type:"post",
data:{_token:_token},
success:function(data){
$('#sel1').fadeIn();
$('#sel1').html(data);
}
});

$(document).ready(function(){
    if(window.location == "http://127.0.0.1:8000/"){
    var _token=$('input[name="_token"]').val();
    $.ajax({
        url:"{{route('maincategories.getads')}}",
        type:"get",
        success:function(data){
           $('#Advertisements').html(data);
        }
    });
}
}); 



});
</script>

