<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use DateTime;
use App\logs;
use App\site;
use App\computedlogs;
use App\tblcompare;
use Carbon\Carbon;

use App\Http\Requests;
use Yajra\Datatables\Datatables;

class CarouselController extends Controller
{
    //
    public function getlatestCarouseldata(){
		$latestcrsl = DB::select("SELECT site.name as Site,site.subname as subname, site.pic as pic,site.sitelat as lattitude ,site.sitelong as longtitude,FORMAT(logs.rvalue, 2)as rainten,FORMAT((site.sitelev+20-logs.wlevel),2) as water,logs.created_at as asof,FORMAT(logs.batteryvolt,2) as voltage,site.sensortype as sensor, @powa := FORMAT(site.Bconstant*((FORMAT((site.sitelev+20-logs.wlevel),2)-Wlevelzero)),2) as powone,site.Avariable as Avariable, logs.site_id as siteid FROM site INNER JOIN logs on site.id=logs.site_id WHERE logs.cnt IN (SELECT MAX(cnt) FROM logs GROUP BY site_id)");

		
		

		//return view('latest.carousel',compact('latestcrsl'));
		//return $latestcrsl;
		//dd($latestcrsl);
		$alldata = array();
		  foreach($latestcrsl as $r){
		  				/*echo($r->Site);
		  				echo($r->subname);
		  				echo($r->pic);
		  				echo($r->lattitude);
		  				echo($r->longtitude);
		  				echo($r->rainten);
		  				echo($r->water);
		  				echo($r->asof);
		  				echo($r->voltage);
		  				echo($r->sensor);
		  				echo($r->powone);
		  				echo($r->Avariable);
		  				echo($r->siteid);*/
		  				$discharge = round(pow($r->powone, $r->Avariable),2);
		  				if(is_nan($discharge)){

		  					$discharge = 'NaN';
		  				}
		  				if(is_infinite(floatval($discharge))){

		  					$discharge = 'INF';
		  				}
		  				//$dischargeb = bcpow($r->powone, $r->Avariable);
		  				//$dischargeb = round((floatval($r->powone)**floatval($r->Avariable)),2);
		  			/*array_push($alldata, array(
		  				"Site" => $r->Site,
		  				"subname" => $r->subname,
		  				"pic"=> $r->pic,
						"lattitude"=> $r->lattitude,
						"longtitude"=> $r->longtitude,
						"rainten"=> $r->rainten,
						"water"=> $r->water,
						"asof"=> $r->asof,
						"voltage"=> $r->voltage,
						"sensor"=> $r->sensor,
						"powone"=> $r->powone,
						"Avariable"=> $r->Avariable,
						"siteid"=> $r->siteid,
    					//"discharge" => $discharge

		  			));*/
		  			array_push($alldata, array(
		  				"Site" => $r->Site,
		  				"subname" => $r->subname,
		  				"pic"=> $r->pic,
						"lattitude"=> $r->lattitude,
						"longtitude"=> $r->longtitude,
						"rainten"=> $r->rainten,
						"water"=> $r->water,
						"asof"=> $r->asof,
						"voltage"=> $r->voltage,
						"sensor"=> $r->sensor,
						"powone"=> $r->powone,
						"Avariable"=> $r->Avariable,
						"siteid"=> $r->siteid,
    					"discharge" => (string)$discharge
		  			));
		
		  


		}


		
	
		 $jsonified = json_encode($alldata);
		 $jsonfinale = json_decode($jsonified);

     	//dd(json_encode($jsonfinale));
		return view('latest.carousel',compact('jsonfinale'));
		
			
									}
}
