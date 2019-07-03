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
		$latestcrsl = DB::select("SELECT site.name as Site,site.subname as subname, site.pic as pic,site.sitelat as lattitude ,site.sitelong as longtitude,FORMAT(logs.rvalue, 2)as rainten,FORMAT((site.sitelev-logs.wlevel),2) as water,logs.created_at as asof,FORMAT(logs.batteryvolt,2) as voltage,site.sensortype as sensor, @powa := FORMAT(site.Bconstant*((FORMAT((site.sitelev-logs.wlevel),2)-Wlevelzero)),2) as powone,site.Avariable as Avariable, logs.site_id as siteid FROM site INNER JOIN logs on site.id=logs.site_id WHERE logs.cnt IN (SELECT MAX(cnt) FROM logs GROUP BY site_id)");

		$secondrvaluea = DB::select("SELECT FORMAT(rvalue, 2) as rvalue  FROM `logs` WHERE site_id = 7 ORDER by cnt DESC LIMIT 1,1");
		$secondrvalueb = DB::select("SELECT FORMAT(rvalue, 2) as rvalue FROM `logs` WHERE site_id = 8 ORDER by cnt DESC LIMIT 1,1");
		$secondrvaluec = DB::select("SELECT FORMAT(rvalue, 2) as rvalue FROM `logs` WHERE site_id = 9 ORDER by cnt DESC LIMIT 1,1");
		$secondrvalued = DB::select("SELECT FORMAT(rvalue, 2) as rvalue FROM `logs` WHERE site_id = 10 ORDER by cnt DESC LIMIT 1,1");
		$secondrvaluee = DB::select("SELECT FORMAT(rvalue, 2) as rvalue FROM `logs` WHERE site_id = 11 ORDER by cnt DESC LIMIT 1,1");
		

		//return view('latest.carousel',compact('latestcrsl'));
		//return $latestcrsl;
		//dd($latestcrsl);
		

		$alldata = array();
		$kind = 5;
		$unkind = 6;
		$nokind = 0;
		  foreach($latestcrsl as $r){


		  				if($r->siteid=='7'){

		  					foreach($secondrvaluea as $sca){

		  				$discharge = round(pow($r->powone, $r->Avariable),2);
		  				if(is_nan($discharge)){

		  					$discharge = 'NaN';
		  				}
		  				if(is_infinite(floatval($discharge))){

		  					$discharge = 'INF';
		  				}

		  				$minusrn = $r->rainten - $sca->rvalue;

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
						"sensor"=> (string)$kind,
						"powone"=> $r->powone,
						"Avariable"=> $r->Avariable,
						"siteid"=> $r->siteid,
    					"discharge" => (string)$discharge,
    					"secondrn" => $sca->rvalue,
    					"minusdrn" => (string)round($minusrn,2),
    					"kind" => (string)$kind
		  			));

						}//foreach

						} //site id 7


					else if($r->siteid=='8'){

		  					foreach($secondrvalueb as $scb){

		  				$discharge = round(pow($r->powone, $r->Avariable),2);
		  				if(is_nan($discharge)){

		  					$discharge = 'NaN';
		  				}
		  				if(is_infinite(floatval($discharge))){

		  					$discharge = 'INF';
		  				}

		  				$minusrn = $r->rainten - $scb->rvalue;

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
						"sensor"=> (string)$kind,
						"powone"=> $r->powone,
						"Avariable"=> $r->Avariable,
						"siteid"=> $r->siteid,
    					"discharge" => (string)$discharge,
    					"secondrn" => $scb->rvalue,
    					"minusdrn" => (string)round($minusrn,2),
    					"kind" => (string)$kind
		  			));

						}//foreach

						} //site id 8

				else if($r->siteid=='9'){

		  					foreach($secondrvaluec as $scc){

		  				$discharge = round(pow($r->powone, $r->Avariable),2);
		  				if(is_nan($discharge)){

		  					$discharge = 'NaN';
		  				}
		  				if(is_infinite(floatval($discharge))){

		  					$discharge = 'INF';
		  				}

		  				$minusrn = $r->rainten - $scc->rvalue;

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
						"sensor"=> (string)$kind,
						"powone"=> $r->powone,
						"Avariable"=> $r->Avariable,
						"siteid"=> $r->siteid,
    					"discharge" => (string)$discharge,
    					"secondrn" => $scc->rvalue,
    					"minusdrn" => (string)round($minusrn,2),
    					"kind" => (string)$kind
		  			));

						}//foreach

						} //site id 9

				else if($r->siteid=='10'){

		  					foreach($secondrvalued as $scd){

		  				$discharge = round(pow($r->powone, $r->Avariable),2);
		  				if(is_nan($discharge)){

		  					$discharge = 'NaN';
		  				}
		  				if(is_infinite(floatval($discharge))){

		  					$discharge = 'INF';
		  				}

		  				$minusrn = $r->rainten - $scd->rvalue;



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
						"sensor"=> (string)$unkind,
						"powone"=> $r->powone,
						"Avariable"=> $r->Avariable,
						"siteid"=> $r->siteid,
    					"discharge" => (string)$discharge,
    					"secondrn" => $scd->rvalue,
    					"minusdrn" => (string)round($minusrn,2),
    					"kind" => (string)$kind
		  			));

						}//foreach

						} //site id 10

			else if($r->siteid=='11'){

		  					foreach($secondrvaluee as $sce){

		  				$discharge = round(pow($r->powone, $r->Avariable),2);
		  				if(is_nan($discharge)){

		  					$discharge = 'NaN';
		  				}
		  				if(is_infinite(floatval($discharge))){

		  					$discharge = 'INF';
		  				}

		  				$minusrn = $r->rainten - $sce->rvalue;

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
						"sensor"=> (string)$unkind,
						"powone"=> $r->powone,
						"Avariable"=> $r->Avariable,
						"siteid"=> $r->siteid,
    					"discharge" => (string)$discharge,
    					"secondrn" => $sce->rvalue,
    					"minusdrn" => (string)round($minusrn,2),
    					"kind" => (string)$kind
		  			));

						}//foreach

						} //site id 11
		  
					else{
						$discharge = round(pow($r->powone, $r->Avariable),2);
		  				if(is_nan($discharge)){

		  					$discharge = 'NaN';
		  				}
		  				if(is_infinite(floatval($discharge))){

		  					$discharge = 'INF';
		  				}

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
    					"discharge" => (string)$discharge,
    					"kind" => (string)$nokind
    					));
		  		}//else

		}


		
	
		 $jsonified = json_encode($alldata);
		 $jsonfinale = json_decode($jsonified);

     	//dd(json_encode($jsonfinale));
		return view('latest.carousel',compact('jsonfinale'));

			
									}
}
