<div class="flex-initial bg-gray-400">
    <div class="mx-8">
        <div class="pt-12 pb-6 text-3xl">Статьи</div>
        <div class="pb-3"><a href="/articles/all"><div class="@if(Request::path() === 'articles/all') border-b-2 border-red-500 @else hover:text-red-500 @endif">Все</div></a></div>
        <div class="pb-3"><a href="/articles/guides"><div class="@if(Request::path() === 'articles/guides') border-b-2 border-red-500 @else hover:text-red-500 @endif">Руководства</div></a></div>
        <div class="pb-3"><a href="/articles/reviews"><div class="@if(Request::path() === 'articles/reviews') border-b-2 border-red-500 @else hover:text-red-500 @endif">Обзоры музыкальных инструментов</div></a></div>
        <div class="pb-8"><a href="/articles/discourses"><div class="@if(Request::path() === 'articles/discourses') border-b-2 border-red-500 @else hover:text-red-500 @endif">Размышления</div></a></div>
    </div>
</div>
