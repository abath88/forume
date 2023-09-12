<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex">
            <div class="w-3/12 relative"></div>
            <div class=" w-7/12 mx-auto">
                <h1 class="font-bold mb-4 text-xl">Create a New Topic</h1>
                <form method="POST" action="/post/store">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus placeholder="title"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <textarea id="markdown-editor" class="block w-full rounded-md" name="body"
                              rows="3"></textarea>
                    <div class="flex justify-end">
                        <x-primary-button class="ml-auto">
                            {{ __('Post') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
            <div class="w-3/12"></div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
        <script>
            const easyMDE = new EasyMDE({
                showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
                element: document.getElementById('markdown-editor')});
        </script>
        <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    @endpush
</x-app-layout>
