<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

	protected $table = 'media';
	protected $fillable = ['produit_id', 'type', 'nom','chemin', 'description', 'default'];

}
