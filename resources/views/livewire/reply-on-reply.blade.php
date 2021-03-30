<div>
    <button wire:click="unHidden" class="text-base flex-shrink text-blue-600 border-b border-blue-600 focus:outline-none focus:text-blue-900 focus:border-b-2 focus:border-blue-900 focus:text-lg">Ответить</button>
    <button wire:click="hidden" class="{{ $visible }} text-base flex-shrink text-blue-600 border-b border-blue-600 focus:outline-none focus:text-blue-900 focus:border-b-2 focus:border-blue-900 focus:text-lg">Отмена</button>
    <div class="{{ $visible }}">
        <form action="{{route('store-reply')}}" method="POST">
            @csrf

            <div>
                <label class="mt-3 text-2xl" for="comment">Создание ответа</label>
                    @@@
                <textarea name="body" class="@error('body') border-red-500 @enderror mt-3 w-5/6 h-12 bg-gray-200 border-b border-gray-600 text-lg" placeholder="Введите свой комментарий сюда">
                    <a href="/user/{{ $comment->user_id }}">{{ $comment->user->name }}</a>,
                </textarea>
                @error('body')
                <p class="text-red-500 text-base">Ответ не должен быть пустым</p>
                @enderror
            </div>

            <input type="text" name="comment_id" class="hidden" value="{{ $comment->id }}">

            <button type="submit" class="bg-gray-300 hover:bg-gray-600 text-black font-bold py-2 px-4 rounded mb-3">Отправить</button>
        </form>
    </div>
</div>
