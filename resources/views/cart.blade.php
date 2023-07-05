@extends('layouts.theshop')

    @section('main')
    
    <section class="flex lg:flex-row flex-col w-full px-5 xl:px-12 mt-5">

        <div class="flex w-full h-full flex-col">
        {{-- @dd($cartItems) --}}

            @forelse ($cartItems as $itemCart)
                <x-liste.item-cart :itemCart='$itemCart'/>
            @empty
                <h1>Your cart is empty !</h1>
            @endforelse
            

        </div>

        <div class="flex w-full h-full">
            
            <div class="lg:w-96 md:w-8/12 w-full bg-gray-100 dark:bg-gray-900 h-full">
                <div class="flex flex-col lg:h-screen h-auto lg:px-8 md:px-7 px-4 lg:py-20 md:py-10 py-6 justify-between overflow-y-auto">
                    <div>
                        <p class="lg:text-4xl text-3xl font-black leading-9 text-gray-800 dark:text-white">Summary</p>
                        <div class="flex items-center justify-between pt-16">
                        <p class="text-base leading-none text-gray-800 dark:text-white">Subtotal</p>
                        <p class="text-base leading-none text-gray-800 dark:text-white">{{$total}} €</p>
                        </div>
                        <div class="flex items-center justify-between pt-5">
                        <p class="text-base leading-none text-gray-800 dark:text-white">Shipping</p>
                        <p class="text-base leading-none text-gray-800 dark:text-white"></p>
                        </div>
                        <div class="flex items-center justify-between pt-5">
                        <p class="text-base leading-none text-gray-800 dark:text-white">Tax</p>
                        <p class="text-base leading-none text-gray-800 dark:text-white"></p>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center pb-6 justify-between lg:pt-5 pt-20">
                        <p class="text-2xl leading-normal text-gray-800 dark:text-white">Total</p>
                        <p id="total" class="text-2xl font-bold leading-normal text-right text-gray-800 dark:text-white">{{$total}} €</p>
                        </div>
                        <button onclick="checkoutHandler1(true)" class="text-base leading-none w-full py-5 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white dark:hover:bg-gray-700">Checkout</button>

                        <button onclick="emptyCart()" class="text-base leading-none w-full mt-5 py-5 bg-white border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 text-gray-700 dark:hover:bg-gray-300">Vider le panier</button>

                        {{-- <a href="" class="text-base leading-none w-full py-5 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white dark:hover:bg-gray-700">Checkout</a href=""> --}}
                    </div>
                </div>
            </div>
        
        </div>

    </section>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>

    $(document).ready(

        ()=>{
            console.log('document chargé'); 

            // Find selected quantity
            $(".cartChangeQuantity").change(
                (event)=>{

                    // console.log('quantity :', event.target.value); 
                    // console.log('ref :', event.target.id); 

                    const quantity  = event.target.value ;
                    const id        = event.target.id ; 

                    // Envoi des données en ajax  
                    $.ajax('cart/update/'+id+'/'+quantity).done(
                        res =>{
                            console.log('res:', res.result); 
                            console.log('total:', res.total); 
                            $("#total").text(res.total);

                        }

                    )
                }
            )

        }

    )

        // Vide le panier
        function emptyCart(){
            window.location = "{{route('cart-delete')}}"
        }

        // Change la quantité du panier, id = cart 
        const changeQuantity = (id = 0) => {

            console.log('changeQuantity debut'); 
            console.log('cart Id :', id); 
            console.log('changeQuantity fin'); 

        }

</script>

<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>



    @endsection