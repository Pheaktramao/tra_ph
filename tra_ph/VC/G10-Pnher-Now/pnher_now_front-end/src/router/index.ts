import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'

const simpleAcl = createAcl({})
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // ----- authentication -----

    // welcome 
    {
      path: '/',
      name: 'Welcome',
      component: () => import('../views/Web/HomeView.vue')
    },

    // log in 
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/Admin/Auth/LoginView.vue')
    },

    // register
    {
      path: '/logout',
      name: 'logout',
      component: () => import('../views/Admin/Auth/LoginView.vue')
    },

    // ----- user -----

    {
      path: '/user_dashboard',
      name: 'user_dashboard',
      component: () => import('../views/User/DashboardUserView.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },

    {
      path: '/history',
      name: 'history',
      component: () => import('../views/Web/User/HistoryUser.vue')
    },
    {
      path: '/deliverer',
      name: 'deliverer',
      component: () => import('../views/Web/Deliver/DeliverView.vue')
    },
    {
      path: '/feedback',
      name: 'feedback',
      component: () => import('../views/Web/Feedback/FeedbackView.vue')
    },
    {
      path: '/history_deliverer',
      name: 'history_deliverer',
      component: () => import('../views/Web/History/HistoryView.vue')
    },
    
    {
      path: '/proccess',
      name: 'proccess',
      component: () => import('../views/Web/ProcessDeliver/ProcessDeliverView.vue')
    },
    {
      path: '/request',
      name: 'request',
      component: () => import('../views/Web/Request/RequestView.vue')
    },
    {
      path: '/average',
      name: 'average',
      component: () => import('../views/Web/Average/AverageView.vue')
    },

    {
      path: "/deliver",
      name: "deliver",
      component: () => import('../views/Web/Deliver/DeliverView.vue')
    },
    {
      path: "/history",
      name: "history",
      component: () => import('../views/Web/History/HistoryView.vue')
      path: '/home',
      name: 'home',
      component: () => import('../views/Web/User/ProductUser.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: "/average",
      name: "average",
      component: () => import('../views/Web/Average/AverageView.vue')
    },

    {
      path: '/request',
      name: 'request',
      component: () => import('../views/Web/Request/RequestView.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },


    {
      path: '/user_feedback',
      name: 'user_feedback',
      component: () => import('../views/Web/Feedback/FeedbackUserView.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },

    // ----- deliverer -----

    {
      path: '/deliverer_dashboard',
      name: 'deliverer_dashboard',
      component: () => import('../views/Deliverer/DelivererDashboardView.vue'),
      meta: {
        requiresAuth: true,
        role: 'deliverer'
      }
    },

    {
      path: '/deliverer',
      name: 'deliver',
      component: () => import('../views/Web/Deliver/DeliverView.vue'),
      meta: {
        requiresAuth: true,
        role: 'deliverer'
      }
    },

    {
      path: '/feedback',
      name: 'feedback',
      component: () => import('../views/Web/Feedback/FeedbackView.vue'),
      meta: {
        requiresAuth: true,
        role: 'deliverer'
      }
    },

    {
      path: '/history_deliverer',
      name: 'history_deliverer',
      component: () => import('../views/Web/History/HistoryView.vue'),
      meta: {
        requiresAuth: true,
        role: 'deliverer'
      }
    },

    {
      path: '/process',
      name: 'process',
      component: () => import('../views/Web/ProcessDeliver/ProcessDeliverView.vue'),
      meta: {
        requiresAuth: true,
        role: 'deliverer'
      }
    },

    {
      path: '/average',
      name: 'average',
      component: () => import('../views/Web/Average/AverageView.vue')
    }

  ]
})

router.beforeEach(async (to, from, next) => {
  const publicPages = ['/' , '/login', '/register']
  const authRequired = !publicPages.includes(to.path)
  const store = useAuthStore()

  try {
    const { data } = await axiosInstance.get('/me')
    
    store.isAuthenticated = true
    store.user = data.data
    
    store.permissions = data.data.permissions.map((item) => item.name)
    store.roles = data.data.roles.map((item) => item.name)
    
    const rules = () =>
      defineAclRules((setRule) => {
        store.permissions.forEach((permission) => {
          setRule(permission, () => true)
        })
      })
      
    simpleAcl.rules = rules()

    if (publicPages.includes(to.path) && store.isAuthenticated) {
      if (store.roles.includes('user')) {
        return next('/user_dashboard')
      }
      if (store.roles.includes('deliverer')) {
        return next('/deliverer_dashboard')
      }
    }
  } catch (error) {
    store.isAuthenticated = false
    store.user = null
    store.permissions = []
    store.roles = []
  }
    
  if (authRequired && !store.isAuthenticated) {
    return next('/login')
  }

  if (to.meta.role && !store.roles.includes(to.meta.role)) {
    return next('/login')
  }

  next()
})

export default { router, simpleAcl }
