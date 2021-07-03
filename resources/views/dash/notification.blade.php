@extends(backpack_view('blank'))
@section('content')
<div class="row">
    <div class="col-md-12 pt-2">
        <h2>Notifications</h2>
        <table class="table table-light">
            <thead>
                <td>id</td>
                <td>Title</td>
                <td>Details</td>
                <td>impact</td>
                <td>Created</td>
            </thead>
            <tbody>
                @foreach ($userNotifications as $notification)
                <tr>
                    <td>{{ $notification->id}}</td>
                    <td>{{ $notification->title}}</td>
                    <td>{{ $notification->description}}</td>
                    <td>{{ $notification->impact}}</td>
                    <td>{{ $notification->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
