<div class="form-group">
    <input type="file" name="thumbnail" id="thumbnail">
    @error('thumbnail')
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <Label for="title">Title</Label>
    <input type="text" value="{{ old('title') ?? $post->title}}" name="title" id="title" class="form-control">
    @error('title')
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <Label for="category">Category</Label>
    <select type="text" name="category" id="category" class="form-control">
        <option disabled selected>Choose One</option>
        @foreach ($categories as $category)
            <option {{ $category->id == $post->category_id ? 'selected': ''}} value="{{ $category->id }}"> {{ $category->name }}</option>
        @endforeach
    </select>
    @error('category')
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <Label for="tags">Tag</Label>
    <select type="text" name="tags[]" id="tags" class="form-control select2" multiple>
        @foreach ($post->tags as $tag)
            <option selected value="{{ $tag->id }}"> {{ $tag->name }}</option>
        @endforeach
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
        @endforeach
    </select>
    @error('tags')
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <Label for="body">Body</Label>
    <textarea name="body" id="body" class="form-control">{{ old('body') ?? $post->body}}</textarea>
    @error('body')
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<br>
<button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>