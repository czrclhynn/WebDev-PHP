@extends('common.main')
@section('title', 'Post')
@section('content')

<div>
<div class="container w-75 py-4">
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow-lg bg-dark text-light border-secondary">
            <div class="card-header bg-secondary text-light border-secondary">Create Post </div>
            <div class="card-body">

                <form method="POST" action="{{ route('post.createPost') }}">
                @csrf

                    <div class="mb-3">
                        <label class="form-label"> Title </label>
                        <input type="text" class="form-control bg-secondary text-light border-0" name="title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>

                        <textarea class="form-control bg-secondary text-light border-0" rows="4" name="description"></textarea>

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

                    <button type="submit" class="btn btn-light mt-3">Submit</button>
                
                </form>

            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card shadow-lg bg-dark text-light border-secondary">

            <div class="card-header bg-secondary text-light border-secondary">Post Table</div>
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
                                <td> 
                                    @if($post->status != 'published')
                                        <a href="{{ route('post.edit-form', $post->id) }}" class="bi bi-pencil-square text-light"></a> 
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
@endsection