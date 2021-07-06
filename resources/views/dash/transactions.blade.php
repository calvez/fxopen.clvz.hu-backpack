@extends(backpack_view('blank'))
@section('content')
<div class="row">
    <div class="col-md-12 pt-2">
        <h2>Transactions</h2>
        <table class="table table-light">
            <thead>
                <td>Transaction type</td>
                <td>Date</td>
                <td>Base currency</td>
                <td>Amount</td>
                <td>Transaction ID</td>
                <td>Status</td>
                <td>Details</td>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td class="text-uppercase">{{ $transaction->transaction_type ?? '' }}</td>
                    <td>{{ $transaction->date ?? '' }}</td>
                    <td class="text-uppercase">{{ $transaction->base_currency[0] ?? '' }}</td>
                    <td>{{ $transaction->amount ?? '' }}</td>
                    <td>{{ $transaction->transaction_id ?? '' }}</td>
                    <td class="text-uppercase">{{ $transaction->status ?? '' }}</td>
                    <td>{{ $transaction->details ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
