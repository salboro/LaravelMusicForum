<div>
    <div class="grid grid-cols-2 gap-8">
        @foreach($articles as $article)
            <div class="mb-8 col-span-1 shadow-md rounded-b-md">
                <a href="/articles/{{ $article->type }}/{{ $article->id }}"><img src="{{ $article->title_photo_path }}" class="h-64 w-full rounded-t-md mb-2"></a>
                <div class="mx-5">
                    <div><a href="/articles/{{ $article->type }}/{{ $article->id }}" class="hover:text-red-500"><b>{{ $article->title }}</b></a></div>
                    <div>{{ $article->excerpt }}..</div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mb-8">{{ $articles->links() }}</div>
</div>
