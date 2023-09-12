@extends('template')
@section('title', 'Acceuil')
@section('content')
    <div id="catalog-container">
        <div id="right">
            <h2>Filtre</h2>
            <p>Nom :</p>
            <input id="namefilter" type="text">
            <p>Catégories :</p>
            <div class="categorie-filter">
                @foreach($categories as $categorie)
                    <p class="categorie-name" data-value="{{ $categorie->id }}">{{ $categorie->name }}</p>
                @endforeach
            </div>
            <p>Prix :</p>
            <div id="filtre-prix">
                <input id="minprice" type="text"><p>et</p><input id="maxprice" type="text">
            </div>
            <a id="actualiser">Actualiser</a>
        </div>
        <div id="catalog">
            @foreach($products as $product)
                <a href="{{ url('/product') }}/{{ $product->id }}" class="item">
                    <img src="{{ asset('/images/sneakers/' . $product->image) }}">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->price }}€</p>
                </a>
            @endforeach
        </div>
    </div>
    <script>
        $("#namefilter").on('input', function () {
            research();
        });

        document.querySelectorAll(".categorie-name").forEach(item => {
            item.addEventListener('click', function () {
                if(item.classList.contains('categorie-click')) {
                    item.classList.remove("categorie-click");
                    research();
                } else {
                    document.querySelectorAll(".categorie-name").forEach(item => {
                        item.classList.remove("categorie-click");
                    })
                    item.classList.add("categorie-click");
                    research(this.dataset.value);
                }
            })
        })

        $("#minprice").on('input', function () {
            research();
        });

        $("#maxprice").on('input', function () {
            research();
        });

        function research(categorie = '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('/filter') }}",
                method: "POST",
                dataType : "json",
                data: {
                    name: $("#namefilter").val(),
                    categories: categorie,
                    minPrice: $("#minprice").val(),
                    maxPrice: $("#maxprice").val(),
                },
                success: function (data) {
                    $("#catalog").html('');
                    if(data) {
                        $.each(data, function(index, item) {
                            $("#catalog").append(
                                '<a class="item" href="{{ url('/product') }}/' + item.id + '"><img src="{{ asset('/images/sneakers/') }}/' + item.image + '"><h2>' + item.name + '</h2><p>' + item.price + '€</p></a>'
                            );
                        });
                    }

                },
                error: function (data) {
                    console.log('Erreur:');
                    console.log(data);
                }
            })
        }
    </script>
@endsection
