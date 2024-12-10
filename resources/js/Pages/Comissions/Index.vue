<script setup>
import { Link, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    comissions: Object,
});

// Função para formatar o valor como moeda
const formatCurrency = (value) => {
    const formatted = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(value);

    return formatted;
};
</script>

<template>
    <AppLayout title="Comissões">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-2xl text-gray-400 font-bold">Comissões</h1>
                            <Link :href="route('comissions.create')"
                                class="bg-[#00E59C] text-white px-4 py-2 rounded hover:opacity-75">
                                Nova Comissão
                            </Link>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Afiliado
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Valor
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Data
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Descrição
                                    </th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-for="comission in comissions.data" :key="comission.id"
                                    class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ comission.affiliate.name }}
                                    </td>
                                    <td 
                                        class="px-6 py-4 whitespace-nowrap text-sm"
                                        :class="comission.value >= 0 ? 'text-green-500 dark:text-green-400' : 'text-red-500 dark:text-red-400'"
                                    >
                                        {{ formatCurrency(comission.value) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ comission.date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ comission.description }}
                                    </td>
                                    <td
                                        class="flex justify-between px-6 py-4 gap-5 whitespace-nowrap text-center text-sm font-medium">
                                        <Link :href="route('comissions.edit', comission.id)"
                                            class="text-[#00E59C] hover:opacity-75">
                                            Editar
                                        </Link>
                                        <button @click="() => router.delete(route('comissions.destroy', comission.id))"
                                            class="text-[#00E59C] hover:opacity-75">
                                            Excluir
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
