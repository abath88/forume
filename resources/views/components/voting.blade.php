@props(['size' => 'big', 'number', 'link' => 'post'])
<div class="flex flex-col items-center">
    <form method="POST" action="{{ $link }}/upvote">
        @csrf

        <x-dropdown-link :href="$link . '/upvote'"
                         onclick="event.preventDefault();
                         this.closest('form').submit();">
            <svg xmlns="http://www.w3.org/2000/svg" height="{{$size == 'small' ? '.75em' : '1em'}}" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg>
        </x-dropdown-link>
    </form>

    <div class="{{ $size === 'small' ? 'text-xs' : 'text-sm'}} my-1">{{ $number }}</div>

    <form method="POST" action="{{ $link }}/downvote">
        @csrf

        <x-dropdown-link :href=" $link  . '/downvote'"
                         onclick="event.preventDefault();
                         this.closest('form').submit();">
            <svg xmlns="http://www.w3.org/2000/svg" height="{{$size == 'small' ? '.75em' : '1em'}}"  viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
        </x-dropdown-link>
    </form>
</div>

