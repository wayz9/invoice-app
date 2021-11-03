
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import persist from '@alpinejs/persist';
import tooltip from '@ryangjchandler/alpine-tooltip';
import Toastr from 'toastr';
import flatpickr from "flatpickr";
import tippy from 'tippy.js';
import Echo from 'laravel-echo';
import pusher from 'pusher-js';

window.Toastr = Toastr;
window.flatpickr = flatpickr;

window.Pusher = pusher;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.plugin(tooltip);
Alpine.plugin(persist);
Alpine.start();