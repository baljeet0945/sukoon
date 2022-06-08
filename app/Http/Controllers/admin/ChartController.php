<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expen;

class ChartController extends Controller
{
    public function Graphchart()
    {
        $api = url('/chart-line-ajax');
   
        $chart = new UserChart;
        $chart->labels(['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'])->load($api);
          
        return view('chartLine', compact('chart'));
    }

    public function chartLineAjax(Request $request)
    {
        $year = $request->has('date') ? $request->year : date('D');
        $users = Expen::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $year)
                    ->groupBy(\DB::raw("Date(created_at)"))
                    ->pluck('count');
  
        $chart = new UserChart;
  
        $chart->dataset('New User Register Chart', 'line', $users)->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);
  
        return $chart->api();
    }

    
}
