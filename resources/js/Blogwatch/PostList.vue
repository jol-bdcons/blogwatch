<template>
    <div class="p-5">
        <div class="p-5" v-if="posts.data.length === 0">
            <h2>There are no posts to display</h2>
        </div>
        <div v-else class="p-5">
            <pagination :links="posts.links"/>
            <table id="post-table" class="p-5 table-auto border border-gray-700 border-collapse w-full">
                <tr>
                    <th class="border border-gray-700">Title</th>
                    <th class="border border-gray-700">Description</th>
                    <th class="border border-gray-700">Publication Date
                        <span @click="sort('publication_date')" class="inline-flex">
                            <svg v-if="params.field === 'publication_date' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                            </svg>
                            <svg v-if="params.field === 'publication_date' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                            </svg>
                        </span>
                    </th>
                </tr>
                <tr v-for="post in posts.data">
                    <td class="border border-gray-700 p-2">{{ post.title }}</td>
                    <td class="border border-gray-700 p-2">{{ post.description }}</td>
                    <td class="border border-gray-700 p-2 text-center">{{ post.publication_date }}</td>
                </tr>
            </table>
            <pagination :links="posts.links"/>
        </div>
    </div>
</template>

<script>
import Pagination from "../Blogwatch/Pagination";

export default {
    components: {Pagination},
    props: {
        posts: Object,
    },
    data() {
        return {
            params: {
                field: 'publication_date',
                direction: 'desc'
            }
        }
    },
    methods: {
        sort(field) {
            this.params.field = field;
            this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc'
        }
    },
    watch: {
        params: {
            handler() {
                let currentRoute = route().current();
                if(currentRoute === 'undefined') currentRoute = 'home';
                this.$inertia.get(route(currentRoute), this.params, {replace: true, preserveState: true});
            },
            deep: true,
        }
    }
}
</script>

<style scoped>

</style>
