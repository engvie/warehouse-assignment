import { createRouter, createWebHistory } from 'vue-router';
import { isAuthenticated } from "@/composables/useAuth";

import Dashboard from "@/pages/Dashboard.vue";
import Profile from "@/pages/Profile.vue";
import Login from "@/pages/Login.vue";
import Products from "@/pages/Products.vue";
import ImportProducts from "@/pages/ImportProducts.vue";
import ImportProductParts from "@/pages/ImportProductParts.vue";

const routes = [
    {
        path: '/login',
        name: 'Login',
        component: Login,
        meta: {
            requiresAuth: false
        },
        beforeEnter: (to, from, next) => {
            if (isAuthenticated()) {
                next('/')
                return;
            }
            next();
        }
    },
    {
        path: '/',
        name: 'Dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/products',
        name: 'Products',
        component: Products,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/import-products',
        name: 'ImportProducts',
        component: ImportProducts,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/import-product-parts',
        name: 'ImportProductParts',
        component: ImportProductParts,
        meta: {
            requiresAuth: true
        }
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

router.beforeEach((to, from, next) => {
    //Check if auth is required
    if (to.meta.requiresAuth) {
        //Redirect to login if not authenticated and to route is not login
        if (to.name !== 'Login' && !isAuthenticated()) {
            next('/login')
        } else {
            next()
        }
    } else {
        next()
    }
})

export default router
