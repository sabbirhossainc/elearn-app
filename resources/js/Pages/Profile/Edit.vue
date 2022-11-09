
<template>

    <Head title="Profile Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile edit
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-start m-2 p-2">
                            <Link href="/profile"
                                class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-sm">
                            Back</Link>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="grid place-content-center mt-10">
                                <form @submit.prevent="updateProfile" class="bg-white shadow-md m-2 p-2 rounded">
                                    <div class="space-y-4">
                                        <div class="sm:col-span-6">
                                            <label for="title" class="block text-sm font-medium text-gray-700"> Name
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" id="title" wire:model.lazy="title" name="title"
                                                    v-model="form.name"
                                                    class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label for="title" class="block text-sm font-medium text-gray-700"> Email
                                            </label>
                                            <div class="mt-1">
                                                <input type="email" id="email" wire:model.lazy="email" name="email"
                                                    v-model="form.email"
                                                    class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label for="title" class="block text-sm font-medium text-gray-700"> Image
                                            </label>
                                            <div class="m-2 p-2">
                                                <img :src="image" alt="" class="w-32 h-32">
                                            </div>
                                            <div class="mt-1">
                                                <input type="file" id="image" wire:model="newImage" name="image"
                                                    @input="form.image = $event.target.files[0]"
                                                    class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <div class="my-2 py-2 flex justify-end">
                                                <button type="submit"
                                                    class="px-4 py-2 bg-green-400 hover:bg-green-600 rounded-lg text-white">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    profile: Object,
    image: String
});

const form = useForm({
    name: props.profile.name,
    image: null,
    email: props.profile.email,
});

function updateProfile() {
    // form.post('/profile');
    Inertia.post(`/profile/${props.profile.id}`, {
        _method: 'put',
        name: form.name,
        image: form.image,
        email: form.email
    })
}

</script>
