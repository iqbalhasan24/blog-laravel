@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: users list
@stop

@section('content')
<div class="row">    
        <div class="col-md-12">             
            {{-- user lists --}}
            @include('laravel-authentication-acl::admin.user.user-table-for-permission')
        </div>
        {{-- <div class="col-md-3">            
            @include('laravel-authentication-acl::admin.user.search') 
        </div>--}}
    
</div>
@stop

@section('footer_scripts')
<script> 
    jQuery(document).ready(function () {
        $('.user_dropdown').change(function(){

            var token = "{{ csrf_token()}}";
            var user_id = $('.user_dropdown').val();
            if(user_id!='') { 

                $.ajax({
                    url: '/admin/users/pages',
                    type: 'POST',
                   // dataType: 'JSON',
                    data: {user_id:user_id,_token:token},
                    success: function(returnPage) { 

                        var pagesPermission;

                        $("#permission_page").empty();  
                        var returnPage = JSON.parse(returnPage);                          
                        $.each(returnPage.pages, function(index,page) { 
                            
                            var count = 0;
                            $.each(returnPage.own_pages, function(index,own_pages) { 

                                if(own_pages.page_id == page.id){
                                    count = count+1;                            
                                    pagesPermission = '<tr><td>'+page.template.replace(/_/g, " ")+'</td><td><input type="checkbox" class="page_permission" checked="checked" value="'+page.id+'"/></td></tr>';
                               } 
                            });

                            if(count==0) {

                                pagesPermission = '<tr><td>'+page.template.replace(/_/g, " ")+'</td><td><input type="checkbox" class="page_permission" value="'+page.id+'"/></td></tr>';
                            }    

                            $("#permission_page").append(pagesPermission);
                        });

                    }
                }); 
            } else {
                $("#permission_page").empty();
            }   
        });

        $(document).on("click",'.page_permission',function(){ 

            var token = "{{ csrf_token()}}";
            var user_id = $('.user_dropdown').val();           
            var page_id = $(this).parents("tr").find("td").eq(1).find(".page_permission").val();            
           
            $.ajax({
                url: '/admin/users/add_permission',
                type: 'POST',
                dataType: 'JSON',
                data: {user_id:user_id,page_id:page_id,_token:token},
                success: function(returnData) { 

                    if (returnData== 1) {
                        $('#add_permission')
                            .addClass('alert alert-success text-center')
                            .text('Permission Added Successfully')
                            .fadeIn().delay(1500).fadeOut(1500); 
                    } else {
                       $('#remove_permission')                          
                            .addClass('alert alert-danger text-center')
                            .text('Permission Remove Successfully')
                            .fadeIn().delay(1500).fadeOut(1500); 
                       }

                }
            }); 
        });
    });
</script>
@stop