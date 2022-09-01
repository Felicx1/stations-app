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
        
       
    $stations = DB::connection('recordings-db')->table('recordings')->select('station_name', 'station_code', 'processed', 'country', 'stationdate', DB::raw('count(*) as stations'))->groupBy('station_name', 'stationdate')->orderBy('station_name', 'asc')->orderBy('stationdate', 'desc')->paginate(10); 
     return view('admin.stations.index', compact('stations'));
    
    }
     
    public function search(Request $request){
    
        $output="";

        $stations = DB::connection('recordings-db')->table('recordings')
         ->where('station_name','like','%'.$request->search.'%')
        // ->orWhere('country','like','%'.$request->search.'%')
         ->get();
 
       foreach($stations as $stations)
        
       {
        $output.=

        '<tr>
        
        <td> '.$stations->station_name.'  </td>
        <td> '.$stations->station_code.'  </td>
        <td> '.$stations->country.'  </td>
        <td> '.$stations->stationdate.'  </td>
        <td> '.$stations->stations.'  </td>
        <td> 
        '.' 
        
        <a href="#_" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white">'.'View</a>
        <a href="#_" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white">'.'Refresh/Restore</a>
        
        '.' </td>
        


        </tr>';
       }

       return response($output);

      }

    }

    
    





