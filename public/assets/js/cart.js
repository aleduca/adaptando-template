import http from './services/http';
import currency from './services/currency';
const btns_add_to_cart = document.querySelectorAll('.add-to-cart-link');
const cart_amount = document.querySelector('.cart-amunt');
const product_count = document.querySelector('.product-count');

function totalProducts(data){
  let total = 0;

  for (const key in data) {
    total+= data[key]['subtotal'];
  }

  if(product_count){
    const total_products_in_cart = Object.keys(data).length;
    product_count.textContent = total_products_in_cart;
  }

  if(cart_amount){
    console.log(total);
    cart_amount.textContent = total === 0 ? currency(0) : currency(total);
  }
}

btns_add_to_cart.forEach(btn => {
  btn.addEventListener('click', async (event) => {
    try {
      event.preventDefault();
      const id = +btn.getAttribute('data-id');
      const {data} = await http.post('?inc=add-to-cart', {id});
      totalProducts(data);
    } catch (error) {
      console.log(error);
    }
  });
});

async function getProducts(){
  try {
    const {data} = await http.get('?inc=get-products');
    totalProducts(data);
  } catch (error) {
    console.log(error); 
  }
}

getProducts();