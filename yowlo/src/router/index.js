import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AdminUserView from '../views/AdminUserView.vue'
import UserProfileView from '../views/UserProfileView.vue'
import CreatePostView from '../views/CreatePostView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }, 
    {
      path: '/login',
      name: 'login', 
      component: () => import("../components/Login.vue")
    },
    {
      path: '/register',
      name: 'register', 
      component: () => import("../components/Register.vue")
    },
    {
      path: '/adminusers',
      name: 'adminusers',
      component: AdminUserView
    },
    {
      path: '/user/:userId',
      name: 'userprofile',
      component: UserProfileView
    }, 
    {
      path: '/post/create',
      name: 'createnewpost',
      component: CreatePostView
    }, 
  ]
})

export default router
