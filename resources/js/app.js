import "./bootstrap";

import "popper.js";
import { config } from "./init/config";

import { createApp } from "vue";

import App from "./components/App.vue";
import router from "./router";

import { SetupCalendar, Calendar, DatePicker } from "v-calendar";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import Select2 from "vue3-select2-component";
import Multiselect from "@vueform/multiselect";
import BootstrapVue3 from "bootstrap-vue-3";
import Autocomplete from "vue3-autocomplete";
//import BootBox from "bootbox";
//import PrimeVue from "primevue/config";
import "@vueform/multiselect/themes/default.css";
import "../css/global.css";

// import 'bootstrap/dist/css/bootstrap.css'
import "bootstrap-vue-3/dist/bootstrap-vue-3.css";
//import "alga-css/dist/alga.min.css";

var app = createApp(App)
    // app.config.globalProperties.$apiUrl = {
    //         ? "https://joedream.stockcity.co.ke/"
    //         : "http://localhost:8000/"
    // };

    // Setup the plugin with optional defaults
    .use(router)
    .use(BootstrapVue3)
    .use(SetupCalendar, {})
    .use(VueSweetalert2)
    //    .use(PrimeVue)
    .component("Autocomplete", Autocomplete)
    .component("multi-select", Multiselect)
    .component("Select2", Select2)
    .component("Calendar", Calendar)
    .component("DatePicker", DatePicker)
    //.component("bootbox", BootBox)
    .mount("#app");
