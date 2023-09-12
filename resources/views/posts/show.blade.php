<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex">
            <div class="w-3/12 relative"></div>
            <div class=" w-7/12 mx-auto">
                <x-post-details :post="$post"/>
            </div>
            <x-right-side />
        </div>
    </div>
</x-app-layout>
