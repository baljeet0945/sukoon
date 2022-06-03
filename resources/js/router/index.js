import { createWebHistory, createRouter } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Menu from "../views/Menu.vue";
import OrderStatus from "../views/OrderStatus.vue";
import PageNotFound from '../views/PageNotFound.vue'
const routes = [
  {
    path: "/",
    //name: "Dashboard",
    component: Dashboard,
  },  
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/menu",
    name: "Menu",
    component: Menu,
  }, 
  {
    path: "/order-status",
    name: "OrderStatus",
    component: OrderStatus,
  }, 
  {
    path: '/:catchAll(.*)*',
    name: "PageNotFound",
    component: PageNotFound,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
