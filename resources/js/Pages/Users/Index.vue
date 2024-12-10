<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
  users: Array
})

const deleteUser = (userId) => {
  if(confirm('Tem certeza que deseja inativar este usuário?')) {
    router.delete(route('users.destroy', userId))
  }
}
</script>

<template>
  <AppLayout title="Usuários">
    <div class="container mx-auto p-4">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Usuários Cadastrados</h1>
        <Link
          :href="route('users.create')"
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
        >
          Novo Usuário
        </Link>
      </div>

      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-gray-200">
            <th class="border p-2">Nome</th>
            <th class="border p-2">E-mail</th>
            <th class="border p-2">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id" class="hover:bg-gray-100">
            <td class="border p-2">{{ user.name }}</td>
            <td class="border p-2">{{ user.email }}</td>
            <td class="border p-2 text-center">
              <Link
                :href="route('users.edit', user.id)"
                class="text-blue-500 mr-2 hover:underline"
              >
                Editar
              </Link>
              <button
                @click="deleteUser(user.id)"
                class="text-red-500 hover:underline"
              >
                Inativar
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>
