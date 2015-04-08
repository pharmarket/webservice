<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posologie extends Model {

	protected $table = 'posologie';
	protected $fillable = ['produit_id', 'type_id', 'min', 'max','coeff'];

}
