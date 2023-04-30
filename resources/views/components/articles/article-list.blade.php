@props(['articles'])

<div
    class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
    @forelse ($articles as $article)
        <x-articles.article-card :article="$article" />
    @empty
        <x-ui.empty-state heading="Ooopss!" message="Not articles found" />
    @endforeach
</div>
