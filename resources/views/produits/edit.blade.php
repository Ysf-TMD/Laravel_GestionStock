@extends("produits.layout")
@section("content")
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Modifier Votre  Produit</h2>
                <div class="float-end">
                    <a href="{{route("produits.index")}}" class="btn btn-outline-primary">Retour</a>
                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Oups ! </strong>
            <p>
                il y a eu des problemes avec votre Entrer
            </p>         <br><br>
            <ul>
                @foreach($errors as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route("produits.update",$produit->npro)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Numéro Produit :</strong>
                    <input type="text" name="npro" placeholder="Saisir un Numéro " class="form-control" value="{{ $produit->npro }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Libellé  : </strong>
                    <input type="text" name="libelle" placeholder="Saisir un libellé " class="form-control" value="{{ $produit->libelle }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Prix  : </strong>
                    <input type="text" name="prix" placeholder="Saisir un prix " class="form-control" value="{{ $produit->prix }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Quantité en Stock  : </strong>
                    <input type="text" name="qstock" placeholder="Saisir Quantité Stock " class="form-control" value="{{ $produit->qstock }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Detail  : </strong>
                    <textarea name="description" class="form-control" style="height:150px" placeholder="Description">{{ $produit->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>

        </div>
    </form>
@endsection
