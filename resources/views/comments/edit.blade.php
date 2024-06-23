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
    <div class="edit flex flex-col mx-auto items-center text-slate-950 mb-12 mt-0 ">
        <h1 class="text-4xl text-white font-semibold mb-10">Edit Comment</h1>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST"
            class="text-slate-950 text-left flex bg-neutral-100 w-96 rounded-xl px-10 py-6">
            @csrf
            @method('PATCH')
            <textarea type="text" name="comment" id="comment" class="w-full px-4 resize-none rounded-full "
                placeholder="Comment by ">{{ $comment->comment }}</textarea>
            <button type="submit" class=" text-2xl ml-4 text-sky-700"><i class="fa-regular fa-paper-plane"></i></button>
        </form>
    </div>
@endsection
