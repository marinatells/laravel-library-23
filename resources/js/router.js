import { createWebHistory, createRouter } from 'vue-router';

import Admin from './pages/Admin.vue';
import User from './pages/User.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';

const routes = [
  { path: '/login', name: 'login', component: Login },
  { path: '/register', name: 'register', component: Register },
  { path: '/user', name: 'user', component: User },
  { path: '/admin', name: 'admin', component: Admin },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
