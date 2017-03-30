<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = 'fileUpload';

	protected $fillable = ['data1', 'data2', 'data3', 'data4', 'data5', 'data6'];
}
