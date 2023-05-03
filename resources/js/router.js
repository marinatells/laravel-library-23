import { createWebHistory, createRouter } from 'vue-router';

import Admin from './pages/Admin.vue';
import User from './pages/User.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';

const routes = [
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/user', component: User },
  { path: '/admin', component: Admin },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
