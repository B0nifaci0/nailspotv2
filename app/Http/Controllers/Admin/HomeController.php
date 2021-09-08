<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\Course;
use App\Models\User;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        $totalCourse=0;
        $totalInstructor=0;
        $totalCompetence=0;
        $student=0;
        $nameCourse=[];
        $valorCourse=[];
        $users=[];
        $judge=0;
        $sales=[];
        $date=[];
        $allCompetences=0;
        $users=User::all();
        foreach ($users as $key => $user) {
            if($user->hasRole(1) || $user->hasRole(2)){
                $totalInstructor++;
            }
        } 
        foreach ($users as $key => $user) {
            if($user->hasRole(3)){
                $judge++;
            }
        }
        $competences=Competence::all();
        foreach ($competences as $key => $competence) {
            $totalCompetence+=$competence->total;
            $allCompetences=$competence->whereStatus(2)->get();
        }
        $courses=Course::whereStatus(3)->get();
        foreach ($courses as $key => $course) {
            $totalCourse+=$course->total;
            $student+=$course->students->count();
        }   
        $coursesAll=DB::table('courses')->select('courses.name', DB::raw('sum(sales.final_price) as total'))
        ->where('courses.status','=',3)
        ->groupBy('courses.name')
        ->orderBy('total', 'DESC')
        ->take(10)
        ->join('sales', function ($join) {
            $join->on('courses.id', '=', 'sales.saleable_id')
            ->where('sales.saleable_type', '=', 'App\\Models\\Course');
        })->get();
        foreach ($coursesAll as $key => $course) {
            $nameCourse[]=$course->name;
            $valorCourse[]=$course->total;
        }
        $salesMonth=DB::select("SELECT  MONTHNAME(sales.`created_at`) AS mes,SUM(sales.`final_price`) AS total
        FROM sales WHERE YEAR(sales.`created_at`) = YEAR(CURDATE())
        GROUP BY mes ORDER BY (
                CASE WHEN mes='January' THEN 1 
                WHEN mes='February' THEN 2 
                WHEN mes='March' THEN 3 
                WHEN mes='April' THEN 4 
                WHEN mes='May' THEN 5 
                WHEN mes='June' THEN 6 
                WHEN mes='July' THEN 7 
                WHEN mes='August' THEN 8 
                WHEN mes='September' THEN 9 
                WHEN mes='October' THEN 10     
                WHEN mes='November' THEN 11    
                WHEN mes='December' THEN 12    
                ELSE 0 END 
            );
       ");
        foreach ($salesMonth as $key => $totalSales) {
            $date[]=$totalSales->mes;
            $sales[]=$totalSales->total;
        }
        return view('admin.index', compact('sales', 'date','student', 'courses', 'totalCourse', 'totalCompetence', 'nameCourse','valorCourse','totalInstructor', 'allCompetences', 'judge'));
    }
}
