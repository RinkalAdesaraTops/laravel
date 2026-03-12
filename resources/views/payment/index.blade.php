<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Complete Your Payment</h3>
                    <p class="mb-4">You are about to be charged <strong>$10.00</strong>.</p>

                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Pay with Stripe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
