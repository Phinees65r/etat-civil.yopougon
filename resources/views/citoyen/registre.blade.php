<x-guest-layout>
    <div class="min-h-screen bg-white py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="max-w-md w-full mx-auto bg-white rounded-2xl shadow-xl overflow-hidden md:max-w-lg p-8 border border-orange-100">
            <!-- En-tête avec accent coloré -->
            <div class="text-center mb-8">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-orange-600">Vérification de l'acte</h2>
                <p class="mt-3 text-lg text-gray-600">Veuillez entrer votre numéro de registre</p>
                <div class="mt-4 h-1 bg-gradient-to-r from-orange-400 to-green-500 rounded-full w-24 mx-auto"></div>
            </div>

            <form method="POST" action="{{ route('citoyen.verifyRegistre', $citoyen) }}" class="space-y-6">
                @csrf

                <!-- Champ numéro de registre -->
                <div>
                    <x-input-label for="numero_registre" :value="__('Numéro de registre (5 chiffres)')" class="text-gray-700 font-medium" />
                    <div class="mt-2 relative rounded-md shadow-sm">
                        <x-text-input 
                            id="numero_registre" 
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200" 
                            type="text" 
                            name="numero_registre" 
                            placeholder="12345"
                            required 
                        />
                    </div>
                    <x-input-error :messages="$errors->get('numero_registre')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Bouton de vérification -->
                <div class="mt-8">
                    <button
                        type="submit"
                        class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-lg font-bold text-white bg-gradient-to-r from-orange-500 to-green-500 hover:from-orange-600 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-300 transform hover:-translate-y-0.5"
                    >
                        {{ __('Vérifier') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Message d'aide -->
                <div class="mt-4 text-center text-sm text-gray-500">
                    <p>Vous ne trouvez pas votre numéro? <a href="#" class="font-medium text-orange-600 hover:text-orange-500">Contactez-nous</a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>