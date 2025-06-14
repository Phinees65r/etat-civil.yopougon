@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Carte principale -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-orange-200">
            <!-- En-tête -->
            <div class="bg-orange-500 px-6 py-4 border-b border-orange-600">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-white">Liste des actes de divorce</h2>
                    <a href="{{ route('acte.divorce.create') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Ajouter un acte
                    </a>
                </div>
            </div>

            <!-- Contenu -->
            <div class="px-6 py-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-orange-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-700 uppercase tracking-wider">
                                    Numéro registre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-700 uppercase tracking-wider">
                                    Ex-époux
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-700 uppercase tracking-wider">
                                    Ex-épouse
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-700 uppercase tracking-wider">
                                    Date du jugement
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($actes as $acte)
                            <tr class="hover:bg-orange-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $acte->numero_registre }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $acte->nom_ex_conjoint }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $acte->nom_ex_conjointe }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $acte->date_de_jugement->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('acte.divorce.edit', $acte) }}" 
                                           class="text-orange-600 hover:text-orange-900 inline-flex items-center">
                                            <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Modifier
                                        </a>
                                        <form action="{{ route('acte.divorce.destroy', $acte) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900 inline-flex items-center"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet acte?')">
                                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Aucun acte de divorce enregistré pour le moment.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($actes->hasPages())
                <div class="mt-4 px-6 py-3 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                    {{ $actes->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection