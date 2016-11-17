@extends('admin.layouts.base-1cols')

@section('title')
{!! $page->title !!}
@stop

@section('content')
<!---slider----->
<div class="container" >
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol style="margin-bottom: 30px;" class="carousel-indicators">
        @foreach( $sliders as $key => $slide)
        <li data-target="#myCarousel" data-slide-to="{{ $key }}" @if($key == 0)class="active" @endif></li>        
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach( $sliders as $key1 => $slide ) 
        <div class="item @if($key1 == 0) active @endif">
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

              <!--   <h1>{!! $slide->title !!}</h1> -->
               <!-- <p>{!! $slide->content !!}</p> -->
            </div>
        </div>
        @endforeach
    </div>

    <!-- Controls -->
 
</div>
    
</div>
<!---end-->
<div class="container"> 
   
    @if( $page->short_description )
        <div class="row">

         <!--    <div class="col-md-12">
                <div class=" paddedTop drak-grey text-center">
                    <h3>{!! $page->banner_description !!} </h3>  
                </div>
            </div> -->
     
            <div class="col-md-12 ">
                <div class="gray-bg small-grey  text-center">
                   {!! $page->short_description !!}
                </div>
            </div>
        </div>
    @endif

   <div class="row">
        <div class="col-md-12">
            <ul class="list-unstyled home-list">
                @foreach( $home_rows as $key => $home )
                <li>
                    <!-- <a href="/page/{!! $home->slug !!}#" style="width:100%">
                        <div class="col-md-3"><img src="/{!! $home->image !!}"/></div>
                        <div class="col-md-9">
                            <h2>{!! $home->title !!}</h2>
                            {!! $home->content !!}
                        </div>
                    </a> -->

                    <a href="/page/{!! $home->slug !!}#" style="width:100%">
                        <div class="col-md-3"><img src="/{!! $home->image !!}"/></div>
                        <div class="col-md-9">
                            <h2>{!! $home->title !!}</h2>
                            {!! $home->content !!}
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
    
</div>

<div class="container">   
      <div class="row">
        <div class="col-md-12">  

    {!! $page->content !!}  

</div></div></div>

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
