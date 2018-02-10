var toggly = (function () {
    var fn = {};
    var o;

	// Init
	fn.init = function(options) {
        o = fn.default(options, {});
        o.target = fn.default(o.target, 'toggly-target');
        o.trigger = fn.default(o.trigger, '[data-toggly-target]');

        fn.events();
    };

    // Default
    fn.default = function(value, fallback) {
        return (typeof value !== 'undefined') ? value : fallback;
    };

    // Events
    fn.events = function() {
        var selector = document.querySelectorAll(o.trigger);
        for(i = 0; i<selector.length; i++) {
            selector[i].addEventListener('click', fn.click);
        }
    };

    // Click
    fn.click = function(e) {
        var selector = e.target.getAttribute('data-' + o.target);
        var classname = e.target.dataset.togglyClass;
        var targets = document.querySelectorAll(selector);

        o.set = fn.default(classname, 'set');
        
        for(i = 0; i<targets.length; i++) {
            targets[i].classList.toggle(o.set);
        }

        if(typeof o.callback !== 'undefined') {
            o.callback(e);
        }
    };

	return fn;
})();