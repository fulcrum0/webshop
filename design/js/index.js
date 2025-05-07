function calculateTotal(input) {
    const parentCard = input.closest(".uk-card-default"); // Bu inputun bulunduğu ürün kartı
    const prijsPerStukEl = parentCard.querySelector(".prijsPerStuk");
    const productTotalEl = parentCard.querySelector(".productTotal");

    const amount = parseFloat(input.value) || 0;

    const priceText = prijsPerStukEl.textContent;
    const price = parseFloat(priceText.replace(/[^0-9.,]/g, '').replace(',', '.')) || 0;

    const total = amount * price;
    productTotalEl.textContent = "Totaal: € " + total.toFixed(2);
}