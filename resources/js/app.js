
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import persist from '@alpinejs/persist';
import tooltip from '@ryangjchandler/alpine-tooltip';
import Toastr from 'toastr';
import flatpickr from "flatpickr";
import tippy from 'tippy.js';

window.Toastr = Toastr;
window.flatpickr = flatpickr;

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.plugin(tooltip);
Alpine.plugin(persist);

Alpine.start();
