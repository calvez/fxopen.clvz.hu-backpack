@extends(backpack_view('blank'))
@section('content')
<div class="row">
    <div class="col-md-12 pt-2">
        <h2>Issues</h2>
        <table class="table table-light">
            <thead>
                <td>id</td>
                <td>Title</td>
                <td>Details</td>
                <td>Created</td>
            </thead>
            <tbody>
                @foreach ($userIssues as $issues)
                <tr>
                    <td>{{ $issues->id}}</td>
                    <td>{{ $issues->title}}</td>
                    <td>{{ $issues->details}}</td>
                    <td>{{ $issues->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
