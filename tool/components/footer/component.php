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
            renderTextarea();
        }
    });

    function renderTextarea() {
        var color_active = document.querySelector('.color.active');
        var values = {};

        values['outline'] = document.querySelector('[data-action="outline"]').classList.contains('set');
        values['margin'] = document.querySelector('[data-action="margin"]').classList.contains('set');
        values['color'] = (typeof color_active.dataset.value !== 'undefined') ? color_active.dataset.value : false;

        var json = JSON.stringify(values);        

        document.querySelector('form textarea[name="data"]').value = json;

        renderDiff(values);
    }

    function renderLoad() {
        var json_onload = document.querySelector('textarea[name="onload"]').value;
        if(json_onload == '') return;

        var array = JSON.parse(json_onload);

        if(array.outline) {
            document.querySelector('[data-action="outline"]').click();
        }

        if(array.margin) {
            document.querySelector('[data-action="margin"]').click();
        }

        if(array.color) {
            document.querySelector('.color[data-value="' + array.color + '"]').click();
        }

        renderTextarea();
    }

    function renderDiff(values) {
        var json_onload = document.querySelector('textarea[name="onload"]').value;
        var json = JSON.stringify(values);
        var button = document.querySelector('form input[type="submit"]');

        if(json_onload == json) {
            button.classList.remove('show');
        } else {
            button.classList.add('show');
        }
    }

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

                for(i=0; i<siblings.length; i++) {
                    siblings[i].classList.remove('active');
                }
                this.classList.add('active');

                renderTextarea();
            });
        }
    });
</script>
</body>
</html>