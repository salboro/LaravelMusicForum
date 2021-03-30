<x-app-layout>
    <x-slot name="content">
        <div class="py-0">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white text-xl py-6 px-3">
                    <div class="font-bold text-2xl mb-5">Статьи пользователя {{ App\Models\User::find($user)->name }}</div>
                    <div class="flex">
                        <div class="grid grid-cols-2 gap-8">
                            @foreach(App\Models\User::find($user)->articles->sortBy('created_at')->reverse() as $article)
                                <div class="mb-8 col-span-1 shadow-md rounded-b-md">
                                    <a href="/articles/{{ $article->type }}/{{ $article->id }}"><img src="{{ $article->title_photo_path }}" class="h-64 w-full rounded-t-md mb-2"></a>
                                    <div class="mx-5">
                                        <div><a href="/articles/{{ $article->type }}/{{ $article->id }}" class="hover:text-red-500"><b>{{ $article->title }}</b></a></div>
                                        <div>{{ $article->excerpt }}..</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </x-slot>
</x-app-layout>
