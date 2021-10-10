
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import persist from '@alpinejs/persist'
import Toastr from 'toastr';
import flatpickr from "flatpickr";

window.Toastr = Toastr;
window.flatpickr = flatpickr;

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.plugin(persist);

Alpine.start();
