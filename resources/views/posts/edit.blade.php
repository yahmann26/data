@extends('layouts.app')

@section('title', 'Edit Post')

@section('logout')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="font-semibold text-lg border border-white rounded-md px-2 hover:bg-white hover:text-slate-800">Logout</button>
    </form>
@endsection

@section('hero-content')
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col items-center mb-16">
        @csrf
        @method('PUT')
        <div class="input my-5 flex flex-col gap-2">
            <label for="title" class="text-white font-semibold">Title :</label>
            <input type="text" id="title" name="title"
                class="border-solid border-black border w-80 h-10 outline-none pl-3 rounded-lg text-slate-950"
                value="{{ $post->title }}">
        </div>

        <div class="category flex gap-x-4 text-white">
            <label for="category-select" class="font-semibold">Category :</label>
            <select name="category_id" id="category-select" class="text-black font-semibold bg-neutral-100 px-2 py-1">
                @foreach ($categories as $category)
                    <div class="radio-input">
                        <option id="category-{{ $category->id }}" value="{{ $category->id }}"
                            {{ $category->id == $selectedCategory ? 'selected' : '' }}>{{ $category->title }}
                        </option>
                    </div>
                @endforeach
            </select>
        </div>

        <div class="tag flex flex-col gap-y-2 text-white pt-5">
            <label for="tag-select" class="mb-2 text-lg font-semibold">Tags:</label>
            <select name="tags_id[]" id="tag-select" class="bg-neutral-100 text-black px-4 py-2 font-semibold" multiple>
                @foreach ($tags as $tag)
                    <option id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                        {{ in_array($tag->id, $selectedTag) ? 'selected' : '' }}>
                        {{ $tag->title }}
                    </option>
                @endforeach
            </select>
            <p class="note text-white"><u class="text-sky-300">Note</u> : Hold Ctrl to select more than one tags</p>
        </div>

        <div class="input my-5 flex flex-col gap-2">
            <label for="description" class="text-white font-semibold">Description :</label>
            <textarea name="description" id="description"
                class="border-solid border-black border resize-none w-96 h-52 outline-none pl-3 rounded-lg text-slate-950">{{ $post->description }}</textarea>
        </div>

        <div class="input my-5 flex gap-4 items-center flex-col">
            <div class="image-current">
                <p class="text-white font-semibold">Current Image: </p>
                <img src="/images/{{ $post->image }}" alt="" class=" w-96 my-7">
            </div>
            <label for="image" class="bg-blue-400 px-4 py-2 h-9 cursor-pointer">Change Image</label>
            <input type="file" name="image" id="image" class="invisible">
        </div>
        <div class="buttons flex gap-4 text-slate-800">
            <a href="{{ route('post.index') }}" class="bg-neutral-100 text-xl px-4 py-1 rounded-md">Back</a>
            <input type="submit" value="Edit" class="bg-neutral-100 text-xl px-4 py-1 rounded-md">
        </div>
    </form>
@endsection
