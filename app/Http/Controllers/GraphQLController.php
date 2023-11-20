<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nuwave\Lighthouse\GraphQL;
use Nuwave\Lighthouse\Schema\Context;
use App\Models\Employe;
use App\Models\Departement;
use Nuwave\Lighthouse\Support\Http\Controllers\GraphQLController as LighthouseController;

class GraphQLController extends Controller
{
    public function __invoke(Request $request)
    {
        return $this->query($request);
    }

    // Employés
    public function creerEmploye(Request $request)
    {
        $input = $request->input('input');
        $employee = Employe::create($input);
        return $employee;
    }

    public function mettreAJourEmploye(Request $request)
    {
        $input = $request->input('input');
        $id = $request->input('id');
        $employee = Employe::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employé non trouvé'], 404);
        }

        $employee->update($input);
        return $employee;
    }

    public function supprimerEmploye(Request $request)
    {
        $id = $request->input('id');
        $employee = Employe::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employé non trouvé'], 404);
        }

        $employee->delete();
        return response()->json(['message' => 'Employé supprimé avec succès']);
    }

    // Départements
    public function creerDepartement(Request $request)
    {
        $input = $request->input('input');
        $department = Departement::create($input);
        return $department;
    }

    public function mettreAJourDepartement(Request $request)
    {
        $input = $request->input('input');
        $id = $request->input('id');
        $department = Departement::find($id);

        if (!$department) {
            return response()->json(['message' => 'Département non trouvé'], 404);
        }

        $department->update($input);
        return $department;
    }

    public function supprimerDepartement(Request $request)
    {
        $id = $request->input('id');
        $department = Departement::find($id);

        if (!$department) {
            return response()->json(['message' => 'Département non trouvé'], 404);
        }

        $department->delete();
        return response()->json(['message' => 'Département supprimé avec succès']);
    }
}
