@extends('layouts.app')

@section('title', 'Add Post')

@section('logout')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="font-semibold text-lg border border-white rounded-md px-2 hover:bg-white hover:text-slate-800">Logout</button>
    </form>
@endsection

@section('hero-content')
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col mx-auto items-center text-slate-950 mb-12 mt-0 ">
        @csrf
        <h1 class=" text-3xl text-white border-b">Add Post</h1>
        <div class="input my-5 flex flex-col gap-2">
            <label for="title" class="text-xl text-white">Title :</label>
            <input type="text" id="title" name="title"
                class="border-solid border-black border w-80 h-10 outline-none pl-3 rounded-lg">
        </div>
        <div class="category flex gap-x-4 text-white">
            <label for="category-select">Category :</label>
            <select name="category_id" id="category-select" class="bg-sky-600 px-2 py-1">
                @foreach ($categories as $category)
                    <div class="option">
                        <option id="category-{{ $category->id }}" value="{{ $category->id }}">{{ $category->title }}
                        </option>
                    </div>
                @endforeach
            </select>
        </div>


        <div class="tag flex gap-x-4 text-white pt-5">
            <label for="tag-select">Tags :</label>
            <select name="tags_id[]" id="tag-select" class="bg-sky-600 px-2 py-1" multiple>
                @foreach ($tags as $tag)
                    <div class="option">
                        <option id="tag-{{ $tag->id }}" value="{{ $tag->id }}">{{ $tag->title }}
                        </option>
                    </div>
                @endforeach
            </select>
        </div>


        <div class="input my-5 flex flex-col gap-2">
            <label for="description" class="text-white">Description :</label>
            <textarea name="description" id="description"
                class="border-solid border-black border resize-none w-96 h-auto outline-none pl-3 rounded-lg"></textarea>
        </div>


        <div class="input my-5">
            <label for="image" class="bg-blue-600 px-4 py-2 font-semibold cursor-pointer">Add Image</label>
            <input type="file" name="image" id="image" class="invisible">
        </div>

        <div class="buttons flex gap-4">
            <a href="{{ route('post.index') }}" class="bg-neutral-100 text-xl px-4 py-1 rounded-md">Back</a>
            <input type="submit" value="Send" class=" bg-neutral-100 text-xl px-4 py-1 rounded-md">
        </div>
    </form>
@endsection
