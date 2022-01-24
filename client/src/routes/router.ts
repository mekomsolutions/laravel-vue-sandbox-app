import { createWebHistory, createRouter } from 'vue-router';
import HomeVue from '../views/Home.vue';
import AboutVue from '../views/About.vue';
import NotFoundVue from '../views/NotFound.vue';
import AuthorizationCallbackVue from '../views/Auth/AuthorizationCallback.vue';
import LayoutVue from '../views/Layout.vue';
import { demosRoutes } from '../views/Demos/demosRoutes';

const routes = [
  {
    path: '/auth/callback',
    name: 'TokenCallback',
    component: AuthorizationCallbackVue,
  },
  {
    path: '/',
    component: LayoutVue,
    children: [
      {
        path: '',
        name: 'Home',
        component: HomeVue,
      },
      {
        path: '/about',
        name: 'About',
        component: AboutVue,
      },
      ...demosRoutes,
    ],
  },
  {
    path: '/:catchAll(.*)',
    component: NotFoundVue,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export { router };
