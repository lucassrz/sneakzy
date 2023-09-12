@extends('template')
@section('title', 'Acceuil')
@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white rounded shadow-lg">
            <h3 class="text-2xl font-bold">Ce connecter à votre compte</h3>
            <form action="">
                <div class="mt-4">
                    <div>
                        <label class="block" for="email">Email
                            <input type="text" placeholder="Email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </label>
                    </div>
                    <div class="mt-4">
                        <label class="block">Mot de passe
                                <input type="password" placeholder="Mot de passe" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </label>
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="px-6 py-2 mt-4 text-white rounded-lg login-button">Connexion</button>
                        <a href="#" class="text-sm text-blue-600 hover:underline text-forgot">Mot de passe oublié?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
