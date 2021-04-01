<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Http\Requests;
use App\Http\Requests\StudentRequest;
use App\Http\Controllers\Controller;
use DataTables;

class StudentController extends Controller
{

    public function show(Request $request)

    {

        if ($request->ajax()) {


            $items = Student::select('*')
                    ->where([
                        'deleted_at' => NULL,
                    ])
                    ->orderBy('id', 'ASC');

            return Datatables::of($items)
                ->addColumn('id',function($item){
                    return $item->id;
                }) 
                ->addColumn('name',function($item){
                    return $item->name;
                })                                
                ->addColumn('age',function($item){
                    return $item->age;
                })
                ->addColumn('gender',function($item){
                    return $item->gender;
                })
                ->addColumn('reporting_teacher',function($item){
                    return Teacher::where(['id' => $item->reporting_teacher])->pluck('name')->first();
                })

                ->filterColumn('name', function ($query, $keyword) {
                    $sql = "name  like ?";
                    $query->whereRaw($sql, ["%$keyword%"]);
                })
                ->addColumn('actions', function($row){

                    $btn = "<a href='".route('studentEdit',$row->id)."' class='btn btn-primary'>Edit</a>";
                    $btn .= '<form action='.route("studentDelete", $row->id).' method="POST">

                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="delete btn btn-danger"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                         >Delete</button>
                    </form>';
                return $btn;

                })
                ->rawColumns(['actions'])

                ->make(true);

        }


        return view('students.show');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['students'] = Student::where([
                                'deleted_at' => NULL,
                            ])
                            ->orderBy('id', 'ASC')
                            ->get();


        return view('students.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['teachers'] = Teacher::orderBy('name', 'ASC')
                            ->get();
        return view('students.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {

        $student = new Student([
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender'),
            'reporting_teacher' => $request->get('reporting_teacher'),
        ]);
        $student->save();
        return redirect('/')->with('success', 'Student saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['student'] = Student::find($id);
        $data['teachers'] = Teacher::orderBy('name', 'ASC')
                            ->get();
        return view('students.edit', $data);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {

        $student = Student::find($id);
        $student->name =  $request->get('name');
        $student->age = $request->get('age');
        $student->gender = $request->get('gender');
        $student->reporting_teacher = $request->get('reporting_teacher');
        $student->save();

        return redirect('/')->with('success', 'student updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/')->with('success', 'student deleted!');
    }
}
