@if($post->exists)
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @method('PUT')
    @else
    <form action="{{ route('admin.posts.store') }}" method="POST">
@endif

    @csrf

    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required minlength="10" maxlength="100">
              </div>                
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="category_id">Categoria:</label>
                <select class="form-control" id="category_id" name="category_id">
                  <option value="">Nessuna categoria</option>
                  @foreach($categories as $category)
                  <option @if(old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->label }}</option>
                  @endforeach
                </select>
            </div>  
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" id="content" name="content" required>{{ old('content',$post->content) }}</textarea>
              </div>                
        </div>
        <div class="col-11">
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="url" class="form-control" value="{{ old('image', $post->image) }}" id="image" name="image" required>
              </div>                
        </div>
        <div class="col-1">
            <img src="{{ $post->image ?? "https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc=" }}" alt="image preview" id="thumb" class="img-fluid">
        </div>
        @if($post->exists && $post->user_id !== Auth::id()) 
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="switch_author" name="switch_author" @if(old('switch_author')) checked @endif>
                    <label class="form-check-label" for="switch_author">Diventa autore | (Autore attuale: {{ $post->author->name }})</label>
                </div>
            </div>
        @endif
        @if(count($tags))
        <fieldset>
            <div class="col-12">
                <h2>Tags: </h2>
                @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->label }}" name="tags[]" @if(in_array($tag->id, old('tags', $prev_tags ?? []))) checked @endif>
                    <label class="form-check-label" for="tag-{{ $tag->label }}">{{ $tag->label }}</label>
                </div>
                @endforeach
            </div>
        </fieldset>
        @endif
    </div>

    
    <hr>
    <footer class="d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.posts.index')}}" class="btn btn-sm btn-secondary font-weight-bold"><i class="fa-solid fa-arrow-left"></i>  Torna alla lista</a>
        
        <button class="btn btn-sm btn-success font-weight-bold" type="submit">
            <i class="fa-regular fa-floppy-disk"></i>  Salva
        </button>
    </footer>
</form>