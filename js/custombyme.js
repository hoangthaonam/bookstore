function changePrice(i) {
    var price = document.getElementById('price'+i).innerHTML;
    var qtt = document.getElementById('qtity_book'+i).value;
    document.getElementById('total'+i).innerHTML = price*qtt + 'đ';
    document.cookie = 'height=Ted Mosby';
}

function updateItem(id,user_id) {
            // body...
            var quantity = $("#qtity_book"+id).val();
            
            window.location="./Main/Cart/updateCartItem/"+user_id+"/"+id+"/"+quantity;
        }
function Order(array){
    var result = [];
    for(var id of array)
    {
        if(document.getElementById("row"+id).checked===true)
        {
            result.push(id);
        }
    }
    if(result.length===0) alert("Chưa Chọn Sản Phẩm Nào!");
    else window.location="./Main/Order/load/"+result;
}