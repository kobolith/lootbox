<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Database\Factories\LootFactory;

class Loot extends Model
{

    use HasFactory;

	protected $fillable = [ 
		'internal_grade', 'friendly_grade', 'internal_name', 'friendly_name', 'image_source' 
	];

	protected static function newFactory()
	{
		return LootFactory::new();
	}
	
}