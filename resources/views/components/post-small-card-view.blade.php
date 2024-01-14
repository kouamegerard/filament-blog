@props(["post"])

<div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-12 xl:col-span-12 ">
    <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-2">
        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-2">
            <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-4 xl:col-span-4 ">
                {{-- <img src="assets/images/widgets/sm-2.jpeg" alt="" class="max-w-full h-auto rounded-xl"> --}}
                @if ($post->post_media())
                    <img src="{{ asset('storage/'.$post->id."/".$post->post_media()->file_name) }}" alt="{{ $post->title }}" class="max-w-full w-full h-[117.3px] rounded-xl">
                @else
                    <img src="assets/images/widgets/sm-2.jpeg" alt="{{ $post->title }}" class="max-w-full w-full h-[117.3px] rounded-xl">
                @endif
            </div><!--end col-->
            <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-8 xl:col-span-8 ">
                <div class=" h-full flex flex-col p-3">
                    <div class="w-full block">
                        <span class="text-[12px] text-green-500 dark:text-green-600 rounded font-medium py-0 px-2 inline-block mb-3" style="background-color: {{ $post->categories[0]->color }}">{{ $post->categories[0]->title }}</span>
                        <span class="text-slate-700 dark:text-slate-300 font-medium text-xs ms-1">23 Aug 2023</span>
                    </div>
                    <a href="#" class="text-lg font-semibold  text-gray-600 dark:text-slate-200 block leading-5 truncate hover:underline hover:underline-offset-[4px]">
                        {{ $post->title }}
                    </a>
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end grid-->
    </div> <!--end card-->
</div><!--end col-->
