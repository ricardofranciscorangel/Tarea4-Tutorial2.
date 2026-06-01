<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

class CrudController extends Controller
{
    // READ - Obtener todos los Cruds
    public function index()
    {
        return response(Crud::all()->toArray(), Response::HTTP_OK);
    }

    // CREATE - Crear un nuevo Crud aleatorio
    public function create(Generator $faker)
    {
        $crud = new Crud();
        $crud->name = $faker->lexify('????????');
        $crud->color = $faker->boolean ? 'red' : 'green';
        $crud->save();

        return response($crud->toArray(), Response::HTTP_CREATED);
    }

    // UPDATE - Cambiar el color de un Crud
    public function update(Request $request, $id)
    {
        $crud = Crud::findOrFail($id);
        $crud->color = $request->color;
        $crud->save();

        return response(null, Response::HTTP_OK);
    }

    // DELETE - Eliminar un Crud
    public function destroy($id)
    {
        Crud::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
