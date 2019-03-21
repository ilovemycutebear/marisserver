<?php

namespace App\Http\Controllers;


use DB;
use App\site;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\computedlogs;
use Yajra\Datatables\Datatables;
use Khill\Lavacharts\Lavacharts;


class RatingCurveController extends Controller
{
	 public function csv()
    {
    return view('rating.curve');
	}


    public function datetimeratingcurve(Request $request){


    $article = site::find($request -> siteid);
   $article->name = $request->sitename;
   $article->sitelat = $request->sitelat;
   $article->sitelong = $request->sitelong;
   $article->wlalert = $request->wlalert;
   $article->wlalarm = $request->wlalarm;
   $article->wlcritical = $request->wlcritical;
   $article->save();
   return back();
           // SELECT *  FROM `logs` WHERE `radiodate` BETWEEN '2018-12-20' AND '2019-01-22' AND `site_id` LIKE '5';
        }


  public function datetimeselector()
    {
      $siteinfo = site::all();

        return view('rating.curvepcker', compact('siteinfo'));
  }


	 public function parseImport(CsvImportRequest $request)
	{
    $path = $request->file('csv_file')->getRealPath();
    $csv_data = array_map('str_getcsv', file($path));
    $lava = new Lavacharts;

      

    //$lava->LineChart('Popularity', $charth);
    for ($x = (count($csv_data)-1); $x >= 0; $x--) {
     $stge[] = $csv_data[$x][0];
     $dschrge[] =  $csv_data[$x][1];
	}
	//discharge midpoint
	$cnt = (count($dschrge)-1);
	(float)$plusser = (((float)$dschrge[$cnt]-(float)$dschrge[0]) / (count($dschrge)-1));
	//echo $plusser;
	(float)$new = (float)$dschrge[0];
	for ($y = 0; $y <= (count($dschrge)-1); $y++) {

			(float)$new = (float)$new + (float)$plusser; 
     		 
     			$midpoint[$y][0] = $new;
     		     	
		}
	for ($z = 0; $z <= (count($stge)-1); $z++) {
     $midpoint[$z][1] = $stge[$z]; 
 	}
	//return $midpoint;
	$wlcharth = $lava->DataTable();
      $wlcharth->addNumberColumn('Discharge')
              ->addNumberColumn('Stage')
              ->addRows($csv_data);
    //return view('charts.ratingcurve',compact('wlcharth'));
    $lava->LineChart('Stage', $wlcharth, [
    'title' => 'GENERATED RATING CURVE',
     'curveType'          => 'function',
      'hAxis'            => [ 'title' => 'Discharge', 
  						
  							], 
  	  'vAxis'            => [ 'title' => 'Stage', 
  							  
  							], 
  	 //'tooltip'           => ['trigger' => 'none',],
]);
   // return $midpoint;
   return view('charts.ratingcurve',compact('lava'));
	}
	


}
class CsvImportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'csv_file' => 'required|file'
        ];
    }
}
