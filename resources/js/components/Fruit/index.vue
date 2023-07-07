<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="fruit in fruits">
                    <th scope="row">{{ fruit.id }}</th>
                    <td>{{ fruit.name }}</td>
                    <td>{{ fruit.price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import api from "../../api";
export default {
    name: "index",
    data() {
        return {
            fruits: null,
        }
    },
    mounted() {
        this.getFruits()
    },
    methods: {
        getFruits() {
            api.get('/api/fruits',)
                .then(res => {
                    this.fruits = res.data
                })
        },
    }
}
</script>
