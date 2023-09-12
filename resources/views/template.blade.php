<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
    <link rel="icon" type="image/png" href="{{asset('/images/logo/logo.png')}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sneakzy - @yield('title')</title>
</head>
<body>
<div id="topbar">Livraison gratuite à partir de 100€ d'achat</div>
<div id="nav-center">
    <div class="nav-item nav-left">
        <img src="{{asset('/images/logo/name.png')}}" width="160">
        <a class="navbar-link first-navlink" href="{{ url('/') }}">Accueil</a>
        <a class="navbar-link" href="{{ url('/catalog') }}">Catalogue</a>
        <a class="navbar-link" href="{{ url('/chaussures') }}">Chaussures</a>
        <a class="navbar-link" href="{{ url('/sneakers') }}">Sneakers</a>
        <a class="navbar-link" href="{{ url('/contact') }}">Contact</a>
    </div>
    <div class="nav-item nav-right">
        <div>
            <input class="input-search" type="text" placeholder="Rechercher une paire">
            <div id="result"></div>
        </div>
        <a class="navbar-link navbar-icon" href="{{ url('catalog') }}"><i class="fas fa-lg fa-search"></i></a>
        <a class="navbar-link navbar-icon" href=""><i class="fas fa-lg fa-bell"></i></a>
        <a class="navbar-link navbar-icon" href="{{ url('account') }}"><i class="fas fa-lg fa-user-alt"></i></a>
        <a class="navbar-link navbar-icon" href="{{ url('cart') }}"><i class="fas fa-lg fa-shopping-cart"></i></a>
        <div class="navbar-icon burger">
            <div class="stick stick-1"></div>
            <div class="stick stick-2"></div>
            <div class="stick stick-3"></div>
        </div>
    </div>
</div>
@yield('content')
<footer>
    <div class="footer">
        <div class="row">
            <p class="title">AIDE & INFORMATIONS</p>
            <a href="">Assistance</a>
            <a href="">Suivi commande</a>
            <a href="">Livraison & retour</a>
            <a href="">Livraioson prime</a>
        </div>

        <div class="row">
            <p class="title">A PROPOS DE SNEAKZY</p>
            <a href="">A propos de Sneakzy</a>
            <a href="">Sneakzy recrute</a>
            <a href="">Responsabilité des entreprises</a>
            <a href="">Investisseurs</a>
        </div>

        <div class="row">
            <p class="title">En savoir plus</p>
            <a href="">Conditions générales de vente</a>
            <a href="">Conditions générales d'utilisation</a>
            <a href="">Vous abonnez à notre newsletter</a>
            <a href="">Nous retrouver sur les réseaux</a>
        </div>
    </div>
    <div class="bottom">
        <p>Copyright Sneakzy 2021 (Aucune affiliation avec aucune marque de chaussures ni autre marque)</p>
    </div>

</footer>

<script>
    $(".input-search").on('input', function () {

        if ($(".input-search").val() === '') {
            $("#result").html('');
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ url('/search') }}",
            method: "POST",
            dataType: "json",
            data: {
                input: $(".input-search").val()
            },
            success: function (data) {
                $("#result").html('');
                if (data) {
                    $.each(data, function (index, item) {
                        $("#result").append(
                            '<a class="item" href="{{ url('/product') }}/' + item.id + '"><img src="{{ asset('/images/sneakers/') }}/' + item.image + '" width="70"><p>' + item.name + '</p></a>'
                        );
                    });
                }

            },
            error: function (data) {
                console.log('Erreur:');
                console.log(data);
            }
        })
    });
</script>
<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>
