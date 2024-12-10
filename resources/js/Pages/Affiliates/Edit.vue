<script setup>
import { ref, onMounted, watch } from 'vue'
import { useForm } from '@inertiajs/vue3'
import axios from 'axios'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
    states: Array,
    cities: Array,
    affiliate: Object
})

const form = useForm({
    name: props.affiliate.name,
    cpf: props.affiliate.cpf,
    birth_date: props.affiliate.birth_date,
    email: props.affiliate.email,
    phone: props.affiliate.phone,
    address: props.affiliate.address,
    state_id: props.affiliate.state_id,
    city_id: props.affiliate.city_id
})

const availableCities = ref(props.cities)

const loadCities = async () => {
    if (!form.state_id) {
        availableCities.value = []
        return
    }

    try {
        const response = await axios.get(route('get.cities', form.state_id))
        availableCities.value = response.data
    } catch (error) {
        console.error('Error loading cities:', error)
        availableCities.value = []
    }
}

watch(() => form.state_id, () => {
    form.city_id = ''
    loadCities()
})

const submit = () => {
    form.put(route('affiliates.update', props.affiliate.id))
}
</script>

<template>
    <AppLayout title="Editar Afiliado">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Editar Afiliado</h1>
            <form @submit.prevent="submit" class="max-w-md">
                <div class="mb-4">
                    <label class="block mb-2">Nome</label>
                    <input v-model="form.name" type="text" class="w-full border p-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">CPF</label>
                    <input v-model="form.cpf" type="text" class="w-full border p-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Data de Nascimento</label>
                    <input v-model="form.birth_date" type="date" class="w-full border p-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">E-mail</label>
                    <input v-model="form.email" type="email" class="w-full border p-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Telefone</label>
                    <input v-model="form.phone" type="tel" class="w-full border p-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Endereço</label>
                    <input v-model="form.address" type="text" class="w-full border p-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Estado</label>
                    <select v-model="form.state_id" @change="loadCities" class="w-full border p-2 rounded" required>
                        <option value="">Selecione um estado</option>
                        <option v-for="state in states" :key="state.id" :value="state.id">
                            {{ state.name }}
                        </option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Cidade</label>
                    <select v-model="form.city_id" class="w-full border p-2 rounded" :disabled="!form.state_id"
                        required>
                        <option value="">Selecione uma cidade</option>
                        <option v-for="city in availableCities" :key="city.id" :value="city.id">
                            {{ city.name }}
                        </option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    :disabled="form.processing">
                    Atualizar
                </button>
            </form>
        </div>
    </AppLayout>
</template>
