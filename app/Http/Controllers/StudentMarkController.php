<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentMark;
use App\Http\Requests;
use App\Http\Requests\StudentMarkRequest;
use App\Http\Controllers\Controller;
use DataTables;
use Carbon\Carbon;

class StudentMarkController extends Controller
{

    public function show(Request $request)

    {

        if ($request->ajax()) {


            $items = StudentMark::with(['getStudent'])
            ->select('*')->orderBy('id', 'ASC');

            return Datatables::of($items)
                ->addColumn('id',function($item){
                    return $item->id;
                }) 
                ->addColumn('student_id',function($item){
                    return $item->getStudent->name;
                })                                
                ->addColumn('subject1',function($item){
                    return $item->subject1;
                })
                ->addColumn('subject2',function($item){
                    return $item->subject1;
                })
                ->addColumn('subject3',function($item){
                    return $item->subject2;
                })
                ->addColumn('term',function($item){
                    return $item->term;
                })
                ->addColumn('total_marks',function($item){
                    return $item->total_marks;
                })
                ->addColumn('created_at', function ($item) {
                    return $item->created_at ? with(new Carbon($item->created_at))->format('M d, Y h:i A') : '';
                })
                ->addColumn('actions', function($row){

                    $btn = "<a href='".route('studentMarkEdit',$row->id)."' class='btn btn-primary'>Edit</a>";
                    $btn .= '<form action='.route("studentMarkDelete", $row->id).' method="POST">

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


        return view('studentmarks.show');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentMarks = StudentMark::where([
                            'deleted_at' => NULL,
                        ])
                        ->orderBy('id', 'ASC')
                        ->get();

        return view('studentmarks.index', compact('studentMarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['studentList'] = Student::where('deleted_at', NULL)->orderBy('name')->get();
        $data['terms'] = ['One'=>'One','Two'=>'Two'];
        return view('studentmarks.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentMarkRequest $request)
    {

        if($found = StudentMark::where('term', $request->get('term'))->where('student_id', $request->get('student_id'))->count())
        {

            return redirect()->back()->with('message','Marks already saved for this term!');
        }
        else
        {
            $studentMarks = new StudentMark([
                'student_id' => $request->get('student_id'),
                'subject1' => $request->get('subject1'),
                'subject2' => $request->get('subject2'),
                'subject3' => $request->get('subject3'),
                'term' => $request->get('term'),
                'total_marks' => $request->get('subject1')+$request->get('subject2')+$request->get('subject3')
            ]);
            $studentMarks->save();
            return redirect('/studentMark/list')->with('success', 'Marks saved!');
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['studentMarks'] = StudentMark::find($id);
        $data['studentList'] = Student::where('deleted_at', NULL)->orderBy('name')->get();
        $data['terms'] = ['One'=>'One','Two'=>'Two'];
        return view('studentmarks.edit',$data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentMarkRequest $request, $id)
    {

        $studentMarks = StudentMark::find($id);
        $studentMarks->subject1 =  $request->get('subject1');
        $studentMarks->subject2 = $request->get('subject2');
        $studentMarks->subject3 = $request->get('subject3');
        $studentMarks->term = $request->get('term');
        $studentMarks->total_marks = $request->get('subject1')+$request->get('subject2')+$request->get('subject3');
        $studentMarks->save();

        return redirect('/studentMark/list')->with('success', 'Marks updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentMarks = StudentMark::find($id);
        $studentMarks->delete();

        return redirect('/studentMark/list')->with('success', 'Marks deleted!');
    }
}
