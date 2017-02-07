(function() {
    return {
        remClass: function() {
            var a = document.getElementsByTagName('a');
            for (var i = 0; i < a.length; i++) {
                a[i].parentNode.classList.remove('active');
            }
        },
        onload: function() {
            $t = this;

            var url = window.location.href;
            var uriPart = url.split('/#/');
            var uriPart2 = (uriPart[1]) ? uriPart[1].split('/') : '/';
            var linkActive = (uriPart2[0]) ? uriPart2[0] : uriPart2;

            var a = document.getElementsByTagName('a');
            for (var i = 0; i < a.length; i++) {
                if (a[i].getAttribute('rel') == linkActive) {
                    a[i].parentNode.classList.add('active');
                }
                a[i].addEventListener('click', function() {
                    $t.remClass();
                    this.parentNode.classList.add('active');
                }, false);

            }
        }
    };
})().onload();