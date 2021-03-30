<div class="bg-gray-200 rounded-lg w-5/6">
    <div class="mx-8 mt-3">
        <form action="{{route('store-comment')}}" method="POST">
            @csrf

            <div>
                <label class="mt-3 text-2xl" for="comment">Создание комантария</label>


            <button type="submit" class="bg-blue-300 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-3">Отправить</button>
        </form>
    </div>
</div>
