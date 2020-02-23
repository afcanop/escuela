<?php

namespace App\Http\Controllers\academic;

use App\course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $student = student::where('name', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->orWhere('NumberIdentification', 'LIKE', "%$keyword%")
                ->orWhere('TypeIdentification', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $student = student::latest()->paginate($perPage);
        }

        return view('academic.student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $curso = $id;
        return view('academic.student.create', compact(
            'curso'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();

        $student= student::create($requestData);
        $curse = course::find($id);
        $curse->studens()->attach($student);
        return redirect()->route('courses.show', $curse->id)->with('flash_message', 'student added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $student = student::findOrFail($id);

        return view('academic.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $student = student::findOrFail($id);

        return view('academic.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();

        $student = student::findOrFail($id);
        $student->update($requestData);

        return redirect('admin/student')->with('flash_message', 'student updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        student::destroy($id);
        return redirect('admin/student')->with('flash_message', 'student deleted!');
    }
}
