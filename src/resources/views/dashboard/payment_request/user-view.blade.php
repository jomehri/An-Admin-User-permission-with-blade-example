<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('layouts.error-success')

                    <div class="card">
                        <div class="card-header">Payment Requests</div>
                        <div class="card-body">

                            @if(Auth::user()->can('send requests'))
                                @include('dashboard.payment_request.sections.user-request')
                            @elseif(Auth::user()->can('moderate requests'))
                                @include('dashboard.payment_request.sections.admin-request')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
