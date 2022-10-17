<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'fullname',
        'birthday',
        'address',
    ];
    static function add($resquest)
    {
        try {
            student::create($resquest);
        } catch (Exception $ex) {
            throw $ex;
        }
    }static function upd($resquest, $id)
    {
        student::where('id', $id)->update($resquest);
        return true;
    }

}
