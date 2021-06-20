<template>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="fixed top-0 right-0 px-6 py-4 sm:block">
            <div v-if="loggedIn">
                <inertia-link :href="route('dashboard')" class="text-sm text-gray-700 underline">
                    Dashboard
                </inertia-link>
                <inertia-link :href="route('logout')" @click.prevent="logout" class="ml-4 text-sm text-gray-700 underline">
                    Logout
                </inertia-link>
            </div>
            <div v-else>
                <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </inertia-link>

                <inertia-link :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </inertia-link>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-5">
                <h1 class="text-green-600 text-5xl font-bold text-center">
                    BlogWatch
                </h1>
                <h2 class="text-gray-600 font-bold p-2 text-xl text-center">
                    See the best blogs posts here!
                </h2>
                <post-list :posts="posts" />
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
    import Pagination from "@/Blogwatch/Pagination";
    import PostList from "@/Blogwatch/PostList";
    import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink"
    export default {
        components: {PostList, Pagination, JetResponsiveNavLink},
        props: {
            loggedIn: Boolean,
            posts: Object
        },
        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
