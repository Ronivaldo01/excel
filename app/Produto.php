<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
	public $timestamp = false;
    protected $fillable = array('codigo','nome','quantidade','preco');
}
