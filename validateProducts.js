
document.addEventListener("DOMContentLoaded", function() {
    const productForm = document.getElementById('productForm');
    
    productForm.addEventListener('submit', function(e) {
        let hasError = false;

        // Product Name validation
        const productName = document.getElementById('productName').value;
        if (productName === '') {
            document.querySelector('.name-error').textContent = 'Product name is required!';
            hasError = true;
        } else {
            document.querySelector('.name-error').textContent = '';
        }

        // Description validation
        const productDescription = document.getElementById('productDescription').value;
        if (productDescription === '') {
            document.querySelector('.description-error').textContent = 'Description is required!';
            hasError = true;
        } else {
            document.querySelector('.description-error').textContent = '';
        }

        // Category validation
        const productCategory = document.getElementById('productCategory').value;
        if (productCategory === '') {
            document.querySelector('.category-error').textContent = 'Category is required!';
            hasError = true;
        } else {
            document.querySelector('.category-error').textContent = '';
        }

        // Price validation
        const productPrice = document.getElementById('productPrice').value;
        if (productPrice === '' || productPrice <= 0) {
            document.querySelector('.price-error').textContent = 'Enter a valid price!';
            hasError = true;
        } else {
            document.querySelector('.price-error').textContent = '';
        }

        // Quantity validation
        const productQuantity = document.getElementById('productQuantity').value;
        if (productQuantity === '' || productQuantity < 0) {
            document.querySelector('.quantity-error').textContent = 'Enter a valid quantity!';
            hasError = true;
        } else {
            document.querySelector('.quantity-error').textContent = '';
        }

        // Image validations
        const productImage = document.getElementById('productImage').files;
        if (productImage.length === 0) {
            document.querySelector('.image1-error').textContent = 'Product Image 1 is required!';
            hasError = true;
        } else {
            document.querySelector('.image1-error').textContent = '';
        }

        const productImage2 = document.getElementById('productImage2').files;
        if (productImage2.length === 0) {
            document.querySelector('.image2-error').textContent = 'Product Image 2 is required!';
            hasError = true;
        } else {
            document.querySelector('.image2-error').textContent = '';
        }

        const productImage3 = document.getElementById('productImage3').files;
        if (productImage3.length === 0) {
            document.querySelector('.image3-error').textContent = 'Product Image 3 is required!';
            hasError = true;
        } else {
            document.querySelector('.image3-error').textContent = '';
        }

        const productImage4 = document.getElementById('productImage4').files;
        if (productImage2.length === 0) {
            document.querySelector('.image4-error').textContent = 'Product Image 4 is required!';
            hasError = true;
        } else {
            document.querySelector('.image4-error').textContent = '';
        }


        if (hasError) {
            e.preventDefault(); // Prevent form submission if there's an error
        }
    });
});

