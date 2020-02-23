<?php

namespace App\Http\Controllers\academic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\course;
use App\lesson;
use App\student;
use App\Quialification;
use Illuminate\Support\Facades\DB;


class QuialificationsController extends Controller
{

/**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
public function store(Request $request)
{
   $requestData = $request->all();
   foreach ($requestData['note'] as $course => $lessons) {
      $course = Course::whereName($course)->firstOrFail();
      foreach ($lessons as $lesson => $students) {
         $lesson = Lesson::whereTitle($lesson)->firstOrFail();
         foreach ($students as $student => $qualificationValue) {
            $student = student::whereName($student)->firstOrFail();
            if (array_key_exists($student->name ,$requestData['enableRecovery'][$course->name][$lesson->title]))
            {
               $enableRecovery = true;
            }else{
               $enableRecovery = false;
            }

         $qualification =Quialification::where("id","{$course->name}_{$lesson->title}_{$student->name}")->first();
         if (is_null($qualification)) {
            $qualification = new Quialification();
            $qualification->id = "{$course->name}_{$lesson->title}_{$student->name}";
         }

            $qualification->course_id = $course->id;
            $qualification->lesson_id = $lesson->id;
            $qualification->student_id = $student->id;
            $qualification->qualificationValue = $qualificationValue;
            $qualification->enableRecovery = $enableRecovery;
            $qualification->save();
            }
         }
      }
      return redirect()->route('courses.show', $course->id)->with('flash_message', 'course added!');
   }

}
