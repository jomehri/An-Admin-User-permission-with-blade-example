<form action="{{ route('dashboard.payment_request.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Account Number</th>
                <th scope="col">Amount</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            @forelse($paymentRequests as $paymentRequest)
                <tr>
                    <td>{{ $paymentRequest['userName'] }}</td>
                    <td>{{ $paymentRequest['userEmail'] }}</td>
                    <td>{{ $paymentRequest['accountNumber'] }}</td>
                    <td>{{ number_format($paymentRequest['amount']) }}</td>

                    <td>
                        <a href="{{ route('dashboard.payment_request.approve', ['paymentRequest' => $paymentRequest['id']]) }}"
                           class="btn btn-primary mb-2">Approve</a>
                        <a href="{{ route('dashboard.payment_request.reject', ['paymentRequest' => $paymentRequest['id']]) }}"
                           class="btn btn-danger mb-2">Reject</a>
                    </td>

                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No pending requests</td></tr>
            @endforelse

            </tbody>
        </table>

        {{ $paymentRequests->withQueryString()->links() }}
    </div>

</form>
