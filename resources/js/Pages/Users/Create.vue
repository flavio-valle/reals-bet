<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
})

const submit = () => {
  form.post(route('users.store'))
}
</script>

<template>
  <AppLayout :title="'Novo Usuário'">
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6 lg:p-8">
            <h1 class="text-2xl text-gray-400 font-bold mb-6">Cadastro de Usuário</h1>

            <form @submit.prevent="submit" class="space-y-6">
              <div>
                <label class="block text-sm font-medium text-gray-500 dark:text-gray-300 mb-2">
                  Nome
                </label>
                <input
                  v-model="form.name"
                  type="text"
                  class="w-full px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[#00E59C]"
                  required
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-500 dark:text-gray-300 mb-2">
                  E-mail
                </label>
                <input
                  v-model="form.email"
                  type="email"
                  class="w-full px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[#00E59C]"
                  required
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-500 dark:text-gray-300 mb-2">
                  Senha
                </label>
                <input
                  v-model="form.password"
                  type="password"
                  class="w-full px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[#00E59C]"
                  required
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-500 dark:text-gray-300 mb-2">
                  Confirmar Senha
                </label>
                <input
                  v-model="form.password_confirmation"
                  type="password"
                  class="w-full px-4 py-2 border rounded-lg text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[#00E59C]"
                  required
                />
              </div>

              <button
                type="submit"
                class="bg-[#00E59C] text-white px-4 py-2 rounded-lg hover:opacity-75 focus:outline-none focus:ring-2 focus:ring-[#00E59C]"
                :disabled="form.processing"
              >
                Cadastrar
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
