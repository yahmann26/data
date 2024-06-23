@extends('layouts.app')

@section('title', 'Show Post')

@section('logout')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="font-semibold text-lg border border-white rounded-md px-2 hover:bg-white hover:text-slate-800">Logout</button>
    </form>
@endsection

@section('read-update')

    <div class="show-card max-w-4xl flex justify-between gap-14 text-slate-950 mx-auto my-14">

        <img src="/images/{{ $post->image }}" alt="" class=" max-w-96 ">
        <div class="content">
            <div class="user-info flex gap-x-2 mb-3 items-center">
                <img src="/images/{{ $post->user->image }}" alt="no image"
                    class="w-12 h-12 rounded-full bg-slate-400 text-sm text-slate-950 font-semibold">

                <p class="text-white font-semibold "> {{ $post->user->name }}</p>

            </div>
            <div class="category text-left">
                <p class="text-base text-gray-300 -mb-1">{{ $category->title }}</p>

            </div>
            <h1 class="main-title text-3xl text-left capitalize">{{ $post->title }}</h1>
            <div class="tags text-left overflow-auto max-w-96 text-wrap">
                <p class="mt-2">
                    @foreach ($tags as $tag)
                        <span
                            class="inline-block bg-gray-100 bg-opacity-55 text-gray-800 font-semibold text-sm px-3 py-1 rounded-md">#{{ $tag }}</span>
                    @endforeach
                </p>
            </div>
            <p class="text-white mt-5 text-left min-w-96">{{ $post->description }}</p>
            <div class="buttons flex gap-4 my-8">
                <a href="{{ route('post.index') }}" class="bg-neutral-100 text-xl px-4 py-1 rounded-md">Back</a>
                @if (auth()->check() && auth()->user()->can('update', $post))
                    <a href="{{ route('post.edit', $post->id) }}"
                        class="bg-neutral-100 text-xl px-4 py-1 rounded-md">Edit</a>
                @endif
            </div>
        </div>
    </div>

    <div class="comments bg-neutral-200 w-2/3 mx-auto px-5 py-4 rounded-lg flex flex-col gap-5">
        <h1 class="text-left text-2xl text-sky-800 mb-8">Comments</h1>

        <form action="{{ route('comments.store', $post->id) }}" method="POST"
            class="text-slate-950 text-left flex bg-slate-600 px-2 py-4 w-full rounded-lg">
            @csrf
            <textarea type="text" name="comment" id="comment"
                class="w-full  px-4 resize-none rounded-full leading-6 outline-none" placeholder="Comment by "></textarea>
            <button type="submit" class=" text-2xl ml-4 text-neutral-200"><i
                    class="fa-regular fa-paper-plane"></i></button>
        </form>

        @foreach ($post->comments as $comment)
            <div class="comment relative bg-gray-300 text-slate-950 py-2 px-3 rounded-md">

                @can('delete', $comment)
                    <form action="{{ route('comments.delete', $comment->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure tou want to delete this comment ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="absolute right-10 top-1 text-gray-600 hover:text-red-400">delete |
                        </button>
                    </form>
                @endcan
                @can('update', $comment)
                    <a href="{{ route('comments.edit', $comment->id) }}"
                        class="absolute right-2 top-1 text-gray-600 hover:text-sky-500">edit</a>
                @endcan

                <div class="user flex justify-start gap-2 items-center">
                    <img src="/images/{{ $comment->user->image }}" alt="no Image"
                        class="w-12 h-12 rounded-full bg-slate-400 text-sm text-slate-950">
                    <span>{{ $comment->user->name }}</span>

                </div>
                <div class="content text-left mt-2"> {{ $comment->comment }}</div>
            </div>
        @endforeach


    </div>
@endsection
