<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Dotenv\Repository\RepositoryInterface;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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


            return response()->json($data, 404);
        };

        return response()->json($students, 200); // retornamos la data en formato JSON con un estatus correcto

    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'language' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la Validacion de Datos',
                'errors' => $validator->errors(),
                'status' => 400

            ];

            return response()->json($data, 400);
        };

        $student = Student::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language
        ]);


        if (!$student) {

            $data =[
                'message' => 'Error al crear al estudiante',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }


        $data = [
            'student' => $student,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
