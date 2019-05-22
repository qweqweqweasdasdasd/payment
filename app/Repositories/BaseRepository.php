<?php 
namespace App\Repositories;

use DB;

class BaseRepository
{
    public $table = '';
    public $id = '';

    //公共更新方法
    public function CommonUpdate($id,$d)
    {
        
        return DB::table($this->table)->where($this->id,$id)->update($d);
    }

    //公共增一方法
    public function CommonIncrement($id,$field)
    {
        return DB::table($this->table)->where($this->id,$id)->increment($field);
    }

    //公共方法创建
    public function CommonInsert(array $data,$flag)
    {
        if($flag){
            $data['created_at'] = date('Y-m-d H:i:s',time());
        }
        return DB::table($this->table)->insert($data);
    }

    //公共方法获取到一条数据
    public function CommonFind($id)
    {
        return DB::table($this->table)->where($this->id,$id)->first();
    }

    //公共方法删除指定的数据
    public function CommonDelete($id)
    {
        return DB::table($this->table)->where($this->id,$id)->delete();
    }

    //面包屑
    public function CommonNav($path)
    {
        $array = explode('/',$path);
        return $array;
    }
}