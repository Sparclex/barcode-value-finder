@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="font-normal my-4">Create User</h1>
    <div class="bg-white rounded shadow">
        <form method="POST" action="{{route('users.store')}}" class="p-4">
            @csrf
            <div class="flex flex-wrap items-center mb-4">
                <label class="uppercase text-grey-darker text-sm md:w-1/3 mb-2 md:mb-0" for="name">Name</label>
                <div class="w-full md:w-2/3">
                    <input type="text" class="border rounded p-2 block w-full"
                        name="name"
                        id="name"
                        placeholder="John Doe"
                        value="{{ old('name') }}"
                        required>
                    @if ($errors->has('name'))
                        <p class="text-red text-sm mt-1" role="alert">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap items-center mb-4">
                <label class="uppercase text-grey-darker text-sm md:w-1/3 mb-2 md:mb-0" for="email">E-Mail</label>
                <div class="w-full md:w-2/3">
                    <input type="email" class="border rounded p-2 block w-full"
                        name="email"
                        id="email"
                        placeholder="johndoe@example.com"
                        value="{{ old('email') }}"
                        required>
                    @if ($errors->has('email'))
                        <p class="text-red text-sm mt-1" role="alert">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap items-center mb-4">
                <label class="uppercase text-grey-darker text-sm md:w-1/3 mb-2 md:mb-0" for="password">Password</label>
                <div class="w-full md:w-2/3">
                    <input type="text" class="border rounded p-2 block w-full"
                        name="password"
                        id="password"
                        placeholder="*******"
                        required>
                    @if ($errors->has('password'))
                        <p class="text-red text-sm mt-1" role="alert">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="flex">
                <div class="hidden md:block md:w-1/3 md:h-2"></div>
                <div class="w-full md:w-2/3 flex justify-end">
                    <a class="button mr-2" href="{{route('users.index')}}">Back</a>
                    <button type="submit" class="button button-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
