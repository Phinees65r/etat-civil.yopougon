<x-guest-layout>
    <div class="min-h-screen bg-white py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="max-w-md w-full mx-auto bg-white rounded-2xl shadow-xl overflow-hidden p-8 border border-orange-100">
            <!-- En-tête avec accent coloré -->
            <div class="text-center mb-8">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-orange-100 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-orange-600">Paiement du timbre</h2>
                <div class="mt-4 flex items-center justify-center">
                    <span class="text-2xl font-bold text-green-600 bg-green-50 px-4 py-2 rounded-lg">500 FCFA</span>
                </div>
                <div class="mt-4 h-1 bg-gradient-to-r from-orange-400 to-green-500 rounded-full w-24 mx-auto"></div>
            </div>

            <form method="POST" action="{{ route('paiement.store', $citoyen) }}" class="space-y-6">
                @csrf

                <!-- Moyen de paiement -->
                <div>
                    <x-input-label for="moyen_paiement" :value="__('Moyen de paiement')" class="text-gray-700 font-medium" />
                    <div class="mt-2 relative">
                        <select 
                            id="moyen_paiement" 
                            name="moyen_paiement" 
                            class="block w-full pl-3 pr-10 py-3 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 rounded-lg transition duration-200 appearance-none"
                            required
                        >
                            <option value="">Sélectionnez...</option>
                            <option value="wave">Wave</option>
                            <option value="mtn_money">MTN Money</option>
                            <option value="orange_money">Orange Money</option>
                            <option value="moov_money">Moov Money</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('moyen_paiement')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Bouton de paiement -->
                <div class="mt-8">
                    <button
                        type="submit"
                        class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-lg font-bold text-white bg-gradient-to-r from-orange-500 to-green-500 hover:from-orange-600 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-300 transform hover:-translate-y-0.5"
                    >
                        {{ __('Payer maintenant') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Sécurité des paiements -->
                <div class="mt-6 flex items-center justify-center space-x-2 text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <span>Paiement 100% sécurisé</span>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>