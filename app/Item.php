<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'number', 'description', 'entry_type', 'document_number', 'location_code', 'quantity', 'unit', 'unit_of_measure_code', 'item_category_code', 'lot_number', 'posting_date'
	];
}
