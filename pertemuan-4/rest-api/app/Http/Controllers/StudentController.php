<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menggunakan model student untuk select data
        $student = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $student
        ];

        return response()->json($data, 200);

        // handling jika data kosong
        if ($students->isEmpty()) {
            $data = [
                "message" => "Data not found",
                "data" => []
            ];

            return response()->json($data, 200);
        }

        // handling jika database tidak ada
        else {
            $data = [
                "message" => "Data not found",
                "data" => []
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => "required",
            'nim' => "required",
            'email' => "required | email",
            'jurusan' => "required"
        ]);

        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan model student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created successfully',
            'data' => $student,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // cari id student yang ingin didapatkan
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student,
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Student not found',
            ];

            // mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**`
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        // cek data student
        if (!$student) {

            // menangkap data request
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            // update data
            $student->update($input);

            $data = [
                'message' => 'Student is updated successfully',
                'data' => $student,
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);

            // return response()->json(['message' => 'Student not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // cari data students berdasarkan id
        $student = Student::find($id);

        // cek data student
        if (!$student) {

            // hapus data student
            $student->delete();

            $data = [
                'message' => 'Student is deleted successfully',
            ];
    
            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }
        else {

            return response()->json(['message' => 'Student not found'], 404);

        }

    }
}
