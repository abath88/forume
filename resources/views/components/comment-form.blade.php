@props(['action'])
<div  x-show="show">
<form class="mt-4" method="POST" action="{{ $action }}" >
    @csrf

    <textarea class="block w-full rounded-md" name="body"
              rows="3"></textarea>
    <div class="flex justify-end mt-4">
        <x-primary-button class="ml-auto">
            {{ __('Post') }}
        </x-primary-button>
    </div>
</form>
</div>
