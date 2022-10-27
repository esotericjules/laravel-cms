@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">{{isset($post) ? 'Edit Post' : 'Create Post'}}</div>
    <div class="card-body">
        @include('partials.errors')
        <form action="{{isset($post)? route('post.update', $post->id) : route('post.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           @if(isset($post))
           @method('PUT')
           @endif

           <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{isset($post) ? $post->title : ''}}">
        </div>
        <div class="form-group mt-3">
            <label for="description">Title</label>
            <textarea type="text" class="form-control" id="description" name="description" cols="5" rows="5">{{isset($post) ? $post->description : ''}}</textarea>
        </div>
        <div class="form-group mt-3">
            <label for="content">Content</label>
            <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content : ''}}">
            <trix-editor input="content"></trix-editor>


            {{-- <textarea type="text" class="form-control" id="content" name="content" cols="5" rows="5"></textarea> --}}
        </div>
        <div class="form-group mt-3">
            <label for="published_at">Published At</label>
            <input type="text" class="form-control" id="published_at" name="published_at" value="{{isset($post) ? $post->published_at : ''}}">
        </div>
        @if(isset($post))
        <div class="form-group mt-3">
            <img src="{{asset("/storage/$post->image")}}" alt="" style="width: 100%">
        </div>
        @endif

        <div class="form-group mt-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-grou mt-3">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @if(isset($post))
                    @if($category->id === $post->category_id)
                    selected
                    @endif
                    @endif
                    >
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        @if ($tags->count() > 0)
        <div class="form-group mt-3">
            <label for="tags">Tags</label>
           <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}"
                @if(isset($post))
                @if($post->hasTag($tag->id))
                selected
                @endif
                @endif
    >
              {{ $tag->name }}
              
           </option>
            @endforeach
           </select>
        </div>
        @endif

        <div class="form-group mt-3">
            <button class="btn btn-success" type="submit">{{isset($post) ? 'Update Post' : 'Create Post'}}</button>
        </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
<script>
    flatpickr('#published_at', {
        enableTime: true,
    })

    $(document).ready(function() {
    $('.tags-selector').select2();
});
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection 