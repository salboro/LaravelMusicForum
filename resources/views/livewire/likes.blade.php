<div class="flex items-center">
    <button wire:click="dislike" class="focus:outline-none">
        <div class="inline-block">
            <svg class="w-10 mr-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill=" @if($article->isDislikedBy(auth()->user())) #DC143C @else #cbd5e0 @endif " fill-rule="evenodd">
                    <g id="icon-shape">
                        <path d="M13,10 L13,2 L7,2 L7,10 L2,10 L10,18 L18,10 L13,10 Z" id="Combined-Shape"></path>
                    </g>
                </g>
            </svg>
        </div>
    </button>
    <div class="inline-block text-2xl"><b>{{ $rating }}</b></div>
    <button wire:click="like" class="focus:outline-none">
        <div class="inline-block">
            <svg class="w-10 ml-1" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill=" @if($article->isLikedBy(auth()->user())) #008000 @else #cbd5e0 @endif " fill-rule="evenodd">
                    <g id="icon-shape">
                        <polygon id="Combined-Shape" points="7 10 7 18 13 18 13 10 18 10 10 2 2 10 7 10"></polygon>
                    </g>
                </g>
            </svg>
        </div>
    </button>
</div>
