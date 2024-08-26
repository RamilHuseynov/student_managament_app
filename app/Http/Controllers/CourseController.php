<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Course::create($input);
        return redirect('courses')->with('flash_message', 'Course added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $courses = Course::find($id);
        return view('course.show', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = Course::find($id);
        return view('course.edit', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $courses = Course::find($id);
        $input = $request->all();
        $courses->update($input);
        return redirect('courses')->with('flash_message', 'Course updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Course deleted!');
    }
}
