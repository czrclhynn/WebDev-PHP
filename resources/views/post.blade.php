@extends('common.main')
@section('title', 'Post')
@section('content')

<div class="post-bg">
<div>
<div class="container w-75 py-3">
<div class="row">
    <div class="col-lg-12 mb-4 w-75 mx-auto">
        <div class="card shadow-lg bg-dark text-light border-secondary">
            <div class="card-header bg-dark border-secondary text-center fw-bold" style="font-size: 1.25rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #d3dbe2;">
                Create Post
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('post.createPost') }}">
                @csrf

                    <div class="mb-3">
                        <label class="form-label"> Title </label>
                        <input type="text" class="form-control bg-light text-dark border-0" name="title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>

                        <textarea class="form-control bg-light text-dark border-0" rows="4" name="description"></textarea>

                    </div>
                    <div class-"mb-3">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="archived">Archived</option>
                            <option value="delete">Delete</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id}}">{{ $status-> display_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-outline-success border border-light text-light mt-3 w-100 d-block mx-auto">Submit</button>
                
                </form>

            </div>
        </div>
    </div>
        <div class="container mb-1"></div>
            <div class = "row"></div>
            <form method = "GET" action="{{ route('post.search') }}" class="d-flex" role="search">
            <input class="form-control me-2 shadow border border-secondary" type="search" placeholder="Search" aria-label="Search" value="{{ request('param') }}" name ="param"/>
            <button class="btn btn-outline-success border border-secondary thick-border"  type="submit">Search</button>
            </form>
        </div>
    
    <div class="col-lg-12 mt-4 mb-5">
        <div class="card shadow-lg bg-dark text-light border-secondary">

            <div class="card-header bg-dark border-secondary text-center fw-bold" style="font-size: 1.25rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #d3dbe2;">
                Post Table
            </div>
            <div class="card-body">

                <table class="table table-dark table-bordered align-middle">

                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->created_by }}</td>
                                <td>{{ $post->status_display_name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td class="d-flex gap-2 text-center"> 
                                    @if($post->status != 'published')
                                        <a href="{{ route('post.edit-form', $post->id) }}" class="bi bi-pencil-square text-light" style="color:blue"></a> 
                                        
                                        <form action="{{ route('post.delete', $post->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                            class="bi bi-trash" style="color:red; border: none; background: none"></button>
                                        </form>

                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<style>
.post-bg {
    background-image: url('/images/bgbg.jpg');
    background-size: cover;
    background-position: center;
    min-height: 100vh;
}

</style>
@endsection