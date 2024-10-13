<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\course;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    public function create(): View
    {
        return view('courses.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Course::create($input);
        return redirect('courses')->with('flash_message', 'course Added!');
    }

    public function show(string $id): View
    {
        $courses = Course::find($id);
        return view('courses.show')->with('course', $courses);
    }

    public function edit(string $id): View
    {
        $courses = Course::find($id);
        return view('courses.edit')->with('course', $courses);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $courses = course::find($id);
        $input = $request->all();
        $courses->update($input);
        return redirect('courses')->with('flash_message', 'course Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'course deleted!');
    }
}
