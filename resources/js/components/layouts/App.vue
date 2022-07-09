<template>
        <div class="container">
            <Header/>
            <router-view></router-view>
        </div>
</template>

<script>
    import Header from './Header';
    export default {
        components: {
            Header
        },
        async mounted() {
            await this.login();
        },
        methods: {
            async login() {
                const token = localStorage.getItem('token');
                if (!token) {
                    const { query } = this.$route;
                    const { href, origin, pathname } = window.location;

                    if (query.redirect && query.ticket && query.redirect === 'true') {
                        localStorage.setItem('token', query.ticket);
                        window.location.href = origin + pathname;
                    } else {
                        window.location.href = `/login`;
                    }
                    return false;
                }

                await this.$store.commit('SET_TOKEN', token);
                
            },
        }
    }
</script>
