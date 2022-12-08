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
                            <form action="{{ route('dashboard.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="InputAmount">Payment Amount:</label>
                                    <input type="text" name="amount" class="form-control" id="InputAmount"
                                           aria-describedby="amountHelp" placeholder="Enter Amount (Rial)" value="{{ old('amount') }}">
                                    <small id="amountHelp" class="form-text text-muted">Enter your desired payment
                                        request amount in Rials.</small>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="InputPaymentSource">Payment Source:</label>
                                    <select id="InputPaymentSource" name="account_id" class="form-select" aria-label=".form-select-lg paymentSource">
                                        <option selected>Select your desired account</option>

                                        @foreach($user->accounts()->get() as $userAccount)
                                            <option value="{{ $userAccount->id }}" @if(old('account_id') == $userAccount->id) selected="selected" @endif>{{ $userAccount->account_number }}
                                        @endforeach

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
