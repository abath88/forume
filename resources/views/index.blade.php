<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex">
            <div class="w-3/12 relative"></div>
            <div class=" w-7/12 mx-auto">
                @foreach($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
                {{ $posts->links() }}
            </div>
            <x-right-side />
        </div>
    </div>
</x-app-layout>
