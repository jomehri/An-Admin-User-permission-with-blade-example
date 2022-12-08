<form action="{{ route('dashboard.payment_request.save') }}" method="POST" enctype="multipart/form-data">
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
