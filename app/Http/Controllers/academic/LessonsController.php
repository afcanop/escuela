<?php

namespace App\Http\Controllers\academic;

use App\course;
use App\lesson;
use App\Quialification;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LessonsController extends Controller
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
            $lessons = lesson::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('dateStart', 'LIKE', "%$keyword%")
                ->orWhere('dateEnd', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $lessons = lesson::latest()->paginate($perPage);
        }

        return view('academic.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($codigoCurso)
    {
        return view('academic.lessons.create', compact('codigoCurso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|Illuminate\Routing\Redirector
     */
    public function store(Request $request, $codigoCurso)
    {
        $this->validate($request, [
			'title' => 'required'
		]);
        $requestData = $request->all();
        $lesson = lesson::create($requestData);
        $curse = course::find($codigoCurso);
        $curse->lessons()->attach($lesson);
        return redirect()->route('courses.show', $curse->id)->with('flash_message', 'lesson added!');

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
        $lesson = lesson::findOrFail($id);

        return view('academic.lessons.show', compact('lesson'));
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
        $lesson = lesson::findOrFail($id);

        return view('academic.lessons.edit', compact('lesson'));
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
			'title' => 'required'
		]);
        $requestData = $request->all();

        $lesson = lesson::findOrFail($id);
        $lesson->update($requestData);

        return redirect('lessons')->with('flash_message', 'lesson updated!');
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
        lesson::destroy($id);

        return redirect('lessons')->with('flash_message', 'lesson deleted!');
    }

    public function qualification($codeCurso, $codeLesson)
    {
        $course = course::findOrFail($codeCurso);
        $lesson = lesson::findOrFail($codeLesson);
        $qualification = DB::table('quialifications')
            ->select(
                'students.name',
                'quialifications.qualificationValue',
                'quialifications.enableRecovery'
            )
            ->rightJoin('students', 'students.id', '=', 'quialifications.student_id')
            /*->where([
                ['student_id', $studen->id],
                ['lesson_id', $lesson->id],
                ['course_id', $course->id]
            ])*/
            ->get()->toArray();

        return view('academic.lessons.calification', compact('course','lesson','qualification'));

    }
}
