<?php

namespace App\Http\Controllers;

use App\Department;
use App\Doc;
use App\DocumentCode;
use App\Department_User;
use App\DepartmentUser;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;
use PhpParser\Node\Expr\AssignOp\Concat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deptId = Auth::user()->department_id;
        $levelId = Auth::user()->level;
        $userId = Auth::user()->id;
        if ($levelId == 'Super Admin'){
            $docs = Doc::orderBy('id','desc')->get();
        }
        else if ($levelId == 'Admin') {
            $docs = Doc::leftJoin('departments', 'departments.code', 'docs.department')
            ->leftJoin('department_user', 'department_user.department_id', 'departments.id')
            ->select(
                'docs.*')
            ->where('department_user.user_id', '=', $userId)->orderBy('id','desc')->get();
            // ->where('departments.id', '=', $deptId)->get();
        }
        else if ($levelId == 'User') {
            $docs = Doc::leftJoin('departments', 'departments.code', 'docs.department')
            ->leftJoin('users', 'users.id', 'docs.requestor_id')
            ->leftJoin('department_user', 'department_user.department_id', 'departments.id')
            ->select(
                'docs.*')
            ->where('department_user.user_id', '=', $userId)
            // ->where('departments.id', '=', $deptId)
            ->where('users.id', '=',  $userId)->orderBy('id','desc')->get();
        }
        
        return view('surat.index') ->with('docs', $docs);
    }

    public function hitung_messages()
    {
        $count = DB::table('docs')->count()->get();
        return view('home')->with(compact('count', $count));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doccodes = DocumentCode::all();
        $userId = Auth::user()->id;
        $depts = Department::leftJoin('department_user', 'department_user.department_id', 'departments.id')
        ->select('departments.*')
        ->where('department_user.user_id', '=' , $userId)->get();
        // dd($userId);
        return view('surat.create')->with(compact('doccodes','depts'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        function convertRoman($num){
            $n = intval($num);
            $res = '';
    
            //array of roman numbers
            $romNumber_Array = array(
                'M' => 1000,
                'CM' => 900,
                'D' => 500,
                'CD' => 400,
                'C' => 100,
                'XC' => 90,
                'L' => 50,
                'XL' => 40,
                'X' => 10,
                'IX' => 9,
                'V' => 5,
                'IV' => 4,
                'I' => 1
            );
    
            foreach($romNumber_Array as $roman => $number){
                $matches = intval($n / $number);
    
                $res .= str_repeat($roman, $matches);
    
                $n = $n % $number;
            }
    
            return $res;
        }

        $date = Carbon::parse($request->req_date);
        // $department = $request->department;
        // ->where('department', $department)
        $addNol = '';
        if ($noUrutAkhir = Doc::select(DB::raw('max(no_surat) as max_surat'))->whereMonth('req_date', $date->month)->whereYear('req_date', $date->year)->first()){
            $noUrutAkhir = (int)$noUrutAkhir->max_surat + 1;
        } else {
            $noUrutAkhir = 1;
        }

        if (strlen($noUrutAkhir) == 1) {
    		$addNol = "00";
    	} elseif (strlen($noUrutAkhir) == 2) {
    		$addNol = "0";
        } 

        
        $kodeBaru = $addNol.$noUrutAkhir;

        $doc = new Doc;
        $doc->requestor = Auth::user()->name;
        $doc->requestor_id = Auth::user()->id;
        $doc->req_date = $request->req_date;
        $doc->doc_type = $request->doc_type;
        $doc->department = $request->department;
        // $doc->nomor = $noUrutAkhir;
        $doc->no_surat = $kodeBaru.'.'.$request->doc_type.'/'.$request->department.'/'.convertRoman(substr($request->req_date,5,2)).'/'.substr($request->req_date, 0,4);
        $doc->notes = $request->notes;
        $doc->save();

        return redirect('/surat')->with('success', 'Generate new document is successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doc = Doc::findOrFail($id);
        return view('surat.show') ->with('doc', $doc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}