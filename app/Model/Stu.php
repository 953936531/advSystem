<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stu extends Model
{
        //指定模型操作的表名  默认复数形式
    protected $table = 'stus';
    //指定表主键
    protected $primaryKey = 'id';
    //开启时间戳自动写入
   public $timestamps = true;


    //添加字段白名单,(那些字段可以添加)
    protected $fillable = ['name','sex','class','age','head_img'];
}
