var isShowing = false; 
//modify.js
function validateAddForm()
{
   var modifyForm = document.getElementById("addForm");
   var product_category_code = modifyForm.product_category_code.value;
   var product_name = modifyForm.product_name.value;
   var product_price = modifyForm.product_price.value;
   var product_inventory = modifyForm.product_inventory.value;
   var product_size = modifyForm.product_size.value;
   var product_description = modifyForm.product_description.value;
   var check = true;
   if(!noFunnyBusiness(product_name))
   {
       alert("Error: Invalid product name!");
       check = false;
   }
   if(!noFunnyBusiness(product_description))
   {
       alert("Error: Invalid product description!");
       check = false;
   }
   if(!valdateNum(product_price))
   {
       alert("Error: Invalid product price!");
       check = false;
   }
   if(!valdateNum(product_inventory))
   {
       alert("Error: There must be at least one!");
       check = false;
   }
   if(!valdateDropdown(product_size))
   {
       alert("Error: choose a product size!");
       check = false;
   }
   if(!valdateDropdown(product_category_code))
   {
       alert("Error: choose a product category!");
       check = false;
   }
   if(!valdateDropdown(product_category_code))
   {
       alert("Error: choose a product category!");
       check = false;
   }
   
   return check;
   
}

function validateModifyForm(id)
{
   var str = "modify";
   var modifyForm = document.getElementById(str.concat(id.toString()));
   var product_category_code = modifyForm.product_category_code.value;
   var product_name = modifyForm.product_name.value;
   var product_price = modifyForm.product_price.value;
   var product_inventory = modifyForm.product_inventory.value;
   var product_description = modifyForm.product_description.value;
   var check = true;
   if(!noFunnyBusiness(product_name))
   {
       alert("Error: Invalid product name!");
       check = false;
   }
   if(!noFunnyBusiness(product_description))
   {
       alert("Error: Invalid product description!");
       check = false;
   }
   if(!valdateNum(product_price))
   {
       alert("Error: Invalid product price!");
       check = false;
   }
   if(!valdateNum(product_inventory))
   {
       alert("Error: There must be at least one!");
       check = false;
   }
   if(!validateDropdown(product_category_code))
   {
       alert("Error: choose a product category!");
       check = false;
   }
   
   return check;
}

function valdateNum(num){
    var check = true;
    var p1 = num > 0;
    var p2 = num.search(/([^\d.]|^$)/) === -1;
    check = p1 && p2;
    return check;
}

function noFunnyBusiness(text)
{
    var p1 = text.search(/([^\w\d\s.]|^$)/);
    return p1 === -1;
    
}

function validateDropdown(text)
{
    return text !== "...";
}

function showFileLoad()
{
    var modifyForm = document.getElementById("addForm");
    var product_category_code = modifyForm.product_category_code.value;
    var file = document.getElementById("upload_files");
    if(product_category_code !== "PROP" && product_category_code !== "DICE" && product_category_code !== "MOD" && product_category_code !== "..."){
        if(!isShowing){
            isShowing = true;
            file.style.visibility = 'visible';
        }
    }
    else
    {
        if(isShowing){
            isShowing = false;
            file.style.visibility = 'hidden';
        }
    }
}