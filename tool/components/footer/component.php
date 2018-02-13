<script src="<?= u('assets/plugins/kirby-component-kit/js/script.min.js'); ?>"></script>
<script>
    toggly.init({
        'callback': function(e) {
            var action = e.target.dataset.action;
            var set = e.target.classList.contains('set');

            var iframe = document.querySelector('.preview iframe').contentWindow;
            var html = iframe.document.querySelector('html');
            
            if(action == 'outline') {
                if(set) html.classList.add('ckit-outline');
                else html.classList.remove('ckit-outline');
            } else if(action == 'margin') {
                if(set) html.classList.add('ckit-margin');
                else html.classList.remove('ckit-margin');
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function(){ 
        var colors = document.querySelectorAll('.actions .color');

        for(i=0; i<colors.length; i++) {
            colors[i].addEventListener('click', function() {
                var iframe = document.querySelector('.preview iframe').contentWindow;
                var html = iframe.document.querySelector('html');
                var type = this.dataset.value;

                html.classList.remove('ckit-off', 'ckit-transparent', 'ckit-white', 'ckit-black');
                if(typeof type !== 'undefined') {
                    html.classList.add('ckit-' + type);
                }

                var siblings = this.parentNode.querySelectorAll('.color');
                //console.log(siblings);

                for(i=0; i<siblings.length; i++) {
                    console.log(i);
                   // console.log(siblings[i]);
                    siblings[i].classList.remove('active');
                }
                this.classList.add('active');
            });
        }
    });
</script>
</body>
</html>