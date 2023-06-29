<!-- component -->
<!-- follow me on twitter @asad_codes -->

    <section class="relative mx-auto mt-5">
        <!-- navbar -->
        <nav class="flex justify-between w-screen">
            <div class="flex w-full">
            <!-- Nav Links -->
            <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                @foreach ($categories as $category )
                    <li><a class="hover:text-gray-200" href="{{route('category',$category->id)}}"> {{$category->name}} </a></li>
                @endforeach
            </ul>
        </nav>
    </section>
