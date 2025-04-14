<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CourseApiController extends Controller
{
    // GET /api/courses
    public function index()
    {
        $courses = Course::with('user')->get();
        return response()->json(['data' => $courses]);
    }

    // GET /api/courses/{id}
    public function show($id)
    {
        $course = Course::with('user')->find($id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }
        return response()->json(['data' => $course]);
    }

    // POST /api/courses
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_course' => 'required|string|max:255|unique:courses',
            'password' => 'required|string|min:8|confirmed',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();
        $validated['password'] = Hash::make($validated['password']);

        $course = Course::create($validated);

        return response()->json(['message' => 'Course created successfully', 'data' => $course], 201);
    }

    // PUT /api/courses/{id}
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_course' => 'required|string|max:255|unique:courses,nama_course,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $course->update($validated);

        return response()->json(['message' => 'Course updated successfully', 'data' => $course]);
    }

    // DELETE /api/courses/{id}
    public function destroy($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $course->delete();

        return response()->json(['message' => 'Course deleted successfully']);
    }
}
