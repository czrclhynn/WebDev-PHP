@extends('common.main')
@section('title', 'Edit Post')
@section('content')

<div class="post-bg">
<div>
<div class="container w-75 py-5">
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow-lg bg-dark text-light border-secondary">
             <div class="card-header bg-dark border-secondary text-center fw-bold" style="font-size: 1.25rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #d3dbe2;">
                Edit Post
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('post.edit-submit', $post->id) }}">
                @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input 
                            type="text" 
                            class="form-control bg-light text-dark border-0" 
                            name="title"
                            value="{{ $post->title }}"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea
                            class="form-control bg-light text-dark border-0"
                            rows="4"
                            name="description"
                        >{{ $post->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select">
                            @foreach($statuses as $status)
                                @if($post->status == $status->id)
                                    <option value="{{ $status->id }}" selected>{{ $status->display_name }}</option>
                                @else
                                    <option value="{{ $status->id }}">{{ $status->display_name }}</option>
                                @endif
                            @endforeach
                            
                        </select>
                    </div>

                    <button type="submit" class="btn btn-outline-success border border-light text-light mt-3 w-100 d-block mx-auto">Update</button>

                </form>

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
@endsection