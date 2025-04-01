<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('user')->get(); // Mengambil semua data course dari database
        return view('Role.Guru.Course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Role.Guru.Course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nama_course" => 'required|string|max:255|unique:courses',
            "password" => 'required|string|min:8|confirmed',
            "user_id" => 'required|exists:users,id',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Course::create($validated); // Simpan course ke database

        return redirect()->route('Guru.Course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::with('user')->findOrFail($id); // Mengambil data course berdasarkan ID
        return view('Role.Guru.Course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id); // Mengambil data course berdasarkan ID
        return view('Role.Guru.Course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "nama_course" => 'required|string|max:255|unique:courses,nama_course,' . $id,
            "password" => 'nullable|string|min:8|confirmed',
            "user_id" => 'required|exists:users,id',
        ]);

        $course = Course::findOrFail($id); // Mengambil data course berdasarkan ID

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $course->update($validated); // Update course di database

        return redirect()->route('Guru.Course.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id); // Mengambil data course berdasarkan ID
        $course->delete(); // Menghapus course

        return redirect()->route('Guru.Course.index')->with('success', 'Course deleted successfully.');
    }
}