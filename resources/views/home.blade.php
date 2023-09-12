@extends('template')
@section('title', 'Acceuil')
@section('content')
    <div id="new-collection">
        <div id="descriptif">
            <h1 class="line1">NOUVELLE</h1>
            <h2 class="line2">COLLECTION 2022</h2>
            <a class="bouton-newcollec" href="/newcollection">Acheter maintenant</a>
        </div>
        <img class="img-newcollec" src="{{asset('/images/sneakers/newcollec.png')}}" width="600">
    </div>

    <h2 class="section-title">Nouvelle collection</h2>
    <div class="section">
        @for ($i = 0; $i <= 2; $i++)
            <a class="product" href="{{ url('/product') }}/{{ $products[$i]->id }}">
                <img src="{{asset('/images/sneakers/' . $products[$i]->image )}}" width="400">
                <p class="name">{{ $products[$i]->name }}</p>
                <p class="price">{{ $products[$i]->price }}€</p>
            </a>
        @endfor
    </div>

    <div class="cta" style="background: url({{ asset("/images/background/street.jpg") }}) fixed;">
        <div class="into">
            <h3>Trouvez votre style</h3>
            <a href="/catalog">Voir notre catalogue</a>
        </div>
    </div>

    <h2 class="section-title">Les plus vendu</h2>
    <div class="section">
        @for ($i = 3; $i <= 5; $i++)
            <a class="product" href="{{ url('/product') }}/{{ $products[$i]->id }}">
                <img src="{{asset('/images/sneakers/' . $products[$i]->image )}}" width="400">
                <p class="name">{{ $products[$i]->name }}</p>
                <p class="price">{{ $products[$i]->price }}€</p>
            </a>
        @endfor
    </div>

    <div id="call-action">
        <div class="atout">
            <img src="{{asset('/images/other/service-client.png')}}" width="250">
            <p>Service client 7/7 jours</p>
        </div>
        <div class="atout">
            <img src="{{asset('/images/other/creditcard.png')}}" width="250">
            <p>Différent mode de paiements sécurisé</p>
        </div>
        <div class="atout">
            <img src="{{asset('/images/other/livraison.png')}}" width="250">
            <p>Expedition 24h/48h</p>
        </div>
    </div>
@endsection
