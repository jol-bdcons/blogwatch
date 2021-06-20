<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Post
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <jet-form-section @submitted="publish">
                    <template #title>
                        Add a new post
                    </template>

                    <template #description>
                        Add a new blog post - once submitted you cannot edit or delete the post.
                    </template>

                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="Post title" />
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" ref="title" autocomplete="off" />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="description" value="Post description" />
                            <jet-textarea id="description" type="textarea" class="mt-1 block w-full" v-model="form.description" ref="description" autocomplete="off" />
                            <jet-input-error :message="form.errors.description" class="mt-2" />
                        </div>

                    </template>

                    <template #actions>
                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Publish
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from '@/Jetstream/Button'
import JetInput from '@/Jetstream/Input'
import JetLabel from '@/Jetstream/Label'
import JetValidationErrors from '@/Jetstream/ValidationErrors'
import JetTextarea from "@/Jetstream/Textarea"
import JetFormSection from "@/Jetstream/FormSection"
import JetInputError from "@/Jetstream/InputError"

export default {
    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetLabel,
        JetValidationErrors,
        JetTextarea,
        JetFormSection,
        JetInputError,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                description: ''
            })
        }
    },
    methods: {
        publish() {
            this.form.post(route('add-post'));
        },
    }
}
</script>

<style scoped>

</style>
