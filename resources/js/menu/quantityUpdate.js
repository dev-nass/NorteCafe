document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".quantity-container").forEach(container => {
        console.log(container);
        const squareAdd = container.querySelector('.square-add');
        const squareMinus = container.querySelector('.square-minus');
        const inputQuantity = container.querySelector('.input-quantity');

        let quantityCounter = parseInt(inputQuantity.value) || 1; // Get initial value with fallback
        console.log(quantityCounter);

        // Increment Button 
        squareAdd.addEventListener('click', () => {
            quantityCounter++;
            console.log(quantityCounter);
            inputQuantity.value = quantityCounter;
            inputQuantity.setAttribute('value', quantityCounter); // Update the value attribute
        });

        // Decrement Button
        squareMinus.addEventListener('click', () => {
            if (quantityCounter > 1) {
                quantityCounter--;
                inputQuantity.value = quantityCounter;
                inputQuantity.setAttribute('value', quantityCounter); // Update the value attribute
            }
        });
    });
});