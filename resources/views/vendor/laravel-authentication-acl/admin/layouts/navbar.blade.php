<?php
\Session::forget('path_name');
$current_route = \Request::segment(2);
$authentication = \App::make('authenticator');
$user = $authentication->getLoggedUser();
if(isset($user) && isset($current_route)) {
    $current_template = DB::table('pages')->where('slug',$current_route)->select('template')->first();
    if($current_template)
       $current_route = $current_template->template;
}
/*$user_group = strtolower($user->groups()->first()->name);*/
$menus = DB::table('pages')->whereNotIn('template',['terms_of_use','disclaimer','informed_consent'])->groupBy('template')->orderBy('id')->get();
$home_submenu = DB::table('pages')->where('template','home')->get();
$partnership_submenu = DB::table('pages')->where('template','partnership')->get();
$portfolio_submenu = DB::table('pages')->where('template','westcon_Comstor_AWS_Cloud_Portfolio')->get();
$training_submenu = DB::table('pages')->where('template','training_Enablement')->get();
$engaging_submenu = DB::table('pages')->where('template','engaging_End_Customers')->get();
$support_submenu = DB::table('pages')->where('template','activition_On_Boarding_And_Support')->get();
?>
<style>
    #addtlLinks .user-menu a:nth-child(1){display: none !important;}
    .user-menu{display:none;padding: 0 !important;padding:0 !important;list-style:none;position: absolute;  border: 1px solid #ccc;background:#fff;z-index:999;margin:0;}
    #addtlLinks .user-menu a{padding:12px 6px;border-bottom: 1px solid #ccc;display:block; line-height: normal;text-align: center;}
    #addtlLinks .user-menu a:last-child{border-bottom:none;}
    #addtlLinks .fa{margin-left:5px;}
    #addtlLinks > a {cursor: pointer;}
    .up {background:url(/images/arrowDown.png) no-repeat right 10px;}
    .down {background:url(/images/arrowup.png) no-repeat right 10px;}
    #navWrap .sub-menu li:last-child a {
        border-bottom-right-radius: 25px;
    }     

</style>


<header>
    <div class="container">  
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 logo">
                    <a href="/">
                        {{ HTML::image('images/site-logo.png') }}
                    </a>
                </div>
                 <div class="col-md-4 text-center logo1">
                   <!--  {{ HTML::image('images/ama-logo.png') }} -->                    
                   <!--  @if($user)
                    <div id="addtlLinks">
                        <a style="color:#fff" ><br> Welcome &nbsp;</a>                       
                        <div class="user-menu"> 
                            @if(isset($menu_items))
                            @foreach($menu_items as $item)
                            <a class="{!! LaravelAcl\Library\Views\Helper::get_active_route_name($item->getRoute()) !!}" href="{!! $item->getLink() !!}">{!!$item->getName()!!}</a>
                            @endforeach
                            @endif 
                            <a href="{!! URL::route('users.list') !!}">User List</a> 
                            <a href="{!! URL::route('users.selfprofile.edit') !!}">My Account</a>
                            <a href="{!! URL::route('contact.form') !!}">Contact Us</a>
                            <a href="{!! URL::route('user.logout') !!}">Sign Out</a>
                        </div>
                    </div>
                    @else 
                    <a style="padding-top: 17px; padding-bottom: 0px" href="{!! URL::route('user.login') !!}">Login<br> &nbsp; </a>      
                    @endif -->


                  

                </div> 
                <div class="col-md-6 text-right logo2">
                 <!--  edit -->
                 <div class="col-md-10">
                     <div class="col-md-9" >
                     </div>
                  <div class="col-md-3" >
                        <ul class="nav navbar-nav">                  
                            <li class="">
                                @if($user)
                                <div id="addtlLinks">
                                    <a class="up" style="color:#000" ><br> Welcome</a>                        
                                    <div class="user-menu"> 
                                        @if(isset($menu_items))
                                        @foreach($menu_items as $item)
                                        <a class="{!! LaravelAcl\Library\Views\Helper::get_active_route_name($item->getRoute()) !!}" href="{!! $item->getLink() !!}">{!!$item->getName()!!}</a>
                                        @endforeach
                                        @endif 
                                        <a href="{!! URL::route('users.list') !!}">User List</a> 
                                        <a href="{!! URL::route('users.selfprofile.edit') !!}">My Account</a>
                                        <a href="{!! URL::route('contact.form') !!}">Contact Us</a>
                                        <a href="{!! URL::route('user.logout') !!}">Sign Out</a>
                                    </div>
                                </div>
                                @else 
                                <a style="padding-top: 17px; padding-bottom: 0px" href="{!! URL::route('user.login') !!}">Login<br> &nbsp; </a>      
                                @endif
                            </li>
                        </ul> 
                    </div>
                </div>
                    
                    <div class="col-md-2">

                   <!--   edit -->
                    {{ HTML::image('images/logo-o1.png') }}
                    </div>
                </div>



            </div>
        </div>

    </div>
</header> 

