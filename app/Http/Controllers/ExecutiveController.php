<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeViolation as Ev;
use App\EmployeeSanction as Es;
use App\Employeelayoffs as El;
use App\ViolationList;
use Charts;
use DB;

class ExecutiveController extends Controller 
{
    public function __construct()
    {
    	$this->middleware('executive');
    }

    public function executiveDashboard()
    {
    	return view('executive.dashboard');
    }

    public function indexEmployeeViolation()
    {
        $datas = DB::table('employee_violation')
            ->join('violations','employee_violation.violation_id','=','violations.id')
            ->select('violations.*','employee_violation.id')
            ->get();

        $jumRingan = 0;
        $jumSedang = 0;
        $jumBerat = 0;
        $violation[0] = 0;
        $violation[1] = 0;
        $violation[2] = 0;

        foreach ($datas as $data) {
            if($data->violation_category == 'Ringan')
            {
                $jumRingan = $jumRingan+1;
                $violation[0] = $jumRingan;
            }
            elseif($data->violation_category == 'Sedang')
            {
                $jumSedang = $jumSedang+1;
                $violation[1] = $jumSedang;
            }
            else
            {
                $jumBerat = $jumBerat+1;
                $violation[2] = $jumBerat;
            }
        }

        $chart3 = Charts::create('bar', 'fusioncharts')
                    ->title('Pelanggaran Pegawai Berdasarkan Kategori')
                    ->legend(false)
                    ->elementlabel('Total Pelanggaran')
                    ->labels(['Ringan', 'Sedang', 'Berat'])
                    ->values([$violation[0],$violation[1],$violation[2]])
                    ->colors(['#FF6384','#36A2EB','#ffce56'])
                    ->dimensions(1000,400);
        

        $datas = DB::table('employee_violation')
            ->join('violations','employee_violation.violation_id','=','violations.id')
            ->select('violations.*','employee_violation.id')
            ->get();

        $chart = Charts::database($datas, 'bar', 'fusioncharts')
                  ->title("Pelanggaran Pegawai")
                  ->elementLabel("Jumlah Karyawan")
                  ->dimensions(1000, 400)
                  ->responsive(false)
                  ->groupBy('violation_name');
                  // ->labels($nama);

        $violation = Ev::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
            ->get();

        $chart2 = Charts::database($violation, 'bar', 'fusioncharts')
                  ->title("Pelanggaran Pegawai Berdasarkan Bulan")
                  ->elementLabel("Total Pelanggaran")
                  ->dimensions(1000, 400)
                  ->responsive(false)
                  ->groupByMonth(date('Y'), true);

        return view('executive.indexEmployeeViolation',compact('chart','chart2','chart3'));

    }


    public function indexEmployeeSanction()
    {
        $sanction = Es::where([
            [DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y')],
            ['status','Disetujui'],
            ])->get();

        $chart = Charts::database($sanction, 'bar', 'fusioncharts')
                  ->title("Sanksi Pegawai Berdasarkan Bulan")
                  ->elementLabel("Total Sanksi")
                  ->dimensions(1000, 400)
                  ->responsive(false)
                  ->groupByMonth(date('Y'), true);

        $datas = DB::table('employee_sanction')
            ->join('sanctions','employee_sanction.sanction_id','=','sanctions.id')
            ->select('sanctions.*','employee_sanction.id')
            ->where('status','Disetujui')
            ->get();

        // dd($datas);
        $chart2 = Charts::database($datas, 'bar', 'fusioncharts')
                  ->title("Sanksi Pegawai ")
                  ->elementLabel("Jumlah Pegawai")
                  // ->backgroundColor()
                  ->dimensions(1000, 400)
                  ->responsive(false)
                  ->groupBy('sanction_level');

        return view('executive.indexEmployeeSanction',compact('chart','chart2'));
    }

    public function indexEmployeeLayoffs()
    {
        $layoffs = El::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
            ->get();

        $chart = Charts::database($layoffs, 'bar', 'fusioncharts')
                  ->title("Total Pegawai yang di PHK")
                  ->elementLabel("Jumlah Pegawai")
                  ->dimensions(1000, 400)
                  ->responsive(false)
                  ->groupByMonth(date('Y'), true);
        return view('executive.indexEmployeeLayoffs',compact('chart'));
    }
}
