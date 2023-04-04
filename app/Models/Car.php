<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes; //call softdelete method, delete data on the front-end but not in the database

    //data yg perlu input dari user
    protected $fillable = [
        'carname',
        'carcolour',
        'rangeprice',
        'attachment',
    ];

    //get and retrieve the attachments
    public function getAttachmentUrlAttribute(){
        return asset('storage/attachments/'.$this->attachment);
    }
}
