<form action="{{ route('dashboard.payment_request.save') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($paymentRequests as $paymentRequest)
            <tr>
                <td>{{ $paymentRequest->user()->first()->name }}</td>
                <td>{{ $paymentRequest->user()->first()->email }}</td>
                <td>
                    <a href="{{ route('dashboard.payment_request.approve') }}"  class="btn btn-primary mt-3"></a>
                    <a href="{{ route('dashboard.payment_request.reject') }}"  class="btn btn-danger mt-3"></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</form>
