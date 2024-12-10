<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
    affiliate: Object
})
</script>

<template>
    <AppLayout :title="'Detalhes do Afiliado'">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8">
                        <h1 class="text-2xl text-gray-400 font-bold mb-4">Detalhes do Afiliado</h1>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <h2 class="text-gray-500 dark:text-gray-300 text-sm uppercase font-semibold">Nome</h2>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ affiliate.name }}</p>
                            </div>

                            <div>
                                <h2 class="text-gray-500 dark:text-gray-300 text-sm uppercase font-semibold">E-mail</h2>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ affiliate.email }}</p>
                            </div>

                            <div>
                                <h2 class="text-gray-500 dark:text-gray-300 text-sm uppercase font-semibold">CPF</h2>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ affiliate.cpf }}</p>
                            </div>

                            <div>
                                <h2 class="text-gray-500 dark:text-gray-300 text-sm uppercase font-semibold">Data de Nascimento</h2>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ affiliate.birth_date }}</p>
                            </div>

                            <div>
                                <h2 class="text-gray-500 dark:text-gray-300 text-sm uppercase font-semibold">Telefone</h2>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ affiliate.phone }}</p>
                            </div>

                            <div>
                                <h2 class="text-gray-500 dark:text-gray-300 text-sm uppercase font-semibold">Endereço</h2>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ affiliate.address }}</p>
                            </div>

                            <div>
                                <h2 class="text-gray-500 dark:text-gray-300 text-sm uppercase font-semibold">Estado</h2>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ affiliate.state }}</p>
                            </div>

                            <div>
                                <h2 class="text-gray-500 dark:text-gray-300 text-sm uppercase font-semibold">Cidade</h2>
                                <p class="text-gray-900 dark:text-gray-100 text-lg">{{ affiliate.city }}</p>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-between space-x-4">
                            <Link :href="route('affiliates.edit', affiliate.id)"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Editar
                        </Link>
                        <Link :href="route('affiliates.index')"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Voltar
                        </Link>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
