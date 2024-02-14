<x-web-layout>

    <div class="flex flex-col items-center justify-center m-auto">

        {{-- Featured post --}}
        <div class="relative w-full py-[70px]">

            @if ($featured)
                <x-post-card-view :post="$featured"/>
            @endif

            {{-- Latest and related post --}}
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
                        <div class=" w-full relative">
                            <div class="flex-auto p-4">
                                <div class="text-center mt-10 flex justify-between items-center">
                                    <h4 class="my-1 font-semibold text-[30px] md:text-[40px] dark:text-slate-200 mb-5 leading-12">Sport</h4>
                                    <a href="#" class="px-2 py-2 lg:px-12 bg-transparent text-blue-800 text-base  rounded transition hover:bg-blue-800 hover:text-white border border-blue-800 font-medium">Voir plus</a>
                                </div>
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col-->
                </div><!--end inner-grid-->
                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                    @if ($posts)
                        @foreach ($posts as $item)
                            <x-post-card-two-by-row :post="$item" />
                        @endforeach
                    @endif
                    <!--end col-->

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
                </div><!--end inner-grid-->
                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4 justify-center">
                    @if ( $posts )
                        <x-post-master-card :post="$featured" :posts="$posts" />
                    @endif
                    <!--end col-->
                </div><!--end inner-grid-->
            </div><!--end container-->

            <!--table colum -->
            @if ( $events )

                <div class="table w-full h-full">
                    <div class="table-cell align-middle">
                        <div class="container z-1 relative">

                            <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                                <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12">
                                    <div class=" w-full relative lg:mb-0">
                                        <div class="flex-auto p-4">
                                            <div class=" mb-0">
                                                <h4 class="my-1 font-semibold text-[30px] md:text-[40px] dark:text-slate-200 leading-12">Events<br></h4>
                                            </div>
                                        </div><!--end card-body-->
                                    </div> <!--end card-->
                                </div><!--end col-->

                                <!-- events card -->
                                <x-post-card-event :events="$events"/>
                                <!--end col-->

                            </div><!--end inner-grid-->

                        </div><!--end container-->
                    </div>
                </div> <!--end table-column-->

            @endif

        </div><!--end section-->
    </div><!--end Main-->

</x-web-layout>
