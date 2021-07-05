@extends(backpack_view('blank'))
@section('content')
<div class="row">
    <div class="col-md-6 offset-3 pt-2">
        <h2>Create Service Requests</h2>
        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <form action="/dash/support_ticket/add" method="post" action="">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="title">Service Request Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title" required placeholder="Enter the title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" required name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <select class="custom-select custom-select-sm">
                    <option selected>Select issue category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" name="send" value="Submit" class="btn btn-secondary btn-block">
        </form>
    </div>
</div>
@endsection
