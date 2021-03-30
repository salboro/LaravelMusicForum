<x-app-layout>
    <x-slot name="content">
        <div class="py-0">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white flex text-xl">
                    <x-aside-menu/>
                    <div class="flex-initial">
                        <div class="mx-8 mb-5 ">
                            <div class="w-full">
                                <div class="text-sm text-gray-600 pt-6">Главная / Статьи / {{ $article->translateType() }} / {{ $article->title }}</div>
                                <div class="w-full flex justify-between gap-2 mb-6">
                                    <div class="flex-none">
                                        <div class="mt-5 mb-2 text-2xl"><b>{{ $article->title }}</b></div>
                                        <div><a href="/user/{{ App\Models\User::find($article->user_id)->id }}" class="hover:text-red-700 font-italic text-gray-600">{{ App\Models\User::find($article->user_id)->name }}</a></div>
                                    </div>
                                    @auth
                                        <div class="flex-shrink">
                                            <div class="flex">
                                                @livewire('likes', ['article' => $article])
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                            <img src="{{ $article->title_photo_path }}" class="h-auto w-full rounded-md mb-2">
                            <div>{{ $article->body }}</div>
                        </div>

                        <div class="bg-gray-200 w-full">
                            <hr>
                            <div class="ml-3 mt-5">
                                <div class="text-2xl"><b>Рекомендуем прочесть</b></div>
                                <div class="grid grid-cols-3 gap-4">
                                    @foreach(App\Models\Article::getInterestingArticles($article) as $oneOfArticles)
                                        <div class="mb-8 col-span-1 rounded-b-md">
                                            <a href="/articles/{{ $oneOfArticles->type }}/{{ $oneOfArticles->id }}"><img src="{{ $oneOfArticles->title_photo_path }}" class="h-48 w-full rounded-md mb-2"></a>
                                            <div class="text-base"><a href="/articles/{{ $oneOfArticles->type }}/{{ $oneOfArticles->id }}" class="hover:text-red-500"><b>{{ $oneOfArticles->title }}</b></a></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="mt-10 mx-8">
                            <div class="text-3xl mb-10">Комментарии({{ $article->comments->count() }})</div>
                            <hr>
                            @auth
                                <div class="bg-gray-200 rounded-lg w-5/6 mb-3">
                                    <div class="mx-8 mt-3">
                                        <form action="{{route('store-comment')}}" method="POST">
                                            @csrf

                                            <div>
                                                <label class="mt-3 text-2xl" for="comment">Создание комантария</label>

                                                <textarea name="body" class="@error('body') border-red-500 @enderror mt-3 w-5/6 h-12 bg-gray-200 border-b border-gray-600 text-lg" placeholder="Введите свой комментарий сюда"></textarea>
                                                @error('body')
                                                <p class="text-red-500 text-base">Коментарий не должен быть пустым</p>
                                                @enderror
                                            </div>

                                            <input type="text" name="article_id" class="hidden" value="{{ $article->id }}">

                                            <button type="submit" class="bg-gray-300 hover:bg-gray-600 text-black font-bold py-2 px-4 rounded mb-3">Отправить</button>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                            <hr>
                            @forelse($comments as $comment)
                                <div class="rounded-lg shadow bg-gray-100 w-5/6">
                                    <div class="mx-4 my-4">
                                        <div class="text-xl mb-3">
                                            <a href="/user/{{ $comment->user_id }}" class="hover:text-red-500"><b>{{ App\Models\User::find($comment->user_id)->name }}</b></a>
                                            <span class="text-sm">{{ $comment->created_at }}</span>
                                        </div>
                                        <div class="text-base flex justify-between">
                                            <div class="flex-none ">{{ $comment->body }}</div>
                                            @auth <div class="flex-shrink">@livewire('reply', ['comment' => $comment])</div> @endauth
                                        </div>
                                    </div>
                                </div>
                                @foreach(App\Models\Reply::where('comment_id', $comment->id)->get() as $reply)
                                    <div class="bg-gray-100 rounded-lg mb-3 shadow ml-12 w-3/4">
                                        <div class="mx-4">
                                            <div class="text-xl mb-3">
                                                <a href="/user/{{ $reply->user_id }}" class="hover:text-red-500"><b>{{ App\Models\User::find($reply->user_id)->name }}</b></a>
                                                <span class="text-sm">{{ $reply->created_at }}</span>
                                            </div>
                                            <div class="text-base flex justify-between">
                                                <div class="flex-none ">{{ $reply->body }}</div>
                                                @auth <div class="flex-shrink">@livewire('reply-on-reply', ['comment' => $comment])</div> @endauth
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @empty
                                <div class="mb-8">Коментариев ещё нет. Будьте первым кто его оставит!</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
