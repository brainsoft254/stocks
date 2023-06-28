import { createRouter, createWebHistory } from "vue-router";
import ORDER from "../components/orders/CreateOrder.vue";
import INVOICES from "../components/invoices/InvoicesList.vue";
import DASHBOARD from "../components/dashboard/dashboard.vue";
import NotFound from "../components/NotFound.vue";

const routes = [
    {
        path: "/orders/create",
        name: "order-create",
        component: ORDER,
    },
    {
        path: "/invoices",
        name: "Invoicelist",
        component: INVOICES,
    },
    {
        path: "/dashbard",
        name: "DashBoard",
        component: DASHBOARD,
    },
    { path: "/:pathMatch(.*)", component: NotFound },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
