@extends('../layout/' . $layout)

@section('subhead')
    <title>Organization</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Invoice</h2>
    </div>
    <!-- BEGIN: Display Information -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Invoice Information</h2>
        </div>
        <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row flex-col">
                <form method="POST" action="{!! route('invoice.store') !!}">
                    @csrf
                <div class="flex-1 mt-6 xl:mt-0">
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12 2xl:col-span-6">
                            <div>
                                <label for="update-profile-form-1" class="form-label">Customer Name</label>
                                <select id="modal-form-6" name="customer_id" class="tom-select w-full">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->first_name . ' ' . $customer->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3" class="form-label">Invoice Ref No</label>
                                <input id="update-profile-form-1" type="text" class="form-control" name="address_line_2">
                            </div>
                        </div>
                        <div class="col-span-12 2xl:col-span-6">
                            <div class="mt-3 2xl:mt-0">
                                <label for="update-profile-form-3" class="form-label">Invoice Date</label>
                                <input type="text" name="delivery_date" class="datepicker form-control"
                                    data-single-mode="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label">Products</label>
                <table id="product-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="product-entry">
                            <td>
                                <select class="tom-select custom-select selectProduct" name="product[]"
                                    style="width: 380px;" required>
                                    <option value="" selected>Select Product</option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}" data-unit-price="{{ $item->unit_price }}">
                                            {{ $item->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control quantity" placeholder="Quantity">
                            </td>
                            <td>
                                <input type="text" class="form-control totalPrice" placeholder="Price" disabled>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger remove-product">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="addProductButton" class="btn btn-primary mt-3">Add Product</button>
            </div>

            <div class="mt-2">
                <label class="form-label">Tax</label>
                <table id="tax-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tax Code</th>
                            <th>Percentage</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tax-entry">
                            <td>
                                <select class="custom-select selectTax" name="tax[]" style="width: 380px;" required>
                                    <option value="" selected>Select Tax</option>
                                    <!-- PHP loop to populate tax options -->
                                    <?php foreach ($taxes as $tax): ?>
                                    <option value="<?php echo $tax->id; ?>" data-percentage="<?php echo $tax->percentage; ?>">
                                        <?php echo $tax->tax_code; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control percentage" placeholder="Percentage" disabled>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger remove-tax">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary mt-3 addTaxButton">Add Tax</button>
                <div id="totalAmount" class="mt-3">
                    Total Amount <span id="totalValue" hidden>0.00</span>
                </div>
                <input type="text" class="form-control mt-3" id="grandTotal" placeholder="Grand Total" disabled>
                <div class="mt-3">
                    Total Tax Amount <input type="text" class="form-control" id="totalTaxAmountValue" readonly>
                </div>
                <div class="mt-3">
                    Discount Amount <input type="text" name="discount" class="form-control" id="discountAmountValue">
                </div>
            </div>

            <div class="mt-3">
                Final Total <input type="text" class="form-control" id="finalTotal" readonly>
            </div>

            {{-- <script>
                // Function to calculate and update the total price
                function updateTotalPrice(productEntry) {
                    const selectProduct = productEntry.querySelector('.selectProduct');
                    const quantityInput = productEntry.querySelector('.quantity');
                    const totalPriceInput = productEntry.querySelector('.totalPrice');

                    // Retrieve the selected product's unit price
                    const selectedOption = selectProduct.options[selectProduct.selectedIndex];
                    const unitPrice = selectedOption.getAttribute('data-unit-price');

                    // Calculate the total price for this product entry
                    const quantity = parseFloat(quantityInput.value) || 0;
                    const totalPrice = unitPrice * quantity;

                    // Update the total price input field
                    totalPriceInput.value = totalPrice.toFixed(2);

                    // Recalculate and update the total amount
                    calculateAndUpdateTotalAmount();

                    // Update the final total when a product is selected
                    calculateAndDisplayFinalTotal();
                }

                function updateFinalTotalOnTaxSelection() {
                    const selectTax = document.querySelector('.selectTax');
                    selectTax.addEventListener('click', () => {
                        calculateAndDisplayFinalTotal();
                    });
                }

                // Initialize event listener for the tax select element
                updateFinalTotalOnTaxSelection();

                // Function to calculate and update the total amount
                function calculateAndUpdateTotalAmount() {
                    const totalValueElement = document.getElementById('totalValue');
                    const grandTotalInput = document.getElementById('grandTotal');
                    const totalPriceInputs = document.querySelectorAll('.totalPrice');
                    let totalAmount = 0;

                    totalPriceInputs.forEach((totalPriceInput) => {
                        totalAmount += parseFloat(totalPriceInput.value) || 0;
                    });

                    totalValueElement.textContent = totalAmount.toFixed(2); // Update the total amount display
                    grandTotalInput.value = totalAmount.toFixed(2); // Update the grand total input
                }

                // Function to add a new product entry
                function addProductEntry() {
                    const productTableBody = document.querySelector('#product-table tbody');
                    const newRow = productTableBody.insertRow();
                    newRow.classList.add('product-entry');

                    const productCell = newRow.insertCell();
                    const quantityCell = newRow.insertCell();
                    const priceCell = newRow.insertCell();
                    const actionCell = newRow.insertCell();

                    productCell.innerHTML = `
                        <select class="tom-select custom-select selectProduct" name="product[]" style="width: 380px;" required>
                            <option value="" selected>Select Product</option>
                            @foreach ($products as $item)
                            <option value="{{ $item->id }}" data-unit-price="{{ $item->unit_price }}">
                                {{ $item->product_name }}
                            </option>
                            @endforeach
                        </select>
                    `;

                    quantityCell.innerHTML = `<input type="text" class="form-control quantity" placeholder="Quantity">`;

                    priceCell.innerHTML = `<input type="text" class="form-control totalPrice" placeholder="Price" disabled>`;

                    actionCell.innerHTML = `<button class="btn btn-danger remove-product">Remove</button>`;

                    // Add event listeners to the new product entry
                    const selectProduct = productCell.querySelector('.selectProduct');
                    const quantityInput = quantityCell.querySelector('.quantity');

                    selectProduct.addEventListener('change', () => {
                        updateTotalPrice(newRow);
                    });

                    quantityInput.addEventListener('input', () => {
                        updateTotalPrice(newRow);
                    });
                }

                // Add an event listener to the "Add Product" button
                const addProductButton = document.getElementById('addProductButton');
                addProductButton.addEventListener('click', () => {
                    addProductEntry();
                });

                // Add event listener to remove product button
                const productTableBody = document.querySelector('#product-table tbody');
                productTableBody.addEventListener('click', (e) => {
                    if (e.target.classList.contains('remove-product')) {
                        const row = e.target.closest('.product-entry');
                        productTableBody.removeChild(row);
                        calculateAndUpdateTotalAmount(); // Recalculate and update the total amount
                    }
                });

                // Initialize event listeners for the existing product entries
                const existingProductEntries = document.querySelectorAll('.product-entry');
                existingProductEntries.forEach((productEntry) => {
                    const selectProduct = productEntry.querySelector('.selectProduct');
                    const quantityInput = productEntry.querySelector('.quantity');

                    selectProduct.addEventListener('change', () => {
                        updateTotalPrice(productEntry);
                    });

                    quantityInput.addEventListener('input', () => {
                        updateTotalPrice(productEntry);
                    });
                });

                // Calculate and display the initial total amount
                calculateAndUpdateTotalAmount();

                // Function to update the percentage when a tax is selected
                document.addEventListener('change', function(e) {
                    if (e.target.classList.contains('selectTax')) {
                        const selectedOption = e.target.options[e.target.selectedIndex];
                        const percentageInput = e.target.closest('tr').querySelector('.percentage');
                        percentageInput.value = selectedOption.getAttribute('data-percentage') + '%';
                        calculateTotalPercentage();
                    }
                });

                // Function to add a new tax row
                document.querySelector('.addTaxButton').addEventListener('click', function() {
                    const taxTable = document.querySelector('#tax-table tbody');
                    const newRow = taxTable.querySelector('.tax-entry').cloneNode(true);
                    newRow.querySelector('.selectTax').selectedIndex = 0;
                    newRow.querySelector('.percentage').value = '';
                    taxTable.appendChild(newRow);
                });

                // Function to remove a tax row
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-tax')) {
                        e.target.closest('tr').remove();
                        calculateTotalPercentage();
                    }
                });


                // Function to calculate the total percentage of added taxes
                function calculateTotalPercentage() {
                    const percentageInputs = document.querySelectorAll('.percentage');
                    let totalPercentage = 0;
                    percentageInputs.forEach(function(input) {
                        const percentage = parseFloat(input.value.replace('%', '')); // Remove % sign before parsing
                        if (!isNaN(percentage)) {
                            totalPercentage += percentage;
                        }
                    });

                    // Update each percentage input with the percentage symbol
                    percentageInputs.forEach(function(input) {
                        input.value = input.value.replace('%', '') + '%';
                    });

                    // Set the total percentage in the input field
                    document.querySelector('#totalTaxAmountValue').value = totalPercentage.toFixed(2) + '%';
                }

                // Initial calculation when the page loads
                calculateTotalPercentage();
                
                document.addEventListener('change', function(e) {
                    if (e.target.classList.contains('selectTax')) {
                        const selectedOption = e.target.options[e.target.selectedIndex];
                        const percentageInput = e.target.closest('tr').querySelector('.percentage');
                        percentageInput.value = selectedOption.getAttribute('data-percentage') + '%';
                        calculateTotalPercentage();
                    }
                });

                function calculateAndDisplayFinalTotal() {
                    const grandTotalInput = document.getElementById('grandTotal');
                    const totalTaxAmountInput = document.getElementById('totalTaxAmountValue');
                    const finalTotalInput = document.getElementById('finalTotal');

                    const grandTotal = parseFloat(grandTotalInput.value) || 0;
                    const totalTaxAmount = parseFloat(totalTaxAmountInput.value.replace('%', '')) || 0;

                    // Calculate the final total
                    const finalTotal = grandTotal + (totalTaxAmount / 100) * grandTotal;

                    finalTotalInput.value = finalTotal.toFixed(2);
                }

                // Call the function to calculate and display the final total initially
                calculateAndDisplayFinalTotal();

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-tax')) {
                        e.target.closest('tr').remove();
                        calculateTotalPercentage();

                        // Call calculateAndDisplayFinalTotal after removing a tax
                        calculateAndDisplayFinalTotal();
                    }
                });

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-product')) {
                        e.target.closest('tr').remove();
                        calculateTotalPercentage();

                        // Call calculateAndDisplayFinalTotal after removing a tax
                        calculateAndDisplayFinalTotal();
                    }
                });

                // Call the function to calculate and display the final total initially
                calculateAndDisplayFinalTotal();
            </script> --}}
            <script>
                // Function to calculate and update the total price
                function updateTotalPrice(productEntry) {
                    const selectProduct = productEntry.querySelector('.selectProduct');
                    const quantityInput = productEntry.querySelector('.quantity');
                    const totalPriceInput = productEntry.querySelector('.totalPrice');
            
                    // Retrieve the selected product's unit price
                    const selectedOption = selectProduct.options[selectProduct.selectedIndex];
                    const unitPrice = selectedOption.getAttribute('data-unit-price');
            
                    // Calculate the total price for this product entry
                    const quantity = parseFloat(quantityInput.value) || 0;
                    const totalPrice = unitPrice * quantity;
            
                    // Update the total price input field
                    totalPriceInput.value = totalPrice.toFixed(2);
            
                    // Recalculate and update the total amount
                    calculateAndUpdateTotalAmount();
            
                    // Update the final total when a product is selected
                    calculateAndDisplayFinalTotal();
                }
            
                // Function to calculate and update the total amount
                function calculateAndUpdateTotalAmount() {
                    const totalValueElement = document.getElementById('totalValue');
                    const grandTotalInput = document.getElementById('grandTotal');
                    const totalPriceInputs = document.querySelectorAll('.totalPrice');
                    let totalAmount = 0;
            
                    totalPriceInputs.forEach((totalPriceInput) => {
                        totalAmount += parseFloat(totalPriceInput.value) || 0;
                    });
            
                    totalValueElement.textContent = totalAmount.toFixed(2); // Update the total amount display
                    grandTotalInput.value = totalAmount.toFixed(2); // Update the grand total input
                }
            
                // Function to add a new product entry
                function addProductEntry() {
                    const productTableBody = document.querySelector('#product-table tbody');
                    const newRow = productTableBody.insertRow();
                    newRow.classList.add('product-entry');
            
                    const productCell = newRow.insertCell();
                    const quantityCell = newRow.insertCell();
                    const priceCell = newRow.insertCell();
                    const actionCell = newRow.insertCell();
            
                    productCell.innerHTML = `
                        <select class="tom-select selectProduct" name="product[]" style="width: 380px;" required>
                            <option value="" selected>Select Product</option>
                            @foreach ($products as $item)
                            <option value="{{ $item->id }}" data-unit-price="{{ $item->unit_price }}">
                                {{ $item->product_name }}
                            </option>
                            @endforeach
                        </select>
                    `;
            
                    quantityCell.innerHTML = `<input type="text" class="form-control quantity" placeholder="Quantity">`;
            
                    priceCell.innerHTML = `<input type="text" class="form-control totalPrice" placeholder="Price" disabled>`;
            
                    actionCell.innerHTML = `<button class="btn btn-danger remove-product">Remove</button>`;
            
                    // Add event listeners to the new product entry
                    const selectProduct = productCell.querySelector('.selectProduct');
                    const quantityInput = quantityCell.querySelector('.quantity');
            
                    selectProduct.addEventListener('change', () => {
                        updateTotalPrice(newRow);
                    });
            
                    quantityInput.addEventListener('input', () => {
                        updateTotalPrice(newRow);
                    });
                }
            
                // Add an event listener to the "Add Product" button
                const addProductButton = document.getElementById('addProductButton');
                addProductButton.addEventListener('click', () => {
                    addProductEntry();
                });
            
                // Add event listener to remove product button
                const productTableBody = document.querySelector('#product-table tbody');
                productTableBody.addEventListener('click', (e) => {
                    if (e.target.classList.contains('remove-product')) {
                        const row = e.target.closest('.product-entry');
                        productTableBody.removeChild(row);
                        calculateAndUpdateTotalAmount(); // Recalculate and update the total amount
                    }
                });
            
                // Initialize event listeners for the existing product entries
                const existingProductEntries = document.querySelectorAll('.product-entry');
                existingProductEntries.forEach((productEntry) => {
                    const selectProduct = productEntry.querySelector('.selectProduct');
                    const quantityInput = productEntry.querySelector('.quantity');
            
                    selectProduct.addEventListener('change', () => {
                        updateTotalPrice(productEntry);
                    });
            
                    quantityInput.addEventListener('input', () => {
                        updateTotalPrice(productEntry);
                    });
                });
            
                // Calculate and display the initial total amount
                calculateAndUpdateTotalAmount();
            
                // Function to update the percentage when a tax is selected
                document.addEventListener('change', function(e) {
                    if (e.target.classList.contains('selectTax')) {
                        const selectedOption = e.target.options[e.target.selectedIndex];
                        const percentageInput = e.target.closest('tr').querySelector('.percentage');
                        percentageInput.value = selectedOption.getAttribute('data-percentage') + '%';
                        calculateTotalPercentage();
                    }
                });
            
                // Function to add a new tax row
                document.querySelector('.addTaxButton').addEventListener('click', function() {
                    const taxTable = document.querySelector('#tax-table tbody');
                    const newRow = taxTable.querySelector('.tax-entry').cloneNode(true);
                    newRow.querySelector('.selectTax').selectedIndex = 0;
                    newRow.querySelector('.percentage').value = '';
                    taxTable.appendChild(newRow);
                });
            
                // Function to remove a tax row
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-tax')) {
                        e.target.closest('tr').remove();
                        calculateTotalPercentage();
                    }
                });
            
                // Function to calculate the total percentage of added taxes
                function calculateTotalPercentage() {
                    const percentageInputs = document.querySelectorAll('.percentage');
                    let totalPercentage = 0;
                    percentageInputs.forEach(function(input) {
                        const percentage = parseFloat(input.value.replace('%', '')); // Remove % sign before parsing
                        if (!isNaN(percentage)) {
                            totalPercentage += percentage;
                        }
                    });
            
                    // Update each percentage input with the percentage symbol
                    percentageInputs.forEach(function(input) {
                        input.value = input.value.replace('%', '') + '%';
                    });
            
                    // Set the total percentage in the input field
                    document.querySelector('#totalTaxAmountValue').value = totalPercentage.toFixed(2) + '%';
                }
            
                // Initial calculation when the page loads
                calculateTotalPercentage();
            
                // Function to calculate and display the final total
                function calculateAndDisplayFinalTotal() {
                    const grandTotalInput = document.getElementById('grandTotal');
                    const totalTaxAmountInput = document.getElementById('totalTaxAmountValue');
                    const finalTotalInput = document.getElementById('finalTotal');
            
                    const grandTotal = parseFloat(grandTotalInput.value) || 0;
                    const totalTaxAmount = parseFloat(totalTaxAmountInput.value.replace('%', '')) || 0;
            
                    // Calculate the final total
                    const finalTotal = grandTotal + (totalTaxAmount / 100) * grandTotal;
            
                    finalTotalInput.value = finalTotal.toFixed(2);
                }
            
                // Call the function to calculate and display the final total initially
                calculateAndDisplayFinalTotal();
            </script>
            
            
        <button type="submit" class="btn btn-primary mt-3">Create Invoice</button>
        </form>
        </div>
    </div>
    <!-- END: Display Information -->
@endsection
