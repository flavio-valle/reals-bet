<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import axios from 'axios'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
    states: Array
})

const cities = ref([])

const form = useForm({
    name: '',
    cpf: '',
    birth_date: '',
    email: '',
    phone: '',
    address: '',
    state: '',
    city: ''
})

const loadCities = async (stateId) => {
    if (!stateId) {
        cities.value = [];
        return;
    }

    try {
        const response = await axios.get(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateId}/municipios`);
        cities.value = response.data.map(city => ({ id: city.id, name: city.nome }));
    } catch (error) {
        console.error('Erro ao carregar cidades:', error);
    }
};

const updateState = (stateId) => {
    const selectedState = props.states.find(state => state.id == stateId);
    form.state = selectedState ? selectedState.nome : '';
    loadCities(stateId);
};

const updateCity = (cityId) => {
    const selectedCity = cities.value.find(city => city.id == cityId);
    form.city = selectedCity ? selectedCity.name : '';
};

const submit = () => {
    form.post(route('affiliates.store'))
}
</script>


<template>
    <AppLayout title="Novo Afiliado">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Cadastro de Afiliado</h1>
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
                    <select @change="updateState($event.target.value)" class="w-full border p-2 rounded" required>
                        <option value="">Selecione um estado</option>
                        <option v-for="state in states" :key="state.id" :value="state.id">
                            {{ state.nome }}
                        </option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Cidade</label>
                    <select @change="updateCity($event.target.value)" class="w-full border p-2 rounded" :disabled="!form.state" required>
                        <option value="">Selecione uma cidade</option>
                        <option v-for="city in cities" :key="city.id" :value="city.id">
                            {{ city.name }}
                        </option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    :disabled="form.processing">
                    Cadastrar
                </button>
            </form>
        </div>
    </AppLayout>
</template>
