@props(['post'])

<div class="mb-4 bg-white overflow-hidden shadow-sm rounded-lg p-6 text-gray-900 flex p-4 pl-0">
    <div class="w-1/12">
        <x-voting :link="'/post' . '/' . $post->id" :number="$post->votes()->sum('vote')"/>
    </div>
    <div class="w-11/12">
        <div class="pb-4 border-b">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold mb-4">{{ $post->title }}</h1>
                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp"
                   alt="avatar"
                   class="w-6 h-6 rounded-full"
                >
            </div>
            <div class="text-sm">
                {!! Str::markdown($post->body) !!}
            </div>
        </div>

            @foreach($post->comments as $comment)
                <div class="bg-gray-100 mt-4 p-4">
                    <x-comment :comment="$comment"/>
                </div>
            @endforeach

        <div class="bg-gray-100 mt-4 p-4">
            <h1>Leave a comment</h1>
            <x-comment-form :action="'/post/' . $post->id . '/comment/store'"/>
        </div>

    </div>
</div>
