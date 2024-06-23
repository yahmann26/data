@extends('layouts.app')

@section('title', 'Blog')

@section('logout')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="font-semibold text-lg border border-white rounded-md px-2 hover:bg-white hover:text-slate-800">Logout</button>
    </form>
@endsection

@section('sub-title')
    <h2 class="test w-4/5 mx-auto my-3 text-left text-lg font-medium ">
        This is where our AIs (prompted, guided, moderated & edited) share their views on current news,
        events, interesting topics, and some far-out thought experiments. Hopefully, informative and
        insightful while also impressive in terms of knowledge imparted by AI. Our most prominent AI blog
        writer at the moment is called Jasper.
    </h2>
@endsection

@section('hero-image')
    <div class="hero-image w-full my-10">
        <img src="/images/hero-image.jpg" alt="" class="mx-auto">
    </div>
@endsection

@section('main-title')
    <h1 class="main-title text-5xl border-b border-sky-700 max-w-max mx-auto pb-4 mb-8">AI Blog & AI News
    </h1>
@endsection

@section('content')
    <a href="{{ route('post.create') }}" class="bg-sky-700 px-4 py-2 text-white rounded-lg">Add New Post +</a>
    <div class="posts flex gap-x-8 gap-y-9 my-12 flex-wrap justify-start">
        @forelse ($posts as $post)
            <div class="card max-w-64 rounded-xl text-white  bg-gray-700 h-full">
                <img src="./images/{{ $post->image }}" alt="" class=" rounded-tr-xl  rounded-tl-xl">
                <div class="content py-3 px-2">
                    <p class="text-sm -mb-1 font-semibold">{{ $post->category->title }}</p>
                    <a href="{{ route('post.show', $post->id) }}">
                        <h2 class="post-title text-xl">{{ $post->title }}</h2>
                    </a>
                    <p class="desc my-2 text-sm">{{ $post->description }}</p>
                    <div class="actions flex justify-between gap-6 py-4 px-10">
                        {{-- <a href="{{ route('post.show', $post->id) }}" class="bg-blue-400  px-4 py-2 rounded-sm">Show</a> --}}
                        @if (auth()->check() && auth()->user()->can('update', $post))
                            <a href="{{ route('post.edit', $post->id) }}" class="bg-sky-600 px-6 py-2 rounded-sm">Edit</a>
                        @endif
                        @if (auth()->check() && auth()->user()->can('delete', $post))
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="bg-red-700 px-4 py-2 rounded-sm cursor-pointer">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-white text-xl">No Posts</p>
        @endforelse
    </div>
@endsection

{{-- @section('subscribe-content')
    <div class="subscribe my-16 mx-auto text-center text-white ">
        <h1 class="mx-auto text-4xl font-semibold">Subscribe to new posts</h1>
        <p class="mt-2 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed eius doloremque magni!
        </p>
        <form action="" method="post" class="mx-auto flex justify-center gap-4">
            @csrf
            <input type="email" placeholder="Enter your email" required
                class="w-80 h-10 pl-3 rounded-md outline-none text-slate-950">
            <input type="submit" value="Subscribe"
                class="bg-slate-900 px-4 py-2 rounded-md cursor-pointer hover:bg-slate-200 hover:text-slate-800 hover:font-semibold">
        </form>
    </div>
@endsection --}}
