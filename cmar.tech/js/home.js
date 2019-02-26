/*


*/

var chosenContent = '';

function ajaxLoadContent(contentId, link) {
    if (chosenContent !== link) {
        chosenContent = link;
        $(contentId).html('<div id="wrapper"> <div class="profile-main-loader"> <div class="loader">' +
            '<svg class="circular-loader"viewBox="25 25 50 50" >' +
            '<circle class="loader-path" cx="50" cy="50" r="20" fill="none" stroke="#70c542" stroke-width="2" />' +
            '</svg></div></div></div>');
        $.ajax({
            url: link,
        }).done(function(data) {
            $(contentId).html(data);
            if (link.substring(link.length - 8, link.length - 4) === 'blog') {

                document.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightBlock(block);
                });

            }
        });
    }
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
    ajaxLoadContent('#mainContent', 'https://www.cmar.tech/mainDisplays/home.php');
}