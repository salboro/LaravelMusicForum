<x-app-layout>
    <x-slot name="content">
        <hr class="w-3/4 mx-auto mt-5">
        <div class="bg-white w-3/4 mx-auto">
            <div class="px-16">
                <div class="py-6 text-3xl font-bold">Последние статьи</div>
                <div class="grid grid-cols-3 gap-8">
                    @foreach(App\Models\Article::all()->sortBy('created_at')->reverse()->take(6) as $article)
                        <div class="mb-8 col-span-1 shadow-md rounded-b-md">
                            <a href="/articles/{{ $article->type }}/{{ $article->id }}"><img src="{{ $article->title_photo_path }}" class="h-64 w-full rounded-t-md mb-2"></a>
                            <div><a href="/articles/{{ $article->type }}/{{ $article->id }}" class="hover:text-red-500"><b>{{ $article->title }}</b></a></div>
                            <div>{{ $article->excerpt }}..</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr class="pt-6 pb-1 w-3/4 mx-auto">
        <hr class="w-3/4 mx-auto">
        <div class="bg-white w-3/4 mx-auto">
            <div class="px-16">
                <div class="py-6 text-3xl font-bold">Свежие новости</div>
                <div class="grid grid-cols-3 gap-8">
                    @foreach(App\Models\news::all()->sortBy('created_at')->reverse()->take(6) as $news)
                        <div class="mb-8 col-span-1 shadow-md rounded-b-md">
                            <a href="/news/{{ $news->id }}"><img src="{{ $news->title_photo_path }}" class="h-64 w-full rounded-t-md mb-2"></a>
                            <div><a href="/news/{{ $news->id }}" class="hover:text-red-500"><b>{{ $news->title }}</b></a></div>
                            <div>{{ $news->excerpt }}..</div>
                            <div class="text-sm text-gray-500">{{ $news->created_at }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr class="w-3/4 mx-auto mb-5">

    </x-slot>
</x-app-layout>
