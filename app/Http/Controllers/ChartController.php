<?php

namespace App\Http\Controllers;

use Khill\Lavacharts\Lavacharts;
use DB;
use App\logs;
use App\User;


use Illuminate\Http\Request;
use App\Http\Requests;

class ChartController extends Controller
{
    //
  public function postChartProcess(Request $requestc){

    $fullDate = $requestc->daterange;

   $splitDate = explode('-',$fullDate, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
    $startDate = $splitDate[0]; 
    $endDate = $splitDate[1];

  $siteInfo = $requestc->sitename;
   $splitInfo = explode('||',$siteInfo, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
    $splitName = $splitInfo[0]; 
    $splitId = $splitInfo[1];

      $data =  DB::Select("SELECT logs.site_id as label, logs.created_at as x, logs.rvalue as y FROM site inner join logs on site.id = logs.site_id where site.id = '".$splitId."' AND logs.created_at between '".$startDate."' and '".$endDate."' order by logs.created_at asc");
      $data = str_replace('label:', 'label:"', $data);
     $data = str_replace(',y:', '",y:', $data);

    return $data;
//select logs.site_id as label, logs.created_at as x, logs.rvalue as y from logs inner join site on site.id = logs.site_id where logs.site_id = 1 and logs.created_at between '2018/12/01' and '2018/12/04' order by logs.created_at asc

  }
    public function postChartProcessLevel(Request $requestd){

    $fullDate = $requestd->daterange;

   $splitDate = explode('-',$fullDate, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
    $startDate = $splitDate[0]; 
    $endDate = $splitDate[1];

  $siteInfo = $requestd->sitename;
   $splitInfo = explode('||',$siteInfo, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
    $splitName = $splitInfo[0]; 
    $splitId = $splitInfo[1];

      $data =  DB::Select("SELECT logs.site_id as label, logs.created_at as x, logs.wlevel as y FROM site inner join logs on site.id = logs.site_id where site.id = '".$splitId."' AND logs.created_at between '".$startDate."' and '".$endDate."' order by logs.created_at asc");
      $data = str_replace('label:', 'label:"', $data);
     $data = str_replace(',y:', '",y:', $data);

    return $data;
//select logs.site_id as label, logs.created_at as x, logs.rvalue as y from logs inner join site on site.id = logs.site_id where logs.site_id = 1 and logs.created_at between '2018/12/01' and '2018/12/04' order by logs.created_at asc

  }
    public function postChartProcessDischarge(Request $requeste){

    $fullDate = $requeste->daterange;

   $splitDate = explode('-',$fullDate, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
    $startDate = $splitDate[0]; 
    $endDate = $splitDate[1];

  $siteInfo = $requeste->sitename;
   $splitInfo = explode('||',$siteInfo, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
    $splitName = $splitInfo[0]; 
    $splitId = $splitInfo[1];

      $hstoricalselect =  DB::Select("SELECT site.name as Site,site.subname as subname, site.pic as pic,site.sitelat as lattitude ,site.sitelong as longtitude,FORMAT(logs.rvalue, 2)as rainten,FORMAT((site.sitelev+20-logs.wlevel),2) as water,logs.created_at as asof,FORMAT(logs.batteryvolt,2) as voltage,logs.wlevel as rawlvl,site.sensortype as sensor, @powa := FORMAT(site.Bconstant*((FORMAT((site.sitelev+20-logs.wlevel),2)-Wlevelzero)),2) as powone,site.Avariable as Avariable, logs.site_id as siteid FROM site INNER JOIN logs on site.id=logs.site_id WHERE site.id='".$splitId."' AND logs.created_at BETWEEN '".$startDate."' AND '".$endDate."'");
      //$data = str_replace('label:', 'label:"', $data);
     //$data = str_replace(',y:', '",y:', $data);

     //SELECT site.name as Site,site.subname as subname, site.pic as pic,site.sitelat as lattitude ,site.sitelong as longtitude,FORMAT(logs.rvalue, 2)as rainten,FORMAT((site.sitelev+20-logs.wlevel),2) as water,logs.created_at as asof,FORMAT(logs.batteryvolt,2) as voltage,logs.wlevel as rawlvl,site.sensortype as sensor, @powa := FORMAT(site.Bconstant*((FORMAT((site.sitelev+20-logs.wlevel),2)-Wlevelzero)),2) as powone,site.Avariable as Avariable, logs.site_id as siteid FROM site INNER JOIN logs on site.id=logs.site_id WHERE site.id='".$splitId."' AND logs.created_at BETWEEN '".$startDate."' AND '".$endDate."'

    //return $data;

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
            "label"=> $r->siteid,
            "x"=> $r->asof,
              "y" => (string)$discharge
            ));
    }
  
     $jsonified = json_encode($alldata);
     $jsonfinale = json_decode($jsonified);

     $historicalparsed = $jsonfinale;
    return $historicalparsed;
//select logs.site_id as label, logs.created_at as x, logs.rvalue as y from logs inner join site on site.id = logs.site_id where logs.site_id = 1 and logs.created_at between '2018/12/01' and '2018/12/04' order by logs.created_at asc

  }
       public function getLaraChart($chartid)
    {
    	$lava = new Lavacharts;

    	$charth = $lava->DataTable();
    	$data =  logs::join('site', 'site.id', '=', 'logs.site_id')
      ->select(DB::raw('logs.created_at as "0",logs.wlevel as "1"'))
      ->where('site_id',$chartids)
      ->orderBy('logs.created_at', 'asc')
     ->take(1000)
      ->get()->toArray();

           // $users = str_replace('{', '[', $users);
            //$users = str_replace('}', ']', $users);
         $charth->addDateTimeColumn('Date/Time')
		          ->addNumberColumn('Rain')
		          ->addRows($data);

		//$lava->LineChart('Popularity', $charth);


        //return view('charts.laracharts',compact('lava'));
		return $charth;
        //->join('logs', 'site.id', '=', 'logs.site_id')
    
        
    }
           public function getwlLaraChart($chartids)
    {
      $lava = new Lavacharts;

      $wlcharth = $lava->DataTable();
      $data = logs::join('site', 'site.id', '=', 'logs.site_id')
      ->select(DB::raw('logs.created_at as "0",logs.wlevel as "1"'))
      ->where('site_id',$chartids)
      ->orderBy('logs.created_at', 'asc')
     ->take(1000)
      ->get()->toArray();

           // $users = str_replace('{', '[', $users);
            //$users = str_replace('}', ']', $users);
         $wlcharth->addDateTimeColumn('Date/Time')
              ->addNumberColumn('Water Level')
              ->addRows($data);

    //$lava->LineChart('Popularity', $charth);


        //return view('charts.laracharts',compact('lava'));
    return $wlcharth;
        //->join('logs', 'site.id', '=', 'logs.site_id')
    
        
    }
}
