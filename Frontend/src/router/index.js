import Vue from 'vue'
import Router from 'vue-router'
import authRoutes from '../components/Auth/auth-routers'
import userRoutes from '../components/User/user-router'
import adminRoutes from '../components/Admin/admin-routers'

Vue.use(Router)

export default new Router({
  routes: [
    ...authRoutes,
    ...userRoutes,
    ...adminRoutes
  ]
})
