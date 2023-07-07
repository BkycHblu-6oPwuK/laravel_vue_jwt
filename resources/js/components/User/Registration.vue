<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" v-model="name" class="form-control" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="email" v-model="email" class="form-control" placeholder="email">
            <div v-if="error_email" class="text-danger">{{ this.error_email }}</div>
        </div>
        <div class="mb-3">
            <input type="password" v-model="password" class="form-control" placeholder="password">
        </div>
        <div class="mb-3">
            <input type="password" v-model="password_confirm" class="form-control" placeholder="password_confirm">
            <div v-if="error_password" class="text-danger">{{ this.error_password }}</div>
        </div>
        <div class="mb-3">
            <input @click.prevent="store" type="submit" value="Войти" class="form-control">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Registration",
        data() {
            return {
                name: null,
                email: null,
                password: null,
                password_confirm: null,
                error_email: null,
                error_password: null,
            }
        },
        mounted() {
            
        },
        methods: {
            store() {
                axios.post('/api/users',{name:this.name,email:this.email,password:this.password,password_confirm:this.password_confirm})
                .then(res => {
                    localStorage.setItem('access_token',res.data.access_token)
                    this.$router.push('personal')
                })
                .catch(error => {
                    console.log(error)
                    this.error_email = error.response.data.error_email
                    this.error_password = error.response.data.message
                })
            }
        }
    }
</script>
