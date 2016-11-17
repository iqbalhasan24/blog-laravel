@extends('admin.layouts.base-1cols')

@section('title')
Partnership | Partnership
@stop

@section('content')

<?php //$user_group = strtolower($user->groups()->first()->name); ?>

<!-- Begin page content -->
<div class="container"> 
    <div class="row">

        <div class="col-md-12">
            <div class=" paddedTop drak-grey">
                <h2 class="text-center">Sorry! You dont have permission to view this page</h2>
            </div>
        </div>      
    </div> 
</div>
<br/><br/>
@stop
