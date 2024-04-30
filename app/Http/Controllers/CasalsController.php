<?php

namespace App\Http\Controllers;

use App\Models\Casal;
use App\Models\Ciutat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CasalsController extends Controller
{
    public function indexVista(Request $request)
    {
        $casals = Casal::all();
        return view('index', compact('casals'));
    }

    public function formularioCasal(Request $request)
    {
        if (!session()->has('user_id') || !session()->has('user_name')) {
            return redirect()->route('inicio')->with('ERROR', 'Debes iniciar sesión primero');
        }
        $userId = session('user_id');
        $userName = session('user_name');
        $ciutats = Ciutat::all();
        $date = Carbon::now();
        $fechaActual = $date->toDateString();
        $fechaDias = $date->addDays(7)->toDateString();
        return view('nuevoCasal', compact('userId', 'userName', 'ciutats','fechaActual','fechaDias'));
    }

    public function nuevo(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'data_inici' => 'required',
            'data_final' => 'required',
            'n_places' => 'required',
            'id_ciutat' => 'required'
        ]);

        try {
            $nuevoCasal = new Casal([
                'nom' => $request->input('nom'),
                'data_inici' => $request->input('data_inici'),
                'data_final' => $request->input('data_final'),
                'n_places' => $request->input('n_places'),
                'id_ciutat' => $request->input('id_ciutat'),
            ]);

            $nuevoCasal->save();

            if (session()->has('user_id') || session()->has('user_name')) {
                return redirect()->route('indexVista');
            } else {
                return redirect()->route('/');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['ERROR' => 'Hubo un problema al procesar la solicitud'. $e]);
        }
    }

    public function editarcasal($id)
    {
        if (!session()->has('user_id') || !session()->has('user_name')) {
            return redirect()->route('inicio')->with('ERROR', 'Debes iniciar sesión primero');
        }
        $userId = session('user_id');
        $userName = session('user_name');
        $casal = Casal::findOrFail($id);
        $date = Carbon::now();
        $ciutats = Ciutat::all();
        $fechaActual = $date->toDateString();
        $fechaDias = $date->addDays(7)->toDateString();
        return view('editarCasal', compact('userId', 'userName', 'ciutats','casal','fechaActual','fechaDias'));
    }

    public function editar(Request $request, $id)
    {
        $casal = Casal::find($id);
        $request->validate([
            'nom' => 'required',
            'data_inici' => 'required|date',
            'data_final' => 'required|date',
            'n_places' => 'required',
            'id_ciutat' => 'required'
        ]);
        //$data_inici = Date::createFromFormat('d/m/Y', $request->input('data_inici'))->format('Y-m-d');
        //$data_final = Date::createFromFormat('d/m/Y', $request->input('data_final'))->format('Y-m-d');
        try {
            $casal->update([
                'nom' => $request->input('nom'),
                'data_inici' => $request->input('data_inici'),
                'data_final' => $request->input('data_final'),
                'n_places' => $request->input('n_places'),
                'id_ciutat' => $request->input('id_ciutat')
            ]);

            return redirect()->route('indexVista');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['ERROR' => 'Hubo un problema al procesar la solicitud'. $e]);
        }
    }

    public function eliminarcasal($id)
    {
        $casal = Casal::findOrFail($id);
        $casal->delete();        
        return redirect()->route('indexVista');
    }
}
