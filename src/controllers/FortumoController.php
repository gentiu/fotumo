<?php namespace Shivergard\Fortumo;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;

use \Config;


class FortumoController extends \Shivergard\Fortumo\PackageController {

	public function test(){
		return false;
	}


	public function init(){
		return view('fortumo::fortumo');
	}

}