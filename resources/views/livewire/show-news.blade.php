<div>
    <div>
        @foreach($news as $oneNews)
            <div class="grid grid-cols-3 mb-8 col-span-1 shadow-md rounded-md">
                <div class="grid-span-1 h-full"><a href="/news/{{ $oneNews->id }}"><img src="{{ $oneNews->title_photo_path }}" class="h-64 w-full rounded-l-md"></a></div>
                <div class="grid-span-2 ml-5">
                    <div><a href="/news/{{ $oneNews->id }}" class="hover:text-red-500"><b>{{ $oneNews->title }}</b></a></div>
                    <div>{{ $oneNews->excerpt }}..</div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mb-8">{{ $news->links() }}</div>
</div>
