window.setInterval(function () {

    jQuery.ajax(location.href, {
        dataType: 'html'
    })
    .done(function (html) {
        html = jQuery.parseHTML(html);
        html.forEach(function (node) {
            if (node.className && node.className == 'page-wrapper') {
                var newEl, currentEl;
                if ((newEl = node.querySelector('#list-form')) && (currentEl = document.querySelector('#list-form'))) {
                    currentEl.innerHTML = newEl.innerHTML;
                }
            }
        });
    });

}, 1000 * 30);