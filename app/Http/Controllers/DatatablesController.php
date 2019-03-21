<?php

namespace App\Http\Controllers;


use DB;
use App\site;
use Illuminate\Http\Request;
use App\User;
use App\computedlogs;
use App\Http\Requests;
use Yajra\Datatables\Datatables;

use Carbon\Carbon;


class DatatablesController extends Controller
{
 
   
    public function index()
    {
        return view('datatables.index');
    }

   /* public function data()

    {
    	
        return Datatables::of(\App\site::all())
        	->make(true);
    }*/
    protected function values()
    {
        $siteinfo = site::all();
        //DB::table('logs')->get();

        //php artisan make: model tblname(no query needed)

        return view('popup.sitelisttbl', compact('siteinfo'));
    }
   protected function data(){


    		$users = DB::table('site')
            ->join('logs', 'site.id', '=', 'logs.site_id')
            ->select('site.name','logs.radiodate','logs.radiotime','logs.batteryvolt','logs.wlevel-site.sitelev as wlevel','logs.rvalue')
           
            ->get();

            return Datatables::of($users)
        	->make(true);  

   //   ->where('logs.site_id',)
        	//return $dtable;

        	//return view('datatables.index',compact('dtable'));      	
        }
        protected function datafl($siteid){
            $users = DB::table('logs')
            ->join('site', 'site.id', '=', 'logs.site_id')
            ->select(DB::raw('logs.wlevel-site.sitelev as wlevel,site.name,logs.created_at,logs.batteryvolt,logs.rvalue'))
            ->where('logs.site_id',$siteid)->orderBy('logs.created_at','DESC')
            ->get();
            return  Datatables::of($users)->editColumn('rvalue', function($user){
                if($user->rvalue > 0){
                    return "<div class='alert-success text-center'>".$user->rvalue."</div>";
                }
                elseif($user->rvalue <= 0){
                    return "<div class='alert-info text-center'>".$user->rvalue."</div>";
                };
            })->editColumn('wlevel', function($water){
                
                    return "<div class='alert-info text-center'>".$water->wlevel."</div>";
            })
            ->make(true); 
            
        
        }
    protected function wldatafl($siteid){
            $users = DB::table('computedlogs')
            ->join('site', 'site.id', '=', 'computedlogs.site_id')
            ->select(DB::raw('computedlogs.wlevel-site.sitelev as wlevel,site.name,computedlogs.created_at,computedlogs.batteryvolt,computedlogs.rvalue'))
            ->where('computedlogs.site_id',$siteid)->orderBy('computedlogs.created_at','DESC')
            ->get();
            return  Datatables::of($users)->editColumn('rvalue', function($user){
                if($user->rvalue > 0){
                    return "<div class='alert-success text-center'>".$user->rvalue."</div>";
                }
                elseif($user->rvalue <= 0){
                    return "<div class='alert-info text-center'>".$user->rvalue."</div>";
                };
            })->editColumn('wlevel', function($water){
                
                    return "<div class='alert-info text-center'>".$water->wlevel."</div>";
            })
            ->make(true); 
            
        
        }
        
        public function editalerts(){

             return view('datatables.editalerts');
        }
        public function editalertsdata(){
             

              $users = site::all();

   

            return Datatables::of($users)
            ->make(true);  
        }
        public function updatealerts(Request $request){


    $article = site::find($request -> siteid);
   $article->name = $request->sitename;
   $article->subname = $request->subname;
   $article->sitelat = $request->sitelat;
   $article->sitelong = $request->sitelong;
   $article->sitelev = $request->sitelev;
   $article->sensortype = $request->sensortype;
   $article->wlalert = $request->wlalert;
   $article->wlalarm = $request->wlalarm;
   $article->wlcritical = $request->wlcritical;
   $article->created_at = Carbon::now();
   $article->updated_at =  Carbon::now();
   $article->pic = $request->pic;
   $article->Bconstant = $request->Bconstant;
   $article->Wlevelzero = $request->Wlevelzero;
   $article->Avariable = $request->Avariable;
   $article->save();
   return back();

   //return $article;

        }
    
        public function AddSite(Request $requesta){
            $site = new site();
            $site->id  = null;
            $site->name = $requesta->sitename;
            $site->subname = $requesta->subname;
            $site->sitelat = $requesta->sitelat;
            $site->sitelong = $requesta->sitelong;
            $site->sitelev = $requesta->sitelev;
            $site->sensortype = $requesta->sensortype;
            $site->wlalert = $requesta->wlalert;
            $site->wlalarm = $requesta->wlalarm;
            $site->wlcritical = $requesta->wlcritical;
            $site->created_at = Carbon::now();
            $site->updated_at =  Carbon::now();
            $site->pic = $requesta->pic;
            $site->Bconstant = $requesta->Bconstant;
            $site->Wlevelzero = $requesta->Wlevelzero;
            $site->Avariable = $requesta->Avariable;
            $site->save();
                return back();
        }
  public function AddSiteView()
    {
        return view('datatables.addsitedata');
    }
    public function AddrawData(Request $requestb){
             return $requestb->all();
        }
  public function AddrawDataView()
    {
        return view('datatables.addrawdata');
    }

}