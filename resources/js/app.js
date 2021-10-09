
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import persist from '@alpinejs/persist'
import Toastr from 'toastr';

window.Toastr = Toastr;

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.plugin(persist);

Alpine.start();
