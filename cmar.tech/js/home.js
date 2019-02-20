/*


*/






function ajaxLoadContent(contentId, link) {
    $(contentId).html('Downloading...');
    $.ajax({
        url: link,
    }).done(function(data) {
        $(contentId).html(data);
    });
}

function addHeaderEventListeners() {
    $('button.navigationButton').click(function() {
        var link = this.value;
        ajaxLoadContent('#mainContent', link);
    })
}

function addMainEventListeners() {
    addHeaderEventListeners();
}

window.onload = function() {
    addMainEventListeners();
}