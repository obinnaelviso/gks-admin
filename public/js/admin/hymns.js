const deleteHymnModal = new bootstrap.Modal(document.getElementById('deleteHymnModal'))
var currentHymnId = null
const listOptions = {
    valueNames: ['hymn-no', 'body']
}

const deleteHymn = (id) => {
    currentHymnId = id
    console.log(id)
    deleteHymnModal.show();
}

const processDeleteHymn = () => {
    $.ajax({
        url: `/admin/hymns/${currentHymnId}`,
        type: 'DELETE',
        success: function (result) {
            deleteHymnModal.hide()
            window.location.reload()
        }
    });
}

function searchList(list, searchString) {
    list.search(searchString, listOptions.valueNames)
}

$(() => {
    var hymnsList = new List('hymnsTable', listOptions)
    $('#search-hymn').on('input', function() {searchList(hymnsList, $(this).val())})
})
