function onCategoryChange() {
    let category = $('#category').val();
    if (category == "Ngành hàng" && $('input[name="keyword"]').val() == "") {
        $('#searchBtn').prop('disabled', true);
    } else {
        $('#searchBtn').prop('disabled', false);
    }
    $('#input-category').val(category);
}
function onSortingChange() {
    let sorting = $('#sorting').val()
    $('#input-sorting').val(sorting);
}
function onSearchChange() {
    let category = $('#category').val();
    if (category == "Ngành hàng" && $('input[name="keyword"]').val() == "") {
        $('#searchBtn').prop('disabled', true);
    } else {
        $('#searchBtn').prop('disabled', false);
    }
}
