<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPagePermission extends Model
{
    protected $table = 'user_page_permissions';
    protected $fillable = ['user_id','page_id'];
}
