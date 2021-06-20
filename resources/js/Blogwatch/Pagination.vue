<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1 py-2 content-center">
            <template v-for="link in links">
                <div v-if="link.url === null" class="mr-1 mb-1 px-2 py-1 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
                <inertia-link v-else class="mr-1 mb-1 px-2 py-1 text-sm leading-4 border rounded hover:bg-indigo-400 hover:text-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-indigo-400': link.active, 'text-white': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>

<script>
export default {
    name: "pagination",
    props: {
        links: Array,
    },
}
</script>

<style scoped>

</style>
