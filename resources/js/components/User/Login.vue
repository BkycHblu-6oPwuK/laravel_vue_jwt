<template>
    <div class="w-25">
        <div class="mb-3">
            <input v-model="email" type="email" class="form-control" placeholder="email">
        </div>
        <div class="mb-3">
            <input v-model="password" type="password" class="form-control" placeholder="password">
        </div>
        <div class="mb-3">
            <input @click.prevent="login " type="submit" value="Войти" class="form-control">
        </div>
        <div class="mb-3">
            <div v-if="error" class="text-danger">{{ this.error }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return {
            email: null,
            password: null,
            error: null,
        }
    },
    mounted() {

    },
    methods: {
        login() {
            axios.post("api/auth/login", {email: this.email, password: this.password})
            .then(res => {
                localStorage.access_token = res.data.access_token
                this.$router.push('personal')
            })
            .catch(error => {
                this.error = error.response.data.error
            })
        }
    }
}
</script>
