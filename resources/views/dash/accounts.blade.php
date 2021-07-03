@extends(backpack_view('blank'))
@section('content')
<div class="row">
    <div class="col-md-12 pt-2">
        <h2>Trading Accounts</h2>
        <table class="table table-light">
            <thead>
                <td>id</td>
                <td>Account Number</td>
                <td>Master name</td>
                <td>Sub Account name</td>
                <td>Base currency</td>
                <td>Balance</td>
                <td>Equity</td>
                <td>Leverage</td>
                <td>Created</td>
                <td>Updated</td>
            </thead>
            <tbody>
                @foreach ($userAccounts as $account)
                <tr>
                    <td>{{ $account->id}}</td>
                    <td>{{ $account->account_number}}</td>
                    <td>{{ $account->master_name}}</td>
                    <td>{{ $account->sub_account_name}}</td>
                    <td>{{ $account->base_currency}}</td>
                    <td>{{ $account->balance}}</td>
                    <td>{{ $account->equity}}</td>
                    <td>{{ $account->leverage}}</td>
                    <td>{{ $account->created_at}}</td>
                    <td>{{ $account->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
