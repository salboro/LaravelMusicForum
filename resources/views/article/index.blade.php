<x-app-layout>
    <x-slot name="content">
        <div class="py-0">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white flex text-xl">
                    <x-aside-menu/>
                        <div class="mx-8 flex-initial">
                            <div class="inline text-sm text-gray-600 mt-6">Главная / Статьи</div>
                            <div class="flex justify-between">
                                <div class="flex-none text-black text-2xl pt-6 pb-4"><b>Музыкальные статьи</b></div>
                                @auth() <div class="flex-shrink"><a class="hover:text-red-500" href="/create/article">Создать статью</a></div> @endauth
                            </div>
                            @livewire('show-articles', ['path' => Request::path()])
                        </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
