<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::latest()->paginate(4);
        return view("produits.index",compact('produits'))
            ->with("i",(request()->input("page",1)-1)*4)
            ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retourner la vue d'ajout d'un produit
        return view("produits.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //insertion d'un nv produit dans la base de données ;
        ////valider si les champs sont bien envoyés ;
        $request ->validate([
            "npro"=>"required",
            "libelle"=>"required",
            "prix"=>"required",
            "qstock"=>"required",
            "description"=>"required",
        ]);
        //inserer les donnes apres validation dans DB ;
        Produit::create($request->all());
        //redirection vers la page index
        return redirect()->route("produits.index")
            ->with("success","Produit créé avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //retrouner la page de details avec le produit choisi
        return view("produits.show",compact("produit"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //return view resplonable de modification du produit
        return view("produits.edit",compact("produit"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //realiser les modifications + enregistrement dans la DB
        $request->validate([
            "npro"=>"required",
            "libelle"=>"required",
            "prix"=>"required",
            "qstock"=>"required",
            "description"=>"required",
        ]);
        //realisation des modification apres validation
        $produit->update($request->all());
        //returner la vue ...
        return redirect()->route("produits.index")
            ->with('success',"Produits mis a jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //suppression d'un produit via $produit  c'est id
        $produit->delete();
        return redirect()->route("produits.index")
            ->with("success","Produit supprimé avec succès");
    }
}
