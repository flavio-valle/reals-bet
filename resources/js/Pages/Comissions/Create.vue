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
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Cadastro de Comissão</h1>
            <form @submit.prevent="submit" class="max-w-md">
                <div class="mb-4">
                    <label class="block mb-2">Afiliado</label>
                    <select v-model="form.affiliate_id" class="w-full border p-2 rounded" required>
                        <option value="">Selecione um afiliado</option>
                        <option v-for="affiliate in affiliates" :key="affiliate.id" :value="affiliate.id">
                            {{ affiliate.name }}
                        </option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Valor</label>
                    <input v-model="form.value" type="number" step="0.01" class="w-full border p-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Data</label>
                    <input v-model="form.date" type="date" class="w-full border p-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Descrição</label>
                    <textarea v-model="form.description" class="w-full border p-2 rounded"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    :disabled="form.processing">
                    Cadastrar
                </button>
            </form>
        </div>
    </AppLayout>
</template>
