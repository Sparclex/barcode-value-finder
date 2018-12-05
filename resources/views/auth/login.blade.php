@extends('layouts.default')

@section('content')
<div class="container">
    <div class="mt-10 shadow rounded bg-white w-64 mx-auto max-w-full">
        <h1 class="font-normal pt-6 mx-6 text-center pb-4 border-b border-grey-darker">Login</h1>
        <form method="POST" action="{{ route('login') }}" class="p-6">
            @csrf
            <div class="mb-4">
                <label for="email" class="uppercase text-grey-darker text-sm block mb-2">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="border rounded p-2 block w-full {{ $errors->has('email') ? ' border-red' : ' border-grey-darker' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <p class="text-red text-sm mt-1" role="alert">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="uppercase text-grey-darker text-sm block mb-2">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" class="border rounded p-2 block w-full {{ $errors->has('password') ? ' border-red' : ' border-grey-darker' }}" name="password" required>

                    @if ($errors->has('password'))
                        <p class="text-red text-sm mt-1" role="alert">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="block ml-2" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="block bg-blue text-white rounded w-full px-4 py-2 mb-3">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
