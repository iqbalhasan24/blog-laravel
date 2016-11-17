<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-bold"><i class="fa fa-file"></i> Pages</h3>
    </div>
    <div class="panel-body">     
            
        <!-- <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-9">
                {!! Form::open(['method' => 'get', 'class' => 'form-inline']) !!}
                <div class="form-group">
                    {!! Form::select('order_by', ["" => "select column", "first_name" => "First name", "last_name" => "Last name", "email" => "Email", "last_login" => "Last login", "active" => "Active"], $request->get('order_by',''), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('ordering', ["asc" => "Ascending", "desc" => "descending"], $request->get('ordering','asc'), ['class' =>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Order', ['class' => 'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3">
                <a href="{!! URL::route('users.edit') !!}" class="btn btn-info"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                @if(! $users->isEmpty() )

                   <div id="add_permission"></div>          
                   <div id="remove_permission"></div>

                <table class="table table-hover">                   
                    <tbody>                        
                        <tr>
                            <td>
                                <select name="user_id" class="form-control user_dropdown">
                                    <option value="">Please Select User</option>
                                    @foreach($users as $user)
                                        @if(! $user->protected)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                        @endif
                                    @endforeach    
                                </select>
                            </td>                 
                        </tr>                       
                    </tbody>                   
                </table>
                <div class="paginator">                    
                    {!! $users->appends($request->except(['page']) )->render() !!}
                </div>
                @else
                <span class="text-warning"><h5>No results found.</h5></span>
                @endif
            </div>
        </div> 

        <br/>

        <div class="row">
            <div class="col-md-12">                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Page Name</th>
                            <th>Permission</th>                            
                        </tr>
                    </thead>
                    <tbody id="permission_page"> 
                    </tbody>                   
                </table>                           
            </div>
        </div>

    </div>
</div>
