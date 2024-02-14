@props(["post", "posts"])


<div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-8 xl:col-span-8 self-center">
    <div class="bg-white backdrop-blur-2xl dark:bg-gray-800/40  rounded-md w-full relative hover:shadow-lg duration-500 ease-in-out">
        <div class="flex-auto p-4">
            <div class="overflow-hidden relative">
                {{-- <img class="rounded-lg w-full" src="assets/images/blogs/4.jpeg" alt="" /> --}}
                @if ($post->post_media())
                    <img src="{{ asset('storage/'.$post->id."/".$post->post_media()->file_name) }}" alt="{{ $post->title }}" class="rounded-lg w-full h-[621.475px] object-cover">
                @else
                    <img src="assets/images/widgets/sm-1.jpeg" alt="{{ $post->title }}" class="rounded-lg w-full h-[621.475px] object-cover">
                @endif
                <div class="p-4 absolute z-2 bottom-0 w-3/4">
                    <span class="focus:outline-none text-[12px] bg-slate-600 text-slate-200 dark:text-slate-200 rounded font-medium py-1 px-2">{{ $post->timeAgo() }}</span>
                    <a href="{{ route("post", ["slug"=>$post->slug]) }}" class="my-3 block text-[36px] leading-12 font-normal tracking-tight text-gray-200 dark:text-white after:absolute after:inset-0 z-3">{{ $post->title }}</a>
                    <p class="font-normal text-gray-300 text-lg dark:text-gray-400">
                        {{ $post->excerpt }}
                    </p>
                </div><!--end card-body-->
            </div>
        </div><!--end card-body-->
    </div> <!--end card-->
</div>

{{-- smaller --}}
<div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-4 xl:col-span-4 self-center">
    <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4 mb-4">
        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-4 xl:col-span-4 ">
                <img src="assets/images/widgets/sm-1.jpeg" alt="" class="max-w-full h-auto rounded-xl">
            </div><!--end col-->
            <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-8 xl:col-span-8 ">
                <div class=" h-full flex flex-col p-3">
                    <div class="w-full block mb-3">
                        <span class="text-[12px] bg-pink-500/10 text-pink-500 dark:text-pink-600 rounded font-medium py-1 px-2 inline mb-3">Helth</span>
                        <span class="text-slate-700 dark:text-slate-300 font-medium text-xs ms-2">23 Aug 2023</span>
                    </div>
                    <a href="{{ route("post", ["slug"=>$post->slug]) }}" class="text-lg sm:text-xl font-medium  text-gray-600 dark:text-slate-300 block">
                        This is a best Blogs card for your...
                    </a>
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end grid-->
    </div> <!--end card-->
    <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4 mb-4">
        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-4 xl:col-span-4 ">
                <img src="assets/images/widgets/sm-3.jpeg" alt="" class="max-w-full h-auto rounded-xl">
            </div><!--end col-->
            <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-8 xl:col-span-8 ">
                <div class=" h-full flex flex-col p-3">
                    <div class="w-full block mb-3">
                        <span class="text-[12px] bg-green-500/10 text-green-500 dark:text-green-600 rounded font-medium py-1 px-2 inline mb-3">Crypto</span>
                        <span class="text-slate-700 dark:text-slate-300 font-medium text-xs ms-2">23 Aug 2023</span>
                    </div>
                    <a href="{{ route("post", ["slug"=>$post->slug]) }}" class="text-lg sm:text-xl font-medium  text-gray-600 dark:text-slate-300 block">
                        This is a best Blogs card for your...
                    </a>
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end grid-->
    </div> <!--end card-->
    <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4 mb-4">
        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-4 xl:col-span-4 ">
                <img src="assets/images/widgets/sm-4.jpeg" alt="" class="max-w-full h-auto rounded-xl">
            </div><!--end col-->
            <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-8 xl:col-span-8 ">
                <div class=" h-full flex flex-col p-3">
                    <div class="w-full block mb-3">
                        <span class="text-[12px] bg-purple-500/10 text-purple-500 dark:text-purple-600 rounded font-medium py-1 px-2 inline mb-3">Finance</span>
                        <span class="text-slate-700 dark:text-slate-300 font-medium text-xs ms-2">23 Aug 2023</span>
                    </div>
                    <a href="{{ route("post", ["slug"=>$post->slug]) }}" class="text-lg sm:text-xl font-medium  text-gray-600 dark:text-slate-300 block">
                        This is a best Blogs card for your...
                    </a>
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end grid-->
    </div> <!--end card-->
    <a href="{{ route("posts") }}" class="block px-2 py-2 lg:px-4 bg-transparent text-blue-800 text-base rounded transition hover:bg-blue-800 hover:text-white border border-blue-800 font-medium w-full text-center">View all</a>
</div>
