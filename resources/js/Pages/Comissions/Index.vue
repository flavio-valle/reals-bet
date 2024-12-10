<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    comissions: Object,
});
</script>

<template>
    <AppLayout title="Comissões">
        <div class="container mx-auto p-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Comissões</h1>
                <Link :href="route('comissions.create')"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Nova Comissão
                </Link>
            </div>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Afiliado</th>
                        <th class="border p-2">Valor</th>
                        <th class="border p-2">Data</th>
                        <th class="border p-2">Descrição</th>
                        <th class="border p-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="comission in comissions.data" :key="comission.id" class="hover:bg-gray-100">
                        <td class="border p-2">{{ comission.affiliate.name }}</td>
                        <td class="border p-2">{{ comission.value }}</td>
                        <td class="border p-2">{{ comission.date }}</td>
                        <td class="border p-2">{{ comission.description }}</td>
                        <td class="border p-2 text-center">
                            <Link :href="route('comissions.edit', comission.id)"
                                class="text-blue-500 mr-2 hover:underline">
                            Editar
                            </Link>
                            <button @click="() => router.delete(route('comissions.destroy', comission.id))"
                                class="text-red-500 hover:underline">
                                Excluir
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
