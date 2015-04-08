<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posologie_sexe extends Model {

	protected $table = 'posologie_sexe';
	protected $fillable = ['produit_id', 'sexe', 'coeff'];

}
