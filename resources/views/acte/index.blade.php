@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white">
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- En-tête -->
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-orange-600 mb-4">Gestion des Actes d'État Civil</h1>
                <p class="text-lg text-gray-600">Gérez facilement tous les actes administratifs</p>
            </div>

            <!-- Cartes des actes -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Acte de Naissance -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-orange-500 transform transition hover:scale-105 duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-orange-100 p-3 rounded-full">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Actes de Naissance</h3>
                        <p class="text-gray-600 mb-4">Gestion des déclarations et extraits de naissance</p>
                        <a href="{{ route('acte.naissance.index') }}" class="inline-flex items-center text-orange-600 hover:text-orange-800 font-medium">
                            Accéder
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Acte de Mariage -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-green-500 transform transition hover:scale-105 duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Actes de Mariage</h3>
                        <p class="text-gray-600 mb-4">Gestion des certificats et extraits de mariage</p>
                        <a href="{{ route('acte.mariage.index') }}" class="inline-flex items-center text-green-600 hover:text-green-800 font-medium">
                            Accéder
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Acte de Décès -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-gray-500 transform transition hover:scale-105 duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-gray-100 p-3 rounded-full">
                                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4m12 6l4-4-4-4m-8 0L4 8l4 4"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Actes de Décès</h3>
                        <p class="text-gray-600 mb-4">Gestion des déclarations et extraits de décès</p>
                        <a href="{{ route('acte.deces.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 font-medium">
                            Accéder
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Acte de Divorce -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-orange-400 transform transition hover:scale-105 duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-orange-50 p-3 rounded-full">
                                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Actes de Divorce</h3>
                        <p class="text-gray-600 mb-4">Gestion des jugements et extraits de divorce</p>
                        <a href="{{ route('acte.divorce.index') }}" class="inline-flex items-center text-orange-500 hover:text-orange-700 font-medium">
                            Accéder
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bannière inférieure -->
            <div class="mt-16 bg-gradient-to-r from-orange-50 to-green-50 rounded-xl p-8 text-center border border-orange-100">
                <h2 class="text-2xl font-bold text-orange-700 mb-4">Besoin d'aide ?</h2>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Consultez notre guide d'utilisation ou contactez notre support technique pour toute assistance.</p>
                <button class="bg-orange-600 hover:bg-orange-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300">
                    Contactez le support
                </button>
            </div>
        </div>
    </div>
</div>
@endsection