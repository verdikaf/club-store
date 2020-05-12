<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Gambar extends Model
{
    protected $table = "preview";
 
    protected $fillable = ['foto','produk_id'];
}