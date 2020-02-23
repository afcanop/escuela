<?php

namespace App\Http\Controllers\academic;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\course;
use Illuminate\Http\Request;

class CoursesController extends Controller
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
            $courses = course::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $courses = course::latest()->paginate($perPage);
        }

        return view('academic.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('academic.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $course = new course();
        $course->name = $request->name;
        $course->slug = $request->slug;
        $course->dateStart = $request->dateStart;
        $course->dateEnd = $request->dateEnd;
        $course->status = $request->status? true : false;
        $course->description = $request->description;
        $course->save();
        return redirect()->route('courses.index')->with('flash_message', 'course added!');
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
        $course = course::findOrFail($id);
        $students = $course->studens()->paginate(15);
        $lessons = $course->lessons()->paginate(15);
        return view('academic.courses.show', compact('course','students', 'lessons'));
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
        $course = course::findOrFail($id);

        return view('academic.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, course $course)
    {
        $course->name = $request->name;
        $course->slug = $request->slug;
        $course->dateStart = $request->dateStart;
        $course->dateEnd = $request->dateEnd;
        $course->status = $request->status? true : false;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('courses.show', $course->id)->with('flash_message', 'course updated!');
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
        course::destroy($id);

        return redirect()->route('courses.index')->with('flash_message', 'course deleted!');
    }
}
