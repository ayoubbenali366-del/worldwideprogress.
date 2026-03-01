<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = ['name','sector','cv_file'];
}