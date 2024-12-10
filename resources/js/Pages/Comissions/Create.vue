<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    affiliates: Array,
});

const form = useForm({
    affiliate_id: '',
    value: '',
    date: '',
    description: '',
});

const submit = () => {
    form.post(route('comissions.store'));
};
</script>

<template>
    <AppLayout title="Nova Comissão">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8">
                        <h1 class="text-2xl text-gray-400 font-bold mb-6">Cadastro de Comissão</h1>

                        <form @submit.prevent="submit" class="space-y-6">
                            <div>
                                <label
                                    class="block text-gray-500 dark:text-gray-300 text-sm font-medium mb-2">Afiliado</label>
                                <select v-model="form.affiliate_id"
                                    class="w-full border rounded p-2 text-gray-900 dark:text-gray-900" required>
                                    <option value="">Selecione um afiliado</option>
                                    <option v-for="affiliate in affiliates" :key="affiliate.id" :value="affiliate.id">
                                        {{ affiliate.name }}
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label
                                    class="block text-gray-500 dark:text-gray-300 text-sm font-medium mb-2">Valor</label>
                                <input v-model="form.value" type="number" step="0.01"
                                    class="w-full border rounded p-2 text-gray-100 dark:text-gray-900" required />
                            </div>

                            <div>
                                <label
                                    class="block text-gray-500 dark:text-gray-300 text-sm font-medium mb-2">Data</label>
                                <input v-model="form.date" type="date"
                                    class="w-full border rounded p-2 text-gray-100 dark:text-gray-900" required />
                            </div>

                            <div>
                                <label
                                    class="block text-gray-500 dark:text-gray-300 text-sm font-medium mb-2">Descrição</label>
                                <textarea v-model="form.description"
                                    class="w-full border rounded p-2 text-gray-100 dark:text-gray-900"></textarea>
                            </div>

                            <div class="flex justify-end space-x-4">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                                    :disabled="form.processing">
                                    Cadastrar
                                </button>
                                <Link :href="route('comissions.index')"
                                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                Cancelar
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
