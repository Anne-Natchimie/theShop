import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

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
        )   // End change quantity 

        // Gestion du moteur de recherche
        $("#search").autocomplete({
            source: function( request, response ) {
                $.ajax( {
                    url: "/search/"+request.term,
                    // dataType: "jsonp",
                    // data: {
                    //     term: request.term
                    // },
                    success: function( data ) {
                        //response( data );
                        console.log(data); 
                    }
                    });
                },
                minLength: 2,
                select: function( event, ui ) {
                    log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                }
            })

    }
)   // End ready 

    // Vide le panier
    function emptyCart(){
        window.location = "/cart/delete"
    }