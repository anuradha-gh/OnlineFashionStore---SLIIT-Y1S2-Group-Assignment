document.addEventListener('DOMContentLoaded', function() {
    updateSubcategory(); // Call the function once the page is loaded
});

function updateSubcategory() {
    var mainCategorySelect = document.getElementById('maincategory');
    var subCategorySelect = document.getElementById('subcategory');
    var selectedMainCategory = mainCategorySelect.value;

    // Enable all options initially
    for (var i = 0; i < subCategorySelect.options.length; i++) {
        subCategorySelect.options[i].disabled = false;
    }

    // Disable options based on main category selection
    for (var i = 0; i < subCategorySelect.options.length; i++) {
        var option = subCategorySelect.options[i];
        var category = option.getAttribute('data-category');

        if (category && category !== selectedMainCategory) {
            option.disabled = true;
        }
    }
}
