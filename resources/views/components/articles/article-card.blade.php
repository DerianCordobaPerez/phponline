@props([
    'article'
])

<article class="flex max-w-xl flex-col items-start justify-between">
    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="{{ $article->created_at->toDateTimeString() }}" class="text-gray-500">
            {{ $article->created_at->diffForHumans() }}
        </time>
        <a class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
            {{ $article->category->name }}
        </a>
    </div>
    <div class="group relative">
        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a>
                <span class="absolute inset-0" />
                {{ $article->title }}
            </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
            {{ $article->summary }}
        </p>
    </div>
    <div class="relative mt-8 flex items-center gap-x-4">
        <x-avatar
            :src="$article->user->avatar"
            :name="$article->user->name"
        />
        <div class="text-sm leading-6">
            <p class="font-semibold text-gray-900">
                <a>
                    <span class="absolute inset-0" />
                    {{ $article->user->name }}
                </a>
            </p>
            <p class="text-gray-600">
                {{ $article->user->jobTitle->name }} @ {{ $article->user->company->name }}
            </p>
        </div>
    </div>
</article>
