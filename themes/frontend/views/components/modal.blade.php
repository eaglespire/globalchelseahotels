<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    <!-- Trigger for Modal -->
    <button type="button" @click="showModal = true" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Open modal</button>


    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal">
        <!-- Modal inner -->
        <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <div class="flex items-center justify-between">
                <h5 class="mr-3 text-black max-w-none">Title</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- content -->
            <div>Content goes here</div>
        </div>
    </div>
</div>
