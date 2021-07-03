@extends(backpack_view('blank'))
@section('content')
<div class="row">
    <div class="col-md-12 pt-2">
        <h2>Service Requests</h2>
        <a href="/dash/support_ticket/create" class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i> Add Service request</span></a>
        <table class="table table-light">
            <tbody>
                @foreach ($userRequests as $request)
                <tr>
                    <td>{{ $request->title}}</td>
                    <td>{{ $request->time}}</td>
                    <td>{{ $request->description}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
