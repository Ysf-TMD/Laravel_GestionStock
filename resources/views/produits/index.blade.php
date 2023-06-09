@extends("produits.layout")
@section("content")
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Gestion Stock</h2>
            </div>
            <div class="float-end">
                <a href="{{route("produits.create")}}" class="btn btn-outline-success">Creer un Nouveau Produit</a>
            </div>
        </div>
    </div>
    @if($message=Session::get("success"))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    @if($produits===null)

        <div class="alert alert-warning">
            Faut ajouter Un produit
        </div>
    @else
    <table class="table table-bordered">
        <tr>
            <th>Numéro</th>
            <th>Libellé</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($produits as $produit)
            <tr>
                <td>{{$produit->npro}}</td>
                <td>{{$produit->libelle}}</td>
                <td>{{$produit->prix}}</td>
                <td>{{$produit->qstock}}</td>
                <td>{{$produit->description}}</td>
                <td>
                    <form action="{{route("produits.destroy",$produit->npro)}}" method="POST">
                        <a href="{{route("produits.show",$produit->npro)}}" class="btn btn-outline-success">Montrer</a>
                        <a href="{{route("produits.edit",$produit->npro)}}" class="btn btn-outline-success">Editer</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center pagination-lg">
        {!! $produits->links("pagination::bootstrap-4") !!}
    </div>
@endif


@endsection
