<template>
    <div>
        <RouterLink v-if="accessToken" :to="{ name: 'fruit.index' }">Фрукты</RouterLink>
        <RouterLink v-if="!accessToken" :to="{ name: 'login' }">Login</RouterLink>
        <RouterLink v-if="!accessToken" :to="{ name: 'registration' }">Registration</RouterLink>
        <RouterLink v-if="accessToken" :to="{ name: 'personal' }">Personal</RouterLink>
        <a v-if="accessToken" @click.prevent="logOut()" href="#">Выход</a>
    </div>
    <div>
        <RouterView :key="$route.fullPath"></RouterView>
    </div>
</template>

<script>
import api from '../api'

export default {
    name: "Index",
    data() {
        return {
            accessToken: null
        }
    },
    mounted() {
        this.getAccessToken()
    },

    updated() {
        this.getAccessToken()
    },

    methods: {
        getAccessToken() {
            this.accessToken = localStorage.getItem('access_token')
        },
        logOut() {
            api.post('/api/auth/logout')
                .then(res => {
                    localStorage.removeItem('access_token')
                    this.$router.push('login')
                })
        }
    }
}
</script>
