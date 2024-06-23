@extends('layouts.app')

@section('title', 'Login')

@section('hero-content')
    <div class="hero-content mt-14">
        <h1 class="text-3xl font-bold">Login</h1>
        <div class="form flex justify-center items-center">
            <form action="{{ route('login') }}" method="POST" class="flex flex-col text-left w-80 gap-4">
                @csrf
                <div class="input flex flex-col">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"
                        class="text-slate-950 border-solid border-black border w-80 h-10 outline-none pl-3 rounded-lg"
                        required>
                </div>
                <div class="input flex flex-col">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"
                        class="text-slate-950 border-solid border-black border w-80 h-10 outline-none pl-3 rounded-lg"
                        required>
                </div>
                <button type="submit"
                    class="bg-neutral-100 text-slate-900 font-semibold text-xl px-4 py-1 rounded-md w-44 mx-auto hover:bg-sky-900 hover:border-solid hover:border-neutral-100 hover:border">Login</button>
                <p class="text-center">Don't have an account? <a href="{{ route('register') }}"
                        class="underline hover:text-sky-500">Register</a>
                </p>
            </form>
        </div>
    </div>

@endsection
