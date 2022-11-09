<template>

    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-end m-2 p-2">
                            <Link href="/profile/create"
                                class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-sm">Create</Link>
                        </div>
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-4">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase">
                                                Image
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase">
                                                Email
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                -
                                                <span class="sr-only">
                                                    Edit
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="profile in profiles" :key="profile.id">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img :src="profile.image" alt=""
                                                            class="h-10 w-10 rounded-full" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ profile.name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ profile.email }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap items-center justify-center text-base font-semibold space-x-2 flex">
                                                <Link :href="`/profile/${profile.id}/edit`"
                                                    class="text-indigo-600 hover:text-red-600">
                                                Edit
                                                </Link>
                                                <Link :href="`/profile/${profile.id}`" method="delete" as="button"
                                                    type="button" class="text-red-600 hover:text-indigo-600">
                                                Delete
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    profiles: Array,
});

</script>
