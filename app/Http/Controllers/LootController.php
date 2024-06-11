<?php

namespace App\Http\Controllers;

use App\Models\Loot;
use Illuminate\Http\Request;

class LootController extends Controller
{
    
	public function grade($id)
	{
		return view('loot', [
			'loot' => Loot::findOrFail($id)
		]);
	}

	public function makeLoot(Request $request)
	{
		// $internalGrade = $request->internalGrade;
		$friendlyGrade = $request->friendlyGrade;
		// $internalName = $request->internalName;
		$friendlyName = $request->friendlyName;
		// $imageSource = $request->imageSource;

		$loot = Loot::create([
			// 'internal_grade' => $internalGrade, 
			'friendly_grade' => $friendlyGrade,
			// 'internal_name' => $internalName,
			'friendly_name' => $friendlyName,
			// 'image_source' => $imageSource
		]);
	}

}
