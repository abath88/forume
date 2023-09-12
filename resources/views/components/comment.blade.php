@props(['comment'])
<div class="flex mb-8 last:mb-0" x-data="{ show: false }">
    <div class="flex flex-col items-center">
        <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp"
             alt="avatar"
             class="w-5 h-5 rounded-full mb-2"
        >
        <x-voting :link="'/comment/' . $comment->id" :number="$comment->votes()->sum('vote')" size="small"/>
    </div>
    <div class="ml-2 w-full">
        <div class="flex justify-between">
            <a href="#" class="text-sm">{{ $comment->author }}</a>
            <p class="text-sm">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
        <div class="mt-2 text-sm">
            {!! Str::markdown($comment->body) !!}
        </div>
        <div class="flex mt-4">
            <div class="text-gray-500 mr-2 text-sm" @click="show = ! show">
                <div class="cursor-pointer">Replay</div>
            </div>
            <a class="text-gray-500 mr-2 text-sm" href="#">Share</a>
            <a class="text-gray-500 mr-2 text-sm" href="#">Report</a>
        </div>
        <x-comment-form :action="'/comment/' . $comment->id . '/store'"/>
        @foreach($comment->comments as $subcomment)
            <div class="mt-2">
                <x-comment :comment="$subcomment" />
            </div>
        @endforeach

    </div>
</div>
