<x-app-layout>
    <x-slot name="content">
        <div class="py-0">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white flex text-xl">
                    <div class="flex-initial">
                        <div class="mx-8 mb-5 ">
                            <div class="w-full">
                                <div class="text-sm text-gray-600 pt-6">Главная / Статьи / Новости / {{ $news->title }}</div>
                                <div class="w-full flex justify-between gap-2 mb-6">
                                    <div class="flex-none">
                                        <div class="mt-5 mb-2 text-2xl"><b>{{ $news->title }}</b></div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ $news->title_photo_path }}" class="h-auto w-full rounded-md mb-2">
                            <div>{{ $news->body }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
