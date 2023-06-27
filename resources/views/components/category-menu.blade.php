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

    <!-- Does this resource worth a follow? -->
    <div class="absolute bottom-0 right-0 mb-4 mr-4 z-10">
        <div>
            <a title="Follow me on twitter" href="https://www.twitter.com/asad_codes" target="_blank" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
                <img class="object-cover object-center w-full h-full rounded-full" src="https://www.imore.com/sites/imore.com/files/styles/large/public/field/image/2019/12/twitter-logo.jpg"/>
            </a>
        </div>
    </div>