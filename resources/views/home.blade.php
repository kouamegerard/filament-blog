<x-web-layout>


    <div class="flex flex-col items-center justify-center m-auto">
        <div class="relative w-full py-[70px]">

            @if ($featured)
                {{-- @dd($featured->post_media()) --}}
                {{-- {{ $featured->post_media() }} --}}
                {{-- @foreach ( $featured as $post ) --}}
                <x-post-card-view :post="$featured"/>
                {{-- @endforeach --}}
            @endif

            <div class="container z-1">

                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4 mt-32">
                    <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-8 xl:col-span-9 ">
                        <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4 mb-4">
                            <div class="flex justify-between">
                                <p class="dark:text-slate-200">
                                    <span class="font-medium border-b border-dashed border-pink-400">Latest Posts </span>
                                </p>
                                <p class="dark:text-slate-200">
                                    <span class="font-medium">Today </span>: 21 Augest 2023
                                </p>
                            </div>
                        </div>

                        <!-- Latest post view -->
                        @if ( $latest )
                            @foreach( $latest as $post)
                                <x-post-card-latest-view :post="$post" />
                            @endforeach
                        @endif <!--end card-->
                    </div><!--end col-->
                    <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-4 xl:col-span-3 ">
                        <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4 mb-4">
                            <span class="font-medium border-b border-dashed border-pink-400 dark:text-slate-200">Related Posts</span>
                        </div>
                        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                        @if ( $related )
                            @foreach( $related as $post)
                                <x-post-small-card-view :post="$post" />
                            @endforeach
                        @endif <!--end col-->
                        </div><!--end grid-->

                    </div><!--end col-->

                </div><!--end inner-grid-->
            </div><!--end container-->

            <div class="container z-1">
                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4 justify-center">
                    <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                        <div class=" w-full relative mb-10">
                            <div class="flex-auto p-4">
                                <div class="text-center mt-10 flex justify-between items-center">
                                    <h4 class="my-1 font-semibold text-[30px] md:text-[40px] dark:text-slate-200 mb-5 leading-12">Blogs Section For Everyone</h4>
                                    <a href="#" class="px-2 py-2 lg:px-12 bg-transparent text-blue-800 text-base  rounded transition hover:bg-blue-800 hover:text-white border border-blue-800 font-medium">Voir plus</a>
                                </div>
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col-->
                </div><!--end inner-grid-->
                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                    <div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-6 xl:col-span-6 ">
                        <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4">
                            <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                                <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-4 xl:col-span-4 ">
                                    <img src="assets/images/widgets/sm-1.jpeg" alt="" class="max-w-full h-auto rounded-xl">
                                </div><!--end col-->
                                <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-8 xl:col-span-8 ">
                                    <div class=" h-full flex flex-col p-3">
                                        <div class="w-full block">
                                            <span class="text-[12px] bg-pink-500/10 text-pink-500 dark:text-pink-600 rounded font-medium py-1 px-2 inline-block mb-3">Helth</span>
                                            <span class="text-slate-700 dark:text-slate-300 font-medium text-xs ms-2">23 Aug 2023</span>
                                        </div>
                                        <a href="#" class="text-lg sm:text-xl font-semibold  text-gray-600 dark:text-slate-200 block">
                                            This is a best Blogs card for your business template.
                                        </a>
                                        <div class="flex flex-wrap justify-between mt-auto">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded">
                                                    <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="{{ asset('assets/images/users/avatar-1.jpeg') }}" alt="logo" />
                                                </div>
                                                <div class="ml-2">
                                                    <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Fitbit Incorporation</h5></a>
                                                    <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">San Diego, California</p>
                                                </div>
                                            </div>
                                            <a href="" class="block text-slate-500 dark:text-slate-400 hover:text-slate-600 underline decoration-1 decoration-dashed underline-offset-4  decoration-primary-500 font-medium  focus:outline-none self-center">Read More <i data-lucide="arrow-right" class="self-center inline-block ms-1 h-4 w-4"></i></a>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end col-->
                            </div><!--end grid-->
                        </div> <!--end card-->
                    </div><!--end col-->
                    <div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-6 xl:col-span-6 ">
                        <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4">
                            <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                                <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-4 xl:col-span-4 ">
                                    <img src="assets/images/widgets/sm-2.jpeg" alt="" class="max-w-full h-auto rounded-xl">
                                </div><!--end col-->
                                <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-8 xl:col-span-8 ">
                                    <div class=" h-full flex flex-col p-3">
                                        <div class="w-full block">
                                            <span class="text-[12px] bg-green-500/10 text-green-500 dark:text-green-600 rounded font-medium py-1 px-2 inline-block mb-3">Fashion</span>
                                            <span class="text-slate-700 dark:text-slate-300 font-medium text-xs ms-2">23 Aug 2023</span>
                                        </div>
                                        <a href="#" class="text-lg sm:text-xl font-semibold  text-gray-600 dark:text-slate-200 block">
                                            This is a best Blogs card for your business template.
                                        </a>
                                        <div class="flex flex-wrap justify-between mt-auto">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded">
                                                    <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-3.jpeg" alt="logo" />
                                                </div>
                                                <div class="ml-2">
                                                    <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Fitbit Incorporation</h5></a>
                                                    <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">San Diego, California</p>
                                                </div>
                                            </div>
                                            <a href="" class="block text-slate-500 dark:text-slate-400 hover:text-slate-600 underline decoration-1 decoration-dashed underline-offset-4  decoration-primary-500 font-medium  focus:outline-none self-center">Read More <i data-lucide="arrow-right" class="self-center inline-block ms-1 h-4 w-4"></i></a>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end col-->
                            </div><!--end grid-->
                        </div> <!--end card-->
                    </div><!--end col-->
                    <div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-6 xl:col-span-6 ">
                        <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4">
                            <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                                <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-4 xl:col-span-4 ">
                                    <img src="assets/images/widgets/sm-3.jpeg" alt="" class="max-w-full h-auto rounded-xl">
                                </div><!--end col-->
                                <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-8 xl:col-span-8 ">
                                    <div class=" h-full flex flex-col p-3">
                                        <div class="w-full block">
                                            <span class="text-[12px] bg-primary-500/10 text-primary-500 dark:text-primary-600 rounded font-medium py-1 px-2 inline-block mb-3">Crypto</span>
                                            <span class="text-slate-700 dark:text-slate-300 font-medium text-xs ms-2">23 Aug 2023</span>
                                        </div>
                                        <a href="#" class="text-lg sm:text-xl font-semibold  text-gray-600 dark:text-slate-200 block">
                                            This is a best Blogs card for your business template.
                                        </a>
                                        <div class="flex flex-wrap justify-between mt-auto">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded">
                                                    <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-2.jpeg" alt="logo" />
                                                </div>
                                                <div class="ml-2">
                                                    <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Fitbit Incorporation</h5></a>
                                                    <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">San Diego, California</p>
                                                </div>
                                            </div>
                                            <a href="" class="block text-slate-500 dark:text-slate-400 hover:text-slate-600 underline decoration-1 decoration-dashed underline-offset-4  decoration-primary-500 font-medium  focus:outline-none self-center">Read More <i data-lucide="arrow-right" class="self-center inline-block ms-1 h-4 w-4"></i></a>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end col-->
                            </div><!--end grid-->
                        </div> <!--end card-->
                    </div><!--end col-->
                    <div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-6 xl:col-span-6 ">
                        <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative p-4">
                            <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                                <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-4 xl:col-span-4 ">
                                    <img src="assets/images/widgets/sm-4.jpeg" alt="" class="max-w-full h-auto rounded-xl">
                                </div><!--end col-->
                                <div class="col-span-12 sm:col-span-6  md:col-span-6 lg:col-span-8 xl:col-span-8 ">
                                    <div class=" h-full flex flex-col p-3">
                                        <div class="w-full block">
                                            <span class="text-[12px] bg-yellow-500/10 text-yellow-500 dark:text-yellow-600 rounded font-medium py-1 px-2 inline-block mb-3">Finance</span>
                                            <span class="text-slate-700 dark:text-slate-300 font-medium text-xs ms-2">23 Aug 2023</span>
                                        </div>
                                        <a href="#" class="text-lg sm:text-xl font-semibold  text-gray-600 dark:text-slate-200 block">
                                            This is a best Blogs card for your business template.
                                        </a>
                                        <div class="flex flex-wrap justify-between mt-auto">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded">
                                                    <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-4.jpeg" alt="logo" />
                                                </div>
                                                <div class="ml-2">
                                                    <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Fitbit Incorporation</h5></a>
                                                    <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">San Diego, California</p>
                                                </div>
                                            </div>
                                            <a href="" class="block text-slate-500 dark:text-slate-400 hover:text-slate-600 underline decoration-1 decoration-dashed underline-offset-4  decoration-primary-500 font-medium  focus:outline-none self-center">Read More <i data-lucide="arrow-right" class="self-center inline-block ms-1 h-4 w-4"></i></a>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end col-->
                            </div><!--end grid-->
                        </div> <!--end card-->
                    </div><!--end col-->
                </div><!--end inner-grid-->
            </div><!--end container-->

            <div class="container z-1">
                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4 justify-between mt-8">
                    <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
                        <div class=" w-full relative mb-10 lg:mb-0">
                            <div class="flex-auto p-4">
                                <div class=" mb-0">
                                    <h4 class="my-1 font-semibold text-[30px] md:text-[40px] dark:text-slate-200 leading-12">Earth<br></h4>
                                </div>
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col-->
                    {{-- <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-6 self-center">
                        <div class=" w-full relative">
                            <div class="flex-auto p-4 justify-end">
                                <div class="flex justify-end">
                                    <a href="#" class="block py-3 px-6 border-gray-900 border-1">Voir plus</a>
                                </div>
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col--> --}}
                </div><!--end inner-grid-->
                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4 justify-center">

                    <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-8 xl:col-span-8 self-center">
                        <div class="bg-white backdrop-blur-2xl dark:bg-gray-800/40  rounded-md w-full relative hover:shadow-lg duration-500 ease-in-out">
                            <div class="flex-auto p-4">
                                <div class="overflow-hidden relative">
                                    <img class="rounded-lg w-full" src="assets/images/blogs/4.jpeg" alt="" />
                                    <div class="p-4 absolute z-2 bottom-0 w-3/4">
                                        <span class="focus:outline-none text-[12px] bg-slate-600 text-slate-200 dark:text-slate-200 rounded font-medium py-1 px-2">27 Aug 2023</span>
                                        <a href="#" class="my-3 block text-[36px] leading-12 font-normal tracking-tight text-gray-200 dark:text-white after:absolute after:inset-0 z-3">Popular admin template you can use for your business.</a>
                                        <p class="font-normal text-gray-300 text-lg dark:text-gray-400">
                                            It is a long established fact that a reader will be distracted by the readable content.
                                        </p>
                                    </div><!--end card-body-->
                                </div>
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col-->
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
                                        <a href="#" class="text-lg sm:text-xl font-medium  text-gray-600 dark:text-slate-300 block">
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
                                        <a href="#" class="text-lg sm:text-xl font-medium  text-gray-600 dark:text-slate-300 block">
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
                                        <a href="#" class="text-lg sm:text-xl font-medium  text-gray-600 dark:text-slate-300 block">
                                            This is a best Blogs card for your...
                                        </a>
                                    </div><!--end card-body-->
                                </div><!--end col-->
                            </div><!--end grid-->
                        </div> <!--end card-->
                        <a class="block px-2 py-2 lg:px-4 bg-transparent text-blue-800 text-base rounded transition hover:bg-blue-800 hover:text-white border border-blue-800 font-medium w-full text-center">View all</a>
                    </div><!--end col-->
                </div><!--end inner-grid-->
            </div><!--end container-->

            <!--table colum -->
            <div class="table w-full h-full">
                <div class="table-cell align-middle">
                    <div class="container z-1 relative">

                        {{-- <div class="absolute top-20 hidden sm:hidden md:hidden lg:block">
                            <img src="assets/images/dot-p-1.png" alt="" class="">
                        </div> --}}

                        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12">
                                <div class=" w-full relative lg:mb-0">
                                    <div class="flex-auto p-4">
                                        <div class=" mb-0">
                                            <h4 class="my-1 font-semibold text-[30px] md:text-[40px] dark:text-slate-200 leading-12">Earth<br></h4>
                                        </div>
                                    </div><!--end card-body-->
                                </div> <!--end card-->
                            </div><!--end col-->

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
                            </div><!--end col-->

                            <div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-3 xl:col-span-3 self-center">
                                <div class=" w-full relative group blog-s2-1 transition-all duration-500 ">
                                    <div class="flex-auto p-4 relative">
                                        <div class="relative overflow-hidden rounded-xl">
                                            <span class="focus:outline-none text-[12px] bg-gray-900/80 text-slate-200 dark:text-slate-200 rounded font-medium py-1 px-2 absolute z-2">12 Nov 2023</span>
                                            <a class="" href="#">
                                                <img src="assets/images/widgets/2.jpeg" alt="" class="h-auto max-w-full rounded-xl group-[.blog-s2-1]:group-hover:scale-105 transition-all duration-500">
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
                            </div><!--end col-->

                            <div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-3 xl:col-span-3 self-center">
                                <div class=" w-full relative group blog-s2-1 transition-all duration-500 ">
                                    <div class="flex-auto p-4 relative">
                                        <div class="relative overflow-hidden rounded-xl">
                                            <span class="focus:outline-none text-[12px] bg-gray-900/80 text-slate-200 dark:text-slate-200 rounded font-medium py-1 px-2 absolute z-2">12 Nov 2023</span>
                                            <a class="" href="#">
                                                <img src="assets/images/widgets/3.jpeg" alt="" class="h-auto max-w-full rounded-xl group-[.blog-s2-1]:group-hover:scale-105 transition-all duration-500">
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
                            </div><!--end col-->

                            <div class="col-span-12 sm:col-span-12  md:col-span-6 lg:col-span-3 xl:col-span-3 self-center">
                                <div class=" w-full relative group blog-s2-1 transition-all duration-500 ">
                                    <div class="flex-auto p-4 relative">
                                        <div class="relative overflow-hidden rounded-xl">
                                            <span class="focus:outline-none text-[12px] bg-gray-900/80 text-slate-200 dark:text-slate-200 rounded font-medium py-1 px-2 absolute z-2">12 Nov 2023</span>
                                            <a class="" href="#">
                                                <img src="assets/images/widgets/4.jpeg" alt="" class="h-auto max-w-full rounded-xl group-[.blog-s2-1]:group-hover:scale-105 transition-all duration-500">
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
                            </div><!--end col-->

                        </div><!--end inner-grid-->

                        {{-- <div class="absolute bottom-10 right-[15%] hidden sm:hidden md:hidden lg:block">
                            <img src="assets/images/pet-3.png" alt="" class="">
                        </div> --}}
                    </div><!--end container-->
                </div>
            </div> <!--end table-column-->
        </div><!--end section-->
    </div><!--end Main-->


</x-web-layout>
