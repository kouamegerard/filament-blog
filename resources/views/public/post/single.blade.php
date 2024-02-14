<x-web-layout>

    <div class="flex flex-col items-center justify-center m-auto">

        {{-- Featured post --}}
        <div class="relative w-full py-[70px]">

            <!--  -->
            <div class="container z-1 w-2/3">

                <div class="w-full grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12 text-center">
                        <h5 class="text-zinc-900">
                            Catégories:
                            @foreach ($single->categories as $item)
                                <span style="color: {{ $item->color }}" class="text-[12px] bg-pink-500/10 rounded font-medium py-1 px-2 inline mb-3 me-1">{{ $item->title }}</span>
                            @endforeach
                        </h5>
                        <h5 class="text-zinc-900 text-[120%] mt-4">
                            {!! $single->excerpt !!}
                        </h5>
                        <h1 class="text-zinc-900 text-[400%]">
                            {!! $single->title !!}
                        </h1>
                    </div>
                </div>
                <div class="w-full grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12">
                        <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl  rounded-2xl shadow-lg w-full relative">
                            <div class="w-full grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12">
                                <div class="w-full col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                                    @if ($single->post_media())
                                        <img src="{{ asset('storage/'.$single->id."/".$single->post_media()->file_name) }}" alt="{{ $single->title }}" class="rounded-lg w-full h-[347.475px] object-cover">
                                    @else
                                        <img src="assets/images/widgets/sm-1.jpeg" alt="{{ $single->title }}" class="rounded-lg max-w-full w-full h-[347.475px] object-cover">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 my-4 py-7">
                    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12">
                        {!! $single->content !!}
                    </div>
                </div>

            </div>
            <!--  -->

        </div>

    </div>

    <!-- Author card -->
    <div class="shadow-lg bg-slate-800 fixed bottom-0 left-0">
        <div class="py-4 px-4">
            <div class="flex gap-4 mb-1">
                <img src="{{ asset('assets/images/users/avatar-1.jpeg') }}" alt="" class="rounded-full w-[28px] h-[28px]">
                <h5 class="text-slate-300">
                    <span>by {{ $single->user->name }}</span>
                </h5>
            </div>
            
            <h5 class="text-slate-300 text-[13px]">
                <span>{{ $single->timeAgo() }}</span>
            </h5>
        </div>
    </div>

</x-web-layout>
