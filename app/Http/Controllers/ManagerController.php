<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeSanction as Es;
use App\EmployeeLayoffs as El;
use Carbon\Carbon;
use DB;

class ManagerController extends Controller
{
    public function __construct(){
    	$this->middleware('manager');
    }

    public function managerDashboard(){
    	return view('manager.dashboard');
    }

    public function indexEmployeeViolation()
    {
        $datas = DB::table('employee_violation')
            ->join('violations','employee_violation.violation_id','=','violations.id')
            ->join('employees','employee_violation.employee_id','=','employees.id')
            ->select('employee_violation.id','employee_violation.created_at','violations.violation_category','violations.violation_name','employees.first_name','employees.last_name')
            ->get();

        return view('manager.indexEmployeeViolation',compact('datas'));
    }

    public function indexEmployeeSanction()
    {
        $datas = DB::table('employee_sanction')
            ->join('employee_violation','employee_sanction.employee_violation_id','=','employee_violation.id')
            ->join('violations','employee_violation.violation_id','=','violations.id')
            ->join('employees','employee_sanction.employee_id','=','employees.id')
            ->join('sanctions','employee_sanction.sanction_id','=','sanctions.id')
            ->select('employee_sanction.id','employee_sanction.created_at','employee_sanction.status','violations.violation_category','employees.first_name','employees.last_name','sanctions.sanction_name','employee_sanction.sanction_id')
            ->get();
        return view('manager.indexEmployeeSanction',compact('datas'));
    }

    public function accSanctionEmployee($id)
    {

    	$sanction = Es::where('id',$id)->get()->first();
    	// dd($sanction);
    	if ($sanction->sanction_id != 3) 
    	{
	    	Es::find($sanction->id)->update([
    			'status' => 'Disetujui',
    		]);
    	}
    	else 
    	{
	    	Es::find($sanction->id)->update([
    			'status' => 'Disetujui',
    		]);

	        El::create([
	            'employee_id' => $sanction->employee_id,
	            'employee_sanction_id' => $sanction->id,
	            'layoffs_date' => Carbon::now(),
	            'reason' => 'Melakukan pelanggaran berat sebanyak 3 kali',
	        ]);
    	}

    	return redirect()->back();
    }

    public function indexEmployeeLayoffs()
    {
        $datas = DB::table('employee_layoffs')
            ->join('employee_sanction','employee_layoffs.employee_sanction_id','=','employee_sanction.id')
            ->join('employees','employee_layoffs.employee_id','=','employees.id')
            ->join('sanctions','employee_sanction.sanction_id','=','sanctions.id')
            ->select('employee_layoffs.id','employee_layoffs.layoffs_date','employee_sanction.status','sanctions.sanction_name','employees.first_name','employees.last_name','employee_layoffs.reason')
            ->get();
        return view('manager.indexEmployeeLayoffs',compact('datas'));
    }
}
