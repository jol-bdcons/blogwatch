<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-if="$page.props.flash.message" class="mb-2 bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ $page.props.flash.message }}</strong>
                </div>

                <inertia-link :href="route('add-post')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Add a post
                </inertia-link>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5">
                    <post-list :posts="posts" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import PostList from "@/Blogwatch/PostList";
    import JetButton from '@/Jetstream/Button'

    export default {
        components: {
            AppLayout,
            PostList,
            JetButton
        },
        props: {
            posts: Object
        },
    }
</script>
