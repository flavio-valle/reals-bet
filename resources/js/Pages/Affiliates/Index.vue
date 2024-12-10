<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import RealsCard from '@/Components/RealsCard.vue'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'

const props = defineProps({
    affiliates: Array
})

const deleteAffiliate = (affiliateId) => {
    if (confirm('Tem certeza que deseja inativar este afiliado?')) {
        router.delete(route('affiliates.destroy', affiliateId))
    }
}
</script>

<template>
    <AppLayout :title="'Afiliados'">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="flex justify-between items-center mb-4 p-6 lg:p-8">
                            <h1 class="text-2xl text-gray-400 font-bold">Afiliados Cadastrados</h1>
                            <Link :href="route('affiliates.create')"
                                class="bg-[#00E59C] text-white px-4 py-2 rounded hover:opacity-75">
                            Novo Afiliado
                            </Link>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Nome
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-for="affiliate in affiliates" :key="affiliate.id">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ affiliate.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ affiliate.email }}
                                    </td>
                                    <td
                                        class="flex justify-evenly px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <Link :href="route('affiliates.show', affiliate.id)"
                                            class="text-[#00E59C] hover:opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        </Link>
                                        <button @click="deleteAffiliate(affiliate.id)"
                                            class="text-[#00E59C] hover:opacity-75">
                                            Inativar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
