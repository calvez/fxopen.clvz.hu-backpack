@extends(backpack_view('blank'))
@section('content')
<div class="row">
    <div class="col-md-12 pt-2">
        <h2>Log in tracker</h2>
        <table class="table table-light">
            <thead>
                <td>Manager</td>
                <td>Started at</td>
                <td>Stopped at</td>
                <td>Location</td>
            </thead>
            <tbody>
                @foreach ($logins as $login)
                <tr>
                    <td>{{ $login->user->name}}</td>
                    <td>{{ $login->started_at}}</td>
                    <td>{{ $login->stopped_at}}</td>
                    <td>{{ $login->location}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
