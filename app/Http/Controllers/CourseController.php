<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teacherId = $request->query('teacher_id');
        $category = $request->query('category');

        $courses = Course::with('teacher')
            ->when($teacherId, function ($q) use ($teacherId) {
                $q->where('teacher_id', $teacherId);
            })
            ->when($category, function ($q) use ($category) {
                $q->where('category', $category);
            })
            ->paginate(10)
            ->appends($request->only(['teacher_id', 'category']));

        $teachers = \App\Teacher::orderBy('first_name')->orderBy('last_name')->get(['id', 'first_name', 'last_name']);
        $categories = Course::query()
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('pages.course.index', [
            'courses' => $courses,
            'teachers' => $teachers,
            'categories' => $categories,
            'selectedTeacherId' => $teacherId,
            'selectedCategory' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = \App\Teacher::all();
        return view('pages.course.create', ['teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->teacher_id = $request->input('teacher_id');
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('pages.course.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $teachers = \App\Teacher::all();
        return view('pages.course.edit', ['course' => $course, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->teacher_id = $request->input('teacher_id');
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
