<?php

namespace App\Http\Controllers\Report;

use App\Models\Course;
use App\Http\Controllers\Controller;
use PDF;


class DetailsCourseController extends Controller
{

    public function __invoke(Course $course)
    {
        $details = $course->sales()->get();
        $pdf  = PDF::loadView('admin.reports.courses.details', compact('course', 'details'));
        return $pdf->stream('reportCourseDetails.pdf');
    }
}
