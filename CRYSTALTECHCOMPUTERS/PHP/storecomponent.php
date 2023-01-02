<?php
function components($productName,$productPriceT,$productPriceN,$productImg){
   $element ="
   <div class=\"col-md-3 col-sm-6 my-3 my-md-2\">
   <form action=\"..\store.php\" method=\"post\">
     <div class=\"card shadow \" style=\"background-color: rgba(255, 255, 255, 0.125); color: aliceblue;\">
       <div>
         <img src=\"$productImg\" alt=\"products\" height=\"250\" class=\"img-fluid card-img-top\">
       </div>
       <div class=\"card-body\">
         <h5 class=\"card-title\">$productName</h5>
         <h6 style=\"color: yellow;\">
           <i class=\"fas fa-star\"></i>
           <i class=\"fas fa-star\"></i>
           <i class=\"fas fa-star\"></i>
           <i class=\"fas fa-star\"></i>
           <i class=\"far fa-star\"></i>
         </h6>
         
         <h5>
           <small><s class=\"text-secondary\">Rs $productPriceT</s></small>
           <span class=\"price\">
             $productPriceN
           </span>
         </h5>
         <button type=\"submit\" class=\"btn btn-outline-warning m-1\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i>
         </button>
         <button type=\"submit\" class=\"btn btn-outline-light\" name=\"viwe\">Viwe <i class=\"fas fa-search px-2\"></i>
         </button>
       </div>

     </div>

   </form>

 </div>"; 
 echo $element;
}  




