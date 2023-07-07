import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/fruits', component: () => import('./components/Fruit/index.vue'),
        name: 'fruit.index'
    },
    {
        path: '/login', component: () => import('./components/User/Login.vue'),
        name: 'login'
    },
    {
        path: '/registration', component: () => import('./components/User/Registration.vue'),
        name: 'registration'
    }
    ,
    {
        path: '/personal', component: () => import('./components/User/Personal.vue'),
        name: 'personal'
    },
    {
        path: '/*', component: () => import('./components/User/Personal.vue'),
        name: '404'
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach( (to,from,next) => {
    const accessToken = localStorage.getItem('access_token')

    if(!accessToken){
        if(to.name === 'login' || to.name === 'registration'){
            next()
        } else {
            return next({
                name: 'login'
            })
        }
    }

    next()
})

export default router