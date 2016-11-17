@extends('admin.layouts.base-1cols')

@section('title')
{!! $page->title !!}
@stop

@section('content')

<!-- Begin page content -->
<div class="container"> 
    <div class="row">

         {!! $page->content !!}   <!-- total page content -->
       
    </div> 

</div>
@stop
