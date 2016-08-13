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
            var a = document.getElementsByTagName('a');
            for (var i = 0; i < a.length; i++) {
                a[i].addEventListener('click', function() {
                    $t.remClass();
                    this.parentNode.classList.add('active');
                }, false);
            }
        }
    };
})().onload();