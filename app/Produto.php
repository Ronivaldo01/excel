<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	public $timestamp = false;
    protected $fillable = array('nome','quantidade','preco');
}
