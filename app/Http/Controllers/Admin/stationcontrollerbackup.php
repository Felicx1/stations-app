<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StationStoreRequest;
use App\Models\Station;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class StationController extends Controller
{

    public function index(Request $request) {
        
       
    $stations = DB::connection('recordings-db')->table('recordings')->select('station_name', 'station_code', 'processed', 'country', 'stationdate', DB::raw('count(*) as stations'))->groupBy('station_name')->orderBy('station_name', 'asc')->paginate(10); 
     return view('admin.stations.index', compact('stations'));
    
    }
     
    public function search(Request $request){

        $stations = DB::connection('recordings-db')->table('recordings')
         ->where('station_name','like','%'.$request->search.'%')->select('station_name', 'station_code', 'processed', 'country', 'stationdate', DB::raw('count(*) as stations'))->groupBy('station_name')->orderBy('station_name', 'asc')->paginate(10); 
 


        return view('admin.stations.index', compact('stations'));

    }

    
    }





