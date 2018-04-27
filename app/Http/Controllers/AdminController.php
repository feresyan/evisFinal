<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViolationList as Vl;
use App\SanctionList as San;
use App\EmployeeViolation as Ev;
use App\EmployeeSanction as Es;
use App\EmployeeLayoffs as El;
use App\Employee;
use App\Department;
use App\Counter;
use DB;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}

    // --- VIOLATION ---

    public function adminDashboard(){
    	return view('admin.dashboard');
    }

    public function indexViolation(){
    	$violations = Vl::all();
    	return view('admin.indexViolation',compact('violations'));
    }

    public function showViolation($id){
        $violation = Vl::find($id);
        return view('admin.showViolation',compact('violation'));
    }

    public function createViolationList(){
    	return view('admin.createViolationList');
    }

    public function storeViolationList(Request $request){

        $this->validate(request(),[
            'violationName' => 'required',
        ]);

    	Vl::create([
    		'violation_name' => $request->violationName,
    		'violation_category' => $request->violationCategory,
    	]);

    	return redirect(route('violation.index'));
    }

    public function editViolationList($id)
    {
    	$violation = Vl::find($id);

    	return view('admin.editViolationList', compact('violation'));
    }

    public function updateViolationList(Request $request)
    {
    	Vl::find($request->id)->update([
    		'violation_name' => $request->violationName,
    		'violation_category' => $request->violationCategory,
    	]);

    	return redirect(route('violation.index'));
    }

    public function destroyViolationList($id)
    {
        $violation = Vl::find($id);
        $violation->delete();
        return redirect(route('violation.index'));
    }

    // --- SANCTION ---
    public function indexSanction(){
        $sanctions = San::all();
        return view('admin.indexSanction',compact('sanctions'));
    }

    public function showSanction($id){
        $sanction = San::find($id);
        return view('admin.showSanction',compact('sanction'));
    }

    public function createSanctionList(){
        return view('admin.createSanctionList');
    }

    public function storeSanctionList(Request $request){

        $this->validate(request(),[
            'sanctionName' => 'required',
        ]);

        San::create([
            'sanction_name' => $request->sanctionName,
            'sanction_level' => $request->sanctionLevel,
        ]);

        return redirect(route('sanction.index'));
    }

    public function editSanctionList($id)
    {
        $sanction = San::find($id);

        return view('admin.editSanctionList', compact('sanction'));
    }

    public function updateSanctionList(Request $request)
    {
        San::find($request->id)->update([
            'sanction_name' => $request->sanctionName,
            'sanction_level' => $request->sanctionLevel,
        ]);

        return redirect(route('sanction.index'));
    }

    public function destroySanctionList($id)
    {
        $sanction = San::find($id);
        $sanction->delete();
        return redirect(route('sanction.index'));
    }

    // --- EMPLOYEE VIOLATION ---

    public function indexEmployeeViolation()
    {
        $employees= Employee::all();        
        $violationList = Vl::all();
        return view('admin.employeeViolation.indexEmployeeViolation',compact('employees','violationList'));
    }

    public function createEmployeeViolation()
    {
        $departments = Department::all();
        $violations = Vl::all();
        return view('admin.employeeViolation.createEmployeeViolation',compact('departments','violations'));
    }

    public function findEmployeeName(Request $request)
    {
        $data = Employee::where('department_id',$request->id)->get();

        return response()->json($data);
    }

    public function storeEmployeeViolation(Request $request)
    {
        $date = date("Y-m-d", strtotime($request->date));
        $employeeViolation = Ev::create([
            'employee_id' => $request->employeeId,
            'violation_id' => $request->violationId,
            'violation_date' => $date,
        ]);

        $violation = Vl::where('id',$request->violationId)->get()->first();
        $sanctions = San::all();
        $counter = Counter::where('employee_id',$request->employeeId)->get()->first();

        if ($counter != null) 
        {
            if ($violation->violation_category == 'Ringan') 
            {
                $counter->ringan = $counter->ringan+1;
                if ($counter->ringan >= 3) 
                {
                    $id = San::where('id',1)->value('id');
                    Es::create([
                       'employee_id' => $request->employeeId,
                       'employee_violation_id' => $employeeViolation->id,
                       'sanction_id' => $id,
                       'status' => 'Tertunda', 
                    ]);

                    Counter::find($counter->id)->update([
                        'ringan' => 0,
                    ]);
                }
                else 
                {
                    Counter::find($counter->id)->update([
                        'ringan' => $counter->ringan,
                    ]);
                }
            }
            elseif ($violation->violation_category == 'Sedang') 
            {
                $counter->sedang = $counter->sedang+1;
                if ($counter->sedang >= 3) 
                {
                    $id = San::where('id',2)->value('id');
                    Es::create([
                       'employee_id' => $request->employeeId,
                       'employee_violation_id' => $employeeViolation->id,
                       'sanction_id' => $id,
                       'status' => 'tertunda', 
                    ]);

                    Counter::find($counter->id)->update([
                        'sedang' => 0,
                    ]);
                }
                else 
                {
                    Counter::find($counter->id)->update([
                        'sedang' => $counter->sedang,
                    ]);
                }
            }
            else
            {
                $counter->berat = $counter->berat+1;
                if ($counter->berat >= 3) 
                {
                    $id = San::where('id',3)->value('id');
                    $sanction = Es::create([
                       'employee_id' => $request->employeeId,
                       'employee_violation_id' => $employeeViolation->id,
                       'sanction_id' => $id,
                       'status' => 'tertunda', 
                    ]);

                    // El::create([
                    //     'employee_id' => $request->employeeId,
                    //     'employee_sanction_id' => $sanction->id,
                    //     'layoffs_date' => Carbon::now(),
                    //     'reason' => 'Melakukan pelanggaran berat sebanyak 3 kali',
                    // ]);

                    Counter::find($counter->id)->update([
                        'berat' => 0,
                    ]);
                }
                else 
                {
                    Counter::find($counter->id)->update([
                        'berat' => $counter->berat,
                    ]);
                }
            }
        }
        else 
        {
            if ($violation->violation_category == 'Ringan') 
            {
                Counter::create([
                    'employee_id' => $request->employeeId,
                    'ringan' => 1,
                    'sedang' => 0,
                    'berat' => 0,
                ]);
            }
            elseif ($violation->violation_category == 'Sedang') 
            {
                Counter::create([
                    'employee_id' => $request->employeeId,
                    'ringan' => 0,
                    'sedang' => 1,
                    'berat' => 0,
                ]);  
            }
            else
            {
                Counter::create([
                    'employee_id' => $request->employeeId,
                    'ringan' => 0,
                    'sedang' => 0,
                    'berat' => 1,
                ]);
            }
        }
        // dd('berhasil');
        return redirect(route('employee.violation.index'));
    }

    public function showEmployeeViolation($id)
    {
        $employeeViolation = Ev::find($id);
        $violation = Vl::where('id',$employeeViolation->violation_id)->get();
        return view('admin.employeeViolation.showEmployeeViolation',compact('employeeViolation','violation'));
    }

    // public function editEmployeeViolation($id)
    // {
    //    $employeeViolation = Ev::find($id);
    //    $employee = Employee::where('id',$employeeViolation->employee_id)->get();
    //    return view('admin.employeeViolation.editEmployeeViolation',compact('employeeViolation','employee'));
    // }

    public function destroyEmployeeViolation($id)
    {
        $employeeViolation = Ev::find($id);
        $employeeViolation->delete();
        return redirect(route('employee.violation.index'));
    }

    // --- EMPLOYEE SANCTION ---

    public function indexEmployeeSanction()
    {
        $datas = DB::table('employee_sanction')
            ->join('employee_violation','employee_sanction.employee_violation_id','=','employee_violation.id')
            ->join('violations','employee_violation.violation_id','=','violations.id')
            ->join('employees','employee_sanction.employee_id','=','employees.id')
            ->join('sanctions','employee_sanction.sanction_id','=','sanctions.id')
            ->select('employee_sanction.id','employee_sanction.created_at','employee_sanction.status','violations.violation_category','employees.first_name','employees.last_name','sanctions.sanction_name')
            ->get();
        // dd($datas);
        return view('admin.employeeSanction.indexEmployeeSanction',compact('datas'));
    }

    // public function showEmployeeSanction($id)
    // {
    //     $datas = DB::table('employee_sanction')
    //         ->join('employee_violation','employee_sanction.employee_violation_id','=','employee_violation.id')
    //         ->join('violations','employee_violation.violation_id','=','violations.id')
    //         ->join('employees','employee_sanction.employee_id','=','employees.id')
    //         ->join('sanctions','employee_sanction.sanction_id','=','sanctions.id')
    //         ->select('employee_sanction.id','employee_sanction.created_at','employee_sanction.status','violations.violation_name','employees.first_name','employees.last_name','sanctions.sanction_name')
    //         ->get();

    //     foreach ($datas as $data) 
    //     {
    //         if($data->id == $id)
    //         {
    //             $hasil = $data;
    //         }
    //     }

        // return view('admin.employeeSanction.showEmployeeSanction',compact('hasil'));
    // }

    // public function createEmployeeSanction()
    // {
    //     $departments = Department::all();
    //     $employeeViolations = Ev::all();
    //     return view('admin.employeeSanction.createEmployeeSanction',compact('departments','employeeViolations')); 
    // }


    // public function destroyEmployeeSanction($id)
    // {
    //     $employeeSanction = Es::find($id);
    //     $employeeSanction->delete();
    //     return redirect(route('employee.sanction.index'));
    // }

    // --- EMPLOYEE LAYOFFS ---

    public function indexEmployeeLayoffs()
    {
        $datas = DB::table('employee_layoffs')
            ->join('employee_sanction','employee_layoffs.employee_sanction_id','=','employee_sanction.id')
            ->join('employees','employee_layoffs.employee_id','=','employees.id')
            ->join('sanctions','employee_sanction.sanction_id','=','sanctions.id')
            ->select('employee_layoffs.id','employee_layoffs.layoffs_date','employee_layoffs.reason','employees.first_name','employees.last_name','sanctions.sanction_name','employee_sanction.status')
            ->get();
        return view('admin.employeeLayoffs.indexEmployeeLayoffs',compact('datas'));
    }
}
