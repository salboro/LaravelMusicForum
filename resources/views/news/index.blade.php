<x-app-layout>
    <x-slot name="content">
        <div class="py-0">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white flex text-xl">
                    <div class="mx-8 flex-initial">
                        <div class="text-sm text-gray-600 pt-6">Главная / Новости</div>
                        <div class="text-black text-2xl pt-6 pb-4"><b>Новости</b></div>
                        @livewire('show-news')
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
