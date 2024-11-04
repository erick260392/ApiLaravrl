<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {

        $students = Student::all(); // consultamos todos los estudiantes en la base

        if ($students->isEmpty()) {
            $data = [
                'message' => 'No se encontraron Estidiantes',
                'status' => 404,
            ];


            return response()->json($data , 404);
        };

        return response()->json($students, 200); // retornamos la data en formato JSON con un estatus correcto

    }
}
