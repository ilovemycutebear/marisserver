<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use App\logs;
use App\site;
use App\computedlogs;
use App\tblcompare;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\Datatables\Datatables;


class historicalController extends Controller
{



public function wlgetsitedata(){
		$result = DB::select("SELECT site.name as Site, site.id as site_id FROM site WHERE (site.sensortype = 1 OR site.sensortype = 3)");


	$parsed['data'] = $result;
		
		return $parsed;
		

				}


public function rngetsitedata(){
		$result = DB::select("SELECT site.name as Site, site.id as site_id FROM site WHERE (site.sensortype = 2 OR site.sensortype = 3)");


	$parsed['data'] = $result;
		
		return $parsed;
		

				}


public function hstry(){
		
		$siteinfo = DB::select("SELECT site.name, site.id FROM site WHERE site.sensortype = 1");

        return view('datatables.historicalpick', compact('siteinfo'));

				}
				public function hstrywlevel(){
		
		$siteinfowlevel = DB::select("SELECT site.name, site.id FROM site WHERE site.sensortype = 2");

        return view('datatables.historicalpickwlevel', compact('siteinfowlevel'));

				}
				public function hstrycombo(){
		
		$siteinfocombo =  DB::select("SELECT site.name, site.id FROM site WHERE site.sensortype = 3");

        return view('datatables.historicalpickcombo', compact('siteinfocombo'));

				}
    public function showhstry(Request $requestb){

   $fullDate = $requestb->daterange;

   $splitDate = explode('-',$fullDate, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
  	$startDate = $splitDate[0]; 
  	$endDate = $splitDate[1];

  $siteInfo = $requestb->sitename;
   $splitInfo = explode('||',$siteInfo, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
  	$splitName = $splitInfo[0]; 
  	$splitId = $splitInfo[1];

   			
    $hstoricalselect = DB::Select("SELECT site.name as Site,site.subname as subname, site.pic as pic,site.sitelat as lattitude ,site.sitelong as longtitude,FORMAT(logs.rvalue, 2)as rainten,FORMAT((site.sitelev+20-logs.wlevel),2) as water,logs.created_at as asof,FORMAT(logs.batteryvolt,2) as voltage,logs.wlevel as rawlvl,site.sensortype as sensor, @powa := FORMAT(site.Bconstant*((FORMAT((site.sitelev+20-logs.wlevel),2)-Wlevelzero)),2) as powone,site.Avariable as Avariable, logs.site_id as siteid FROM site INNER JOIN logs on site.id=logs.site_id WHERE site.id='".$splitId."' AND logs.created_at BETWEEN '".$startDate."' AND '".$endDate."'");

   // $historicalparsed['data'] = $hstoricalselect;

   	//return $historicalparsed;

   	$alldata = array();
		  foreach($hstoricalselect as $r){
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
						"rawlvl"=>$r->rawlvl,
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

		 $historicalparsed['data'] = $jsonfinale;
		return $historicalparsed;
  
        }
}
