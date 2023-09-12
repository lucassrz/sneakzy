@extends('template')
@section('title', 'Acceuil')
@section('content')
    <div class="section-show">
        <img src="{{asset('/images/sneakers/' . $product->image)}}" alt="{{ $product->name }}" height="500">
        <div class="right">
            <h2>{{ $product->name }}</h2>
            <h5>{{ $product->price }}€</h5>
            <div class="stars">
                @for ($i = 1; $i <= 5; $i++)
                    @if($i <= $product->stars)
                        <i class="fas fa-star" style="color: #d2a53b;"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </div>
            <p>{{ $product->description }}</p>
            <a class="add-to-cart" href="">Ajouter au panier</a>
        </div>
    </div>

    <div class="avis">
    <h2>Les acheteurs en parle</h2>
        <div>
        @forelse($avis as $avi)
            <div class="all-avi">
                <img src="{{ asset('/images/logo/user.png') }}" width="120">
                <div class="avi">
                    <h3>{{ $avi->title }}</h3>
                    <div class="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            @if($i <= $avi->stars)
                                <i class="fas fa-star" style="color: #d2a53b;"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <p>{{ $avi->comment }}</p>
                </div>
            </div>
        @empty
                    <p>Pas de commentaire(s)</p>
        @endforelse
        </div>
    </div>
    <div class="other-product">
        <h2>Vous pourriez aussi aimer</h2>
        <div class="other-product-section">
            @php
                $randomNum = rand(1, 4);
            @endphp
            @for ($i = $randomNum; $i <= $randomNum+4; $i++)
                <a class="other-product-item" href="{{ url('/product') }}/{{ $products[$i]->id }}">
                    <img src="{{asset('/images/sneakers/' . $products[$i]->image )}}" width="250">
                    <p class="name">{{ $products[$i]->name }}</p>
                    <p class="price">{{ $products[$i]->price }}€</p>
                </a>
            @endfor
        </div>
    </div>
@endsection
