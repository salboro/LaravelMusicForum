<x-app-layout>
    <x-slot name="content">
        <div class="py-0">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white text-xl">
                    <div class="mx-auto">
                        <div class="mx-8 font-bold text-2xl mb-8 pt-5">Создание статьи</div>
                        <form action="{{route('store-article')}}" method="POST" class="mx-8">
                            @csrf

                            <div class="mb-5">
                                <label for="title">Заголовок</label>
                                <div><input type="text" class="border-4 shadow w-1/2 rounded" name="title" value="{{ old('title') }}"></div>
                                @error('title')
                                    <p class="text-red-500">Заголовок не должен быть пустым</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="title_photo_path">Введите сюда URL фотографии для заголовка</label>

                                <div><input type="url" class="border-4 shadow w-1/2 rounded" name="title_photo_path"></div>
                            </div>

                            <div class="mb-5">
                                <label for="type">Тип статьи</label>
                                <div>
                                    <input type="radio" name="type" value="guides"> Руководства <br>
                                    <input type="radio" name="type" value="reviews"> Обзор <br>
                                    <input type="radio" name="type" value="discourses"> Размышление <br>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="body">Текст статьи</label>
                                <div><textarea class="w-full h-56 shadow rounded border-4" name="body" placeholder="Пиши..."></textarea></div>
                            </div>

                            <button type="submit" class="bg-gray-300 hover:bg-gray-600 text-black font-bold py-2 px-4 rounded mb-5">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