<nav class="navbar navbar-default">
    <div class="container" id="navigation-container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>      
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">   
             
            @foreach($menus as $menu)
                <li @if (isset($current_route) && $current_route ==$menu->template) class="active" @endif>
                    @if(($menu->template=='home') && (sizeof($home_submenu)>1))     
                        <a data-toggle="dropdown" class="dropdown-toggle" >{{ucwords(str_replace('_', ' ', $menu->template))}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">   
                            @foreach($home_submenu as $h_submenu)
                                <li><a href="{{url('page/'.$h_submenu->slug)}}">{{$h_submenu->name}}</a></li>
                            @endforeach  
                        </ul>
                    @elseif(($menu->template=='partnership') && (sizeof($partnership_submenu)>1))                           
                        <a data-toggle="dropdown" class="dropdown-toggle">{{ucwords(str_replace('_', ' ', $menu->template))}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">   
                            @foreach($partnership_submenu as $p_submenu)
                                <li><a href="{{url('page/'.$p_submenu->slug)}}">{{$p_submenu->name}}</a></li>
                            @endforeach  
                        </ul>
                    @elseif(($menu->template=='westcon_Comstor_AWS_Cloud_Portfolio') && (sizeof($portfolio_submenu)>1))
                        <a data-toggle="dropdown" class="dropdown-toggle">{{$menu->name}} <b class="caret"></b></a>
                        <ul class="dropdown-menu">   
                            @foreach($portfolio_submenu as $port_submenu)
                                <li><a href="{{url('page/'.$port_submenu->slug)}}">{{$port_submenu->name}}</a></li>
                            @endforeach  
                        </ul>
                    @elseif(($menu->template=='training_Enablement') && (sizeof($training_submenu)>1))                            
                        <a data-toggle="dropdown" class="dropdown-toggle">{{ucwords(str_replace('_', ' ','Training & Enablement'))}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">   
                            @foreach($training_submenu as $t_submenu)
                                <li><a href="{{url('page/'.$t_submenu->slug)}}">{{$t_submenu->name}}</a></li>
                            @endforeach  
                        </ul>
                    @elseif(($menu->template=='engaging_End_Customers') && (sizeof($engaging_submenu)>1))
                        <a data-toggle="dropdown" class="dropdown-toggle">{!! wordwrap(ucwords(str_replace('_', ' ', $menu->template)), 12, "<br/>", true)!!}<b class="caret"></b></a>
                        <ul class="dropdown-menu">   
                            @foreach($engaging_submenu as $eg_submenu)
                                <li><a href="{{url('page/'.$eg_submenu->slug)}}">{{$eg_submenu->name}}</a></li>
                            @endforeach  
                        </ul>
                    @elseif(($menu->template=='activition_On_Boarding_And_Support') && (sizeof($support_submenu)>1))
                        <a data-toggle="dropdown" class="dropdown-toggle">{!! wordwrap(ucwords(str_replace('_', ' ', 'Activation, Onboarding & Support')), 24, "<br/>", true)!!}<b class="caret"></b></a>
                        <ul class="dropdown-menu">   
                            @foreach($support_submenu as $s_submenu)
                                <li><a href="{{url('page/'.$s_submenu->slug)}}">{{$s_submenu->name}}</a></li>
                            @endforeach  
                        </ul>
                    @else
                        @if($menu->template=='new_template') 
                           <a href="{{url('page/'.$menu->slug)}}">{!! wordwrap(ucwords(str_replace('_', ' ', $menu->title)), 24, "<br/>", true)!!}</a>
                        @else
                           @if($menu->template=='activition_On_Boarding_And_Support')
                            <a href="{{url('page/'.$menu->slug)}}">                            
                               {!! wordwrap(ucwords(str_replace('_', ' ','Activation, Onboarding & Support')), 24, "<br/>", true)!!}
                            </a>   
                            @elseif($menu->template=='engaging_End_Customers')
                            <a href="{{url('page/'.$menu->slug)}}">                           
                               {!! wordwrap(ucwords(str_replace('_', ' ', $menu->template)), 14, "<br/>", true)!!}
                            </a> 
                            @elseif($menu->template=='training_Enablement')
                            <a href="{{url('page/'.$menu->slug)}}">                           
                               {!! wordwrap(ucwords(str_replace('_', ' ', 'Training & Enablement')), 14, "<br/>", true)!!}
                            </a> 
                            @elseif($menu->template=='westcon_Comstor_AWS_Cloud_Portfolio')
                            <a href="{{url('page/'.$menu->slug)}}">                           
                               {!! wordwrap(ucwords(str_replace('_', ' ', $menu->template)), 19, "<br/>", true)!!}
                            </a> 
                            @else  
                             <a href="{{url('page/'.$menu->slug)}}">{!! wordwrap(ucwords(str_replace('_', ' ', $menu->template)), 24, "<br/>", true)!!} </a>
                            @endif                           
                        @endif   
                    @endif
                </li>
            @endforeach   


           <!--   Previous Positio   == Welcome Menu===  -->
                
                <!-- <li class="pull-right">
                    @if($user)
                    <div id="addtlLinks">
                        <a class="up" style="color:#fff" ><br> Welcome &nbsp;</a>                        
                        <div class="user-menu"> 
                            @if(isset($menu_items))
                            @foreach($menu_items as $item)
                            <a class="{!! LaravelAcl\Library\Views\Helper::get_active_route_name($item->getRoute()) !!}" href="{!! $item->getLink() !!}">{!!$item->getName()!!}</a>
                            @endforeach
                            @endif 
                            <a href="{!! URL::route('users.list') !!}">User List</a> 
                            <a href="{!! URL::route('users.selfprofile.edit') !!}">My Account</a>
                            <a href="{!! URL::route('contact.form') !!}">Contact Us</a>
                            <a href="{!! URL::route('user.logout') !!}">Sign Out</a>
                        </div>
                    </div>
                    @else 
                    <a style="padding-top: 17px; padding-bottom: 0px" href="{!! URL::route('user.login') !!}">Login<br> &nbsp; </a>      
                    @endif
                </li>       -->

            </ul> 
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>