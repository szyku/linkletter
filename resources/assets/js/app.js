/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

$(document).on('click', 'button#loader', function (e) {
    e.preventDefault();
    let $button = $(e.currentTarget);
    let url = $button.data('url');
    $button.children('.emoji').last().hide();
    $button.find('.loader').removeClass('invisible');
    $.get({
        url: url,
        success: (data) => {
            let $parent = $button.parent();
            $button.remove();
            $parent.append(data);
        }
    });
});

$(document).on('click', 'button#top-button', () => {
    document.body.scrollTop = 0; // Safari
    document.documentElement.scrollTop = 0; // Other
});

$(document).scroll(function (e) {
    let currentScroll = $(window).scrollTop();
    let $button = $("#top-button");
    if (currentScroll > 20 ) {
        $button.css('visibility', 'visible');
        $button.css('opacity', 1);
    } else {
        $button.css('visibility', 'hidden');
        $button.css('opacity', 0);
    }
});
