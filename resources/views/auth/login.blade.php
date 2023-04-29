<x-app title="Login to PHPOnline">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <x-logo
                class="mx-auto h-10 w-auto"
            />
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <x-ui.session-status class="mb-4" :status="session('status')" />

            <form class="space-y-6" action="{{ route('auth:login:submit') }}" method="POST">
                @csrf

                <div>
                    <x-form.label
                        for="email"
                        value="Email Address"
                    />
                    <div class="mt-2">
                        <x-form.input id="email" name="email" type="email" required />
                    </div>

                    <x-form.error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <x-form.label
                            for="password"
                            value="Password"
                        />
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <x-form.input id="password" name="password" type="password" required />
                    </div>
                </div>

                <div>
                    <x-form.submit>
                        Log in
                    </x-form.submit>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
            </p>
        </div>
    </div>
</x-app>
