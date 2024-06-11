<?php

namespace App\Http\Controllers;

use App\Models\Lootbox;
use App\Models\Loot;
use Illuminate\Http\Request;
use App\Http\Controllers\KeyController;

class LootboxController extends Controller
{

	public function generate()
    {
		$loots = Loot::factory()->lowTier()->count(4)->make();

		$loots->push(Loot::factory()->midTier()->make());
		$loots->push(Loot::factory()->midTier()->make());
		$loots->push(Loot::factory()->midTier()->make());

		$loots->push(Loot::factory()->highTier()->make());

        return view('lootbox.open', [
			'loots' => $loots->shuffle(),
			'alert' => 0
		]);	
	}


	public function open(Request $request) {
		$key = $request->lootboxKey;
		$index = rand(0, 8);

		if (KeyController::check($key)) {
			return response()->json(array('index'=> "#loot-".$index), 200);
		}

		return response()->json(array(), 406);
	 }
	
}