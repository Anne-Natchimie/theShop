<div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
    <div class="md:w-4/12 2xl:w-1/4 w-full">
        <img src=" {{Storage::url($itemCart->product->defaultImage)}} " alt="Black Leather Purse" class="h-full object-center object-cover md:block" />
        </div>
        <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
        <p class="text-xs leading-3 text-gray-800 dark:text-white md:pt-0 pt-4"> {{$itemCart->product->category->name}} </p>
        <div class="flex items-center justify-between w-full">
            <p class="text-base font-black leading-none text-gray-800 dark:text-white"> {{$itemCart->product->name}} </p>
            <select data-id="{{$itemCart->id}}" aria-label="Select quantity" class="cartChangeQuantity py-2 px-1 border border-gray-200 mr-6 focus:outline-none dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">

            @for ($i=1; $i<=5; $i++)
                <option value="{{$i}}" @selected($itemCart->quantity == $i)>{{$i}}</option>
            @endfor

            </select>
        </div>
        <div class="flex items-center justify-between pt-5">
            <div class="flex items-center">

            <a href="{{route('cart-delete-one', $itemCart)}}" class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Remove</a>

            </div>
            <p class="text-base font-black leading-none text-gray-800 dark:text-white"> {{$itemCart->product->price}} € </p>
        </div>
    </div>
</div>

