<x-app title="Register a new RSS Source">
    <x-ui.container>
        <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">
                    Source Information
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-400">
                    We will use this information to periodically fetch new articles from this source.
                </p>
            </div>

            <form class="md:col-span-2" action="{{ route('sources:store') }}" method="POST">
                @csrf

                <x-ui.session-status class="mb-4" :status="session('status')" />

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-form.label
                            for="name"
                            value="Name of this Source"
                        />
                        <div class="mt-2">
                            <x-form.input
                                id="name"
                                name="name"
                                type="text"
                                required
                            />
                        </div>

                        <x-form.error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="sm:col-span-3">
                        <x-form.label
                            for="website"
                            value="URL of this Source"
                        />
                        <div class="mt-2">
                            <x-form.input
                                id="website"
                                name="website"
                                type="text"
                                required
                            />
                        </div>

                        <x-form.error :messages="$errors->get('website')" class="mt-2" />
                    </div>

                    <div class="sm:col-span-6">
                        <x-form.label
                            for="feed_url"
                            value="Feed URL of this Source"
                        />
                        <div class="mt-2">
                            <x-form.input
                                id="feed_url"
                                name="feed_url"
                                type="text"
                                required
                            />
                        </div>

                        <x-form.error :messages="$errors->get('website')" class="mt-2" />
                    </div>

                </div>

                <div class="mt-8 flex">
                    <x-form.submit>
                        Create source
                    </x-form.submit>
                </div>
            </form>
        </div>
    </x-ui.container>
</x-app>
