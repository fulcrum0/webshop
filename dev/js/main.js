function deleteProduct(product_id) {
   let form = document.querySelector('#delete-product-' + product_id);

   form.submit();
}

function calculateTotal(elem) {
   const productId = elem.id.split('-')[1];

   localStorage.setItem('amount-' + productId, elem.value);

   const prijsPerStukElem = document.getElementById("prijsPerStuk-" + productId);
   const productTotalElem = document.getElementById("productTotal-" + productId);

   const prijsPerStuk = prijsPerStukElem.textContent;
   const amount = elem.value;
   const quantity = Number(amount);
   const quantityPrice = parseFloat(prijsPerStuk.replace(/[^\d.]/g, ''));
   const total = quantity * quantityPrice;

   productTotalElem.textContent = "Totaal: €" + total.toFixed(2);

   let allTotal = 0;
   const allProductsTotal = document.querySelectorAll('[id^="productTotal-"]');

   allProductsTotal.forEach(el => {
      const text = el.textContent;
      const value = parseFloat(text.replace(/[^\d.]/g, ''));
      if (!isNaN(value)) allTotal += value;
   });

   const allTotalElem = document.getElementById("allTotal");

   allTotalElem.textContent = "€ " + allTotal.toFixed(2);

   if (quantity == 0) {
      deleteProduct(productId);
   }
}

window.addEventListener('DOMContentLoaded', () => {
   const inputs = document.querySelectorAll('[id^="amount-"]');
   inputs.forEach(input => {
      const productId = input.id.split('-')[1];
      const savedValue = localStorage.getItem('amount-' + productId);
      if (savedValue !== null) {
         input.value = savedValue;
         input.dispatchEvent(new Event('input'));
      }
   });
});