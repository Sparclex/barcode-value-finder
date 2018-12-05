@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex flex-wrap items-baseline">
        <h1 class="font-normal my-4">Users</h1>
        <a href="{{route('users.create')}}" class="ml-auto button button-primary">Create</a>
    </div>
    <div class="bg-white rounded shadow">
        <ul class="list-reset">
        @foreach($users as $user)
            <li class="border-grey-dark {{$loop->last ?: ' border-b'}}" >
                <a href="{{route('users.edit', $user)}}" class="block no-underline hover:bg-blue-lightest p-4">
                    <span class="text-black">{{$user->name}}</span>
                    <span class="text-grey-dark">{{$user->email}}</span>
                </a>
            </li>
        @endforeach
        </ul>

        {{$users->links()}}
    </div>
</div>
@endsection
