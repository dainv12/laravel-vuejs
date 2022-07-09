<template>
  <div v-if="checkLogin == false">
    <h3>Login</h3>
    <p v-if="loading">loading...</p>
    <p v-if="error" style="color:red">{{ error }}</p>
    <input type="text" placeholder="Email" v-model="user.email"><br/>
    <input type="text" placeholder="Password" v-model="user.password"> <br/>
    <button @click="login">Login</button>
  </div>
  <div v-else-if = "checkLogin == true">
    Logged in
    <button @click="logout">Logout</button>
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
    name: 'Login',

    data() {
        return {
        user: {
            email: null,
            password: null
        },
        loading: false,
        error: null,
        checkLogin:false
        }
    },
    mounted:function () {

    },
    computed: {

    },
    methods: {
        async login() {
            this.error = null;
            try {
                await this.$store.dispatch('product/login', this.user)
                .then(
                    this.checkLogin = true
                )
            } catch (error) {
                this.error = error;
            } 
        },
        async logout() {
            this.error = null;
            try {
                await this.$store.dispatch('product/logout')
                .then(
                    this.checkLogin = false
                )

            } catch (error) {
                this.error = error;
            } 
        }
    }
}
</script>