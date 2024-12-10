<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
  users: Array
})

const deleteUser = (userId) => {
  if (confirm('Tem certeza que deseja inativar este usuário?')) {
    router.delete(route('users.destroy', userId))
  }
}
</script>

<template>
  <AppLayout :title="'Usuários'">
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
          <div>
            <div class="flex justify-between items-center mb-4 p-6 lg:p-8">
              <h1 class="text-2xl text-gray-400 font-bold">Usuários Cadastrados</h1>
              <Link
                :href="route('users.create')"
                class="bg-[#00E59C] text-white px-4 py-2 rounded hover:opacity-75"
              >
                Novo Usuário
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
                    E-mail
                  </th>
                  <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    Ações
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                <tr v-for="user in users" :key="user.id">
                  <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                    {{ user.name }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                    {{ user.email }}
                  </td>
                  <td
                    class="flex justify-evenly px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <Link
                      :href="route('users.edit', user.id)"
                      class="text-[#00E59C] hover:opacity-75"
                    >
                      Editar
                    </Link>
                    <button
                      @click="deleteUser(user.id)"
                      class="text-[#00E59C] hover:opacity-75"
                    >
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
