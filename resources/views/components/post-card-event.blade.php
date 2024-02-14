@props(['events'])

@foreach ($events as $item)

    <div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-3 xl:col-span-3 self-center">
        <div class=" w-full relative group blog-s2-1 transition-all duration-500 ">
            <div class="flex-auto p-4 relative">
                <div class="relative overflow-hidden rounded-xl">
                    <span class="focus:outline-none text-[12px] bg-gray-900/80 text-slate-200 dark:text-slate-200 rounded font-medium py-1 px-2 absolute z-2">12 Nov 2023</span>
                    <a class="" href="#">
                        <img src="assets/images/widgets/5.jpeg" alt="" class="h-auto max-w-full rounded-xl group-[.blog-s2-1]:group-hover:scale-105 transition-all duration-500">
                        <div class="p-4 bg-gray-900/80 backdrop-blur-2xl backdrop-brightness-150 rounded-xl absolute z-1  bottom-0 ">
                            <h4 class="my-3 block text-[18px] font-medium tracking-tight text-gray-200 dark:text-white group-[.blog-s2-1]:group-hover:text-primary-500">Popular admin template you can use for your business.</h4>
                            <p class="font-normal text-gray-400 text-sm dark:text-gray-400">
                                It is a long established fact that a reader will be distracted by the readable content.
                            </p>
                        </div>
                    </a>
                </div>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div>

@endforeach
