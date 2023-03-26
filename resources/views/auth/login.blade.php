<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4"
                           :status="session('status')" />

    <form id="login-form"
          method="POST"
          action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email"
                           :value="__('Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')"
                           class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password"
                           :value="__('Password')" />

            <x-text-input id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')"
                           class="mt-2" />
            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>


    </form>


</x-guest-layout>
<script>
    const form = document.querySelector('#login-form');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        const email = form.email.value;
        const password = form.password.value;
    
        axios.post('/login', { email, password })
            .then(response => {
                console.log(response.data);
                // handle success
                window.location.href = '/account';
            })
            .catch(error => {
                console.log(error.response.data);
                // handle error
            });
    });
</script>