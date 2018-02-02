<script src="<?= u('component-kit/assets/js/script.min.js'); ?>"></script>
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
</script>
</body>
</html>