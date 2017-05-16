<?php

namespace App\Http\Controllers\AdminFunctions;
use DB;
use View;

class ChartAdmin extends AdminController
{
	public $table;
	public $col1;
	public $param1;
	public $blade;
	public $param3;

	public function __construct($table, $col1, $param1, $param2,$param3,$blade ){
		$this->table = $table;
		$this->col1 = $col1;
		$this->param1 = $param1;
		$this->param2 = $param2;
		$this->param3 = $param3;
		$this->blade = $blade;

	}
	
	public function chartDelivery(){
		$delivery2 = DB::table($this->table)->selectRaw('count(id) as buyings_count, '.$this->col1.' as deli')->groupBy('deli')->get();
		$dayUPS = DB::table($this->table)->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->where($this->col1,$this->param1)->groupBy('weekday')->get();
		$dayDPD = DB::table($this->table)->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->where($this->col1, $this->param2)->groupBy('weekday')->get();
		$UPS = $dayUPS->keyBy('weekday');
		$DPD=$dayDPD->keyBy('weekday');

		return View::make($this->blade,compact('DPD','UPS','delivery2'));	
	}
	
	
}
