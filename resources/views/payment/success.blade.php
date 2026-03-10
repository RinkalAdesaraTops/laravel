<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Successful') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">Success</p>
                <p>Your payment was completed successfully. Thank you for your purchase!</p>
                
                <div class="mt-4">
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Return to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
