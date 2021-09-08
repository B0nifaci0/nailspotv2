<?php

namespace App\Http\Controllers\Report;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;


class DetailsCourseController extends Controller
{
    public function generalReport(Course $course)
    {
        $details = $course->sales()->get();
        $pdf  = PDF::loadView('admin.reports.courses.details', compact('course', 'details'));
        return $pdf->stream('reportCourseDetails.pdf');
    }
    public function specificRepot(Request $request, Course $course){
        $total=0;
        $from=$request->from;
        $to=$request->to;
        if($from>$to){
            $from=$request->to;
            $to=$request->from;
            $details=$course->sales()->whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();
            foreach ($details as $key => $price) {
                $total+=$price->final_price;
            }
            $pdf=PDF::loadView('admin.reports.courses.leaked-details', compact('course', 'details', 'total'));
            return $pdf->stream('reportCourseLeakedDetails.pdf');
        }else{
            $details=$course->sales()->whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();
            foreach ($details as $key => $price) {
                $total+=$price->final_price;
            }
            $pdf=PDF::loadView('admin.reports.courses.leaked-details', compact('course', 'details', 'total'));
            return $pdf->stream('reportCourseLeakedDetails.pdf');
        }

    }
}
