<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Error message --}}
            @if(Session::has('message'))
            <p class="alert text-red-500 {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <p class="text-white"> Your token is:{{$token}}</p>


            <form method="POST"
                  class="mt-20"
                  action="{{ route('check.token') }}">
                @csrf

                <x-input-label for="token"
                               :value="__('Add Token')" />

                <x-text-input id="token"
                              class="block mt-1 w-full"
                              type="text"
                              name="token"
                              required
                              autocomplete="current-token" />

                <x-input-error :messages="$errors->get('token')"
                               class="mt-2" />


                <div class="mb-6">
                    <button type="submit"
                            class="bg-gray-600 text-white rounded py-2 px-5 hover:bg-gray-700">
                        Submit
                    </button>
                </div>
            </form>

        </div>

    </div>
</x-app-layout>