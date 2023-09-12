@extends('template')
@section('title', 'Acceuil')
@section('content')
    <div id="contact-section">
        <div class="information">
            <img src="{{asset('/images/logo/name.png')}}" width="200">
            <p>52 rue de la paix</p>
            <p>Paris CEDEX</p>
            <p>02 48 58 62 95</p>
            <div style="width: 60%"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Rue%20de%20rivoli%20Paris+(Sneakzy)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">gps watches</a></iframe></div>
        </div>
        <form id="contact" method="post">
            <h1>Contact</h1>
            <p class="title">Renseignez des informations pour que l'on puisse comprendre votre demande</p>
            @csrf
            <div>
                <p>De quelle type est votre demande?</p>
                <select>
                    <option>-</option>
                    <option>Informations complémantaire</option>
                    <option>Problème sur une commande</option>
                    <option>Modification/Annulation commande</option>
                    <option>Problème sur un produit</option>
                    <option>Conseil</option>
                    <option>Autre</option>
                </select>
            </div>

            <div>
                <p>Nom et prénom</p>
                <input type="text" placeholder="Entrez votre nom">
            </div>

            <div>
                <p>Adresse email</p>
                <input type="text" placeholder="Entrez votre email">
            </div>

            <div>
                <p>Message</p>
                <textarea placeholder="Entrez votre message"></textarea>
            </div>

            <div>
                <input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter">
                <label for="subscribeNews">Vous acceptez que l'on réponde à cette adresse email</label>
            </div>

            <button type="submit">Envoyer</button>
        </form>
    </div>
@endsection
