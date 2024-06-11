<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeyRequest;
use App\Http\Requests\UpdateKeyRequest;
use App\Models\Key;

class KeyController extends Controller
{

	public static function getValid() 
	{
		$keys = Key::where('used', 0)->pluck('id');

		return view('keys.valid', [
			'keys' => $keys
		]);	
	}

	public static function check($id)
	{
		try {
			$key = Key::findOrFail($id);

			if ($key->used == true) {
				return false;
			}

			KeyController::expire($id);
			return true;
		} catch (Throwable $th) {
			return false;
		}
	}

	public static function expire($id)
	{
		$key = Key::findOrFail($id);
		$key->used = true;
		$key->save();
	}
	
}
