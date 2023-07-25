<?php

namespace App\Http\Controllers;
use App\Models\Transfert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class moneyTransferController extends Controller
{
    public function showForm()
    {
        $users = User::all();
        return view('index', [
            "users" => $users
        ]);
    }
    public function post(Request $request)
    {
         // Valider les données du formulaire avec des messages d'erreur personnalisés
        //dd(Auth::user());
        //exit;
        $request->validate([
            'destinateName' => 'required', // Remplacez "destinatePrice" par le nom du champ de sélection dans votre formulaire
            'fee' => 'required|numeric', // Remplacez "fee" par le nom du champ de montant dans votre formulaire
        ], [
            'destinateName.required' => 'Veuillez sélectionner un destinataire.',
            'fee.required' => 'Veuillez saisir le montant du transfert.',
            'fee.numeric' => 'Le montant du transfert doit être un nombre.',
        ]);

        // Créer un nouvel enregistrement de transfert dans la base de données

        Transfert::create([
            'expediteur_id' => Auth::user()-> id,
            'destinataire_id' => $request->input('destinateName'),
            'montant' => $request->input('fee'),
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => "Transfert effectue"
            ]
        );


        // Rediriger vers la page de succès ou tout autre endroit souhaité après l'insertion
        return back()->with('success', 'Le transfert a été effectué avec succès !');

    }
}
