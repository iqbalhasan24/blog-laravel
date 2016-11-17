@extends('admin.layouts.base-1cols')

@section('title')
Partnership | Partnership
@stop

@section('content')

<?php $user_group = strtolower($user->groups()->first()->name); ?>


<div class="container" >    
    <!-- Indicators -->       
    @if($page->banner_type != 'slider')     
       
        <div class="row">
            <div class="col-md-12">
                 <img src="{{asset($page->banner_image)}}"  width="100%"  style="margin:0px;">
            </div>
        </div>
      
    @else 
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol style="margin-bottom: 30px;" class="carousel-indicators">
                @foreach( $sliders as $key => $slide)
                <li data-target="#myCarousel" data-slide-to="{{ $key }}" @if($key == 0)class="active" @endif></li>        
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach( $sliders as $key => $slide )
                <div class="item @if($key == 0) active @endif">
                    <div class="slides"  style='position:relative; height:380px;background: rgba(0, 0, 0, 0) url("/{{ $slide->image }}") no-repeat scroll 0 0 / contain ;'>
                           
                            @if($slide->display_on_slider =="yes")

                  @if( $slide->title !="" && $slide->content !="" && $slide->slider_text_position =="" )
                      <div class="left_with_content" >

                          <h2 >{!! $slide->title  !!} </h2> 
                          <p>{!! $slide->content !!}</p>                           
                      </div> 


                    @elseif( $slide->title !="" && $slide->content ="" && $slide->slider_text_position =="" )
                      <div class="left_without_content" >
                         <h2 >{!! $slide->title  !!} </h2>                                  
                      </div> 



                    @elseif( $slide->title !="" && $slide->content !="" && $slide->slider_text_position =="left" )
                      <div class="left_with_content" >
                            <h2 >{!! $slide->title  !!} </h2> 
                          <p>{!! $slide->content !!}</p>                 
                      </div>


                    @elseif( $slide->title !="" && $slide->content =="" && $slide->slider_text_position =="left" )  
                       <div class="left_without_content"  >
                             <h2 >{!! $slide->title  !!} </h2> 
                        </div> 

                    @elseif( $slide->title !="" && $slide->content !=="" && $slide->slider_text_position =="right" )  
                       <div class="right_with_content" >
                             <h2 >{!! $slide->title  !!} </h2>
                             <p>{!! $slide->content !!}</p>                               
                        </div> 

                    @elseif( $slide->title !="" && $slide->content =="" && $slide->slider_text_position =="right" )  
                       <div class="right_without_content" >
                             <h2 >{!! $slide->title  !!} </h2>                              
                        </div> 
                  @endif
                @endif
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Banner end-->
        </div>    
    @endif      
    <!-- Controls -->
    
</div>

<!-- Banner end-->

<!-- Begin page content -->
<div class="container"> 
    <div class="row">
    @if( $page->banner_description !="")
        <div class="col-md-12">
            <div class=" paddedTop drak-grey">
                 <h2 class="text-center">{!! $page->banner_description !!}</h2>
            </div>
        </div>
      @endif

        <div class="col-md-12 ">
            <div class="gray-bg small-grey  text-center">
                <h4>{!! $page->short_description !!}</h4>
            </div>
        </div>
    </div>
</div>
<div class="container">  
    <div class="row">
     <div class="col-md-12">
       {!! $page->content !!}   <!-- total page content -->
     </div>
    </div>
</div>

<style>

.left_with_content{

    position:absolute; top:110px; right:0; bottom:0; left: 40px;  
    background:#666; 
    display:block; 
    overflow: hidden; 
    max-height:160px; 
    width:420px; 
    padding:7px; 
    opacity: .7 
}

.left_without_content{
    position:absolute; top:110px; right:0; bottom:0; left: 40px;  
    background:#666; 
    display:block; 
    overflow: hidden; 
    max-height:60px; 
    width:420px; 
    padding:7px; 
    opacity: .7 

}

.right_with_content{

    position:absolute; top:110px; right:40px; bottom:0;  
    background:#666; 
    display:block; 
    overflow: hidden; 
    max-height:160px; 
    width:420px; 
    padding:7px; 
    opacity: .7 
}

.right_without_content{

    position:absolute; top:110px; right:40px; bottom:0;  
    background:#666; 
    display:block; 
    overflow: hidden; 
    max-height:60px; 
    width:420px; 
    padding:7px; 
    opacity: .7 
}


</style>

@stop
