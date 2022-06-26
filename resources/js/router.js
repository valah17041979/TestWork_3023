import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);


import Home from './components/Home.vue';

import ProductList from './components/products/ProductList.vue';
import ProductCreate from './components/products/ProductCreate.vue';
import ProductEdit from './components/products/ProductEdit.vue';

import CategoryList from './components/categories/CategoryList.vue';
import CategoryEdit from './components/categories/CategoryEdit.vue';
import CategoryCreate from './components/categories/CategoryCreate.vue';


const routes = [
    
     {
        path: '/',
        component:Home,
        name: 'home',
    },

    {
        path: '/products',
        component:ProductList,
       
    },

    {
        path: '/product-create',
        component: ProductCreate,
        
    },

    {
        path: '/product-edit/:id',
         component: ProductEdit,
         name: ' editProduct'
    },

    {
        path: '/categories',
        component:CategoryList,
        
    },
     {
        path: '/category-create',
        component: CategoryCreate,
        
    },
    {
        path: '/category-edit/:id',
         component: CategoryEdit,
       
    },

];

export default new vueRouter({
    mode: "history",
    routes
});
