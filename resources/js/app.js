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
            source:['Anne', "Betsy", "Yannick"]
            })

    }

)   // End ready 

    // Vide le panier
    function emptyCart(){
        window.location = "/cart/delete"
    }