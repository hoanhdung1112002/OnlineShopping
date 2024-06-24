<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web_Menus extends Model
{
    use HasFactory;
    protected $table='web_menus';
    protected $primaryKey = 'menu_id'; // hoặc tên khóa chính của bạn
    protected $fillable=[
        'menu_id',
        'menu_name',
        'controller_name',
        'action_name',
        'level',
        'parent_id',
        'menu_order',
        'position',
        'link',
        'create_by',
        'update_by',
        'status',
        'description'
    ];
    //Menu cấp 2
    public function childs(){

    }
}
