// export function formatName(name){
//     return name.toUpperCase();
// }

function formatName(name){
    return name.toUpperCase();
}
function Name(name){
    return name;
}
function displayActiveProducts(){
    const data = new FormData();
     data.append("fn","displayActiveProducts");
     let cat_name = "";
         data.append("product_name",cat_name);
     if(document.querySelector(".product_category").selected = true){
         let cat_id = document.querySelector('.product_category').value;
         data.append("product_category",cat_id);
         if(window.location.href == 'http://localhost/CapstoneFinal/index.php'){
             let cat_name = document.querySelector('.searchProducts').value;
             data.append("product_name",cat_name);
         }
     }
     else if(document.querySelector(".product_category").selected = false){
         let cat_id = 0;
         let cat_name = "";
         data.append("product_name",cat_name);
         data.append("product_category",cat_id);
     }
    //  data.append("fn","displayActiveProducts");
     axios.post('api/product_api.php',data)
     .then(function (r){
        console.log("exported",r.data);
        // let products = r.data;
         return r.data;
     })
 }
    
export {formatName,Name,displayActiveProducts};