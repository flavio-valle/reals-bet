<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
  user: Object
})

const form = useForm({
  name: props.user.name,
  email: props.user.email
})

const submit = () => {
  form.put(route('users.update', props.user.id))
}
</script>

<template>
  <AppLayout title="Editar Usuário">
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Editar Usuário</h1>

      <form @submit.prevent="submit" class="max-w-md">
        <div class="mb-4">
          <label class="block mb-2">Nome</label>
          <input
            v-model="form.name"
            type="text"
            class="w-full border p-2 rounded"
            required
          />
        </div>

        <div class="mb-4">
          <label class="block mb-2">E-mail</label>
          <input
            v-model="form.email"
            type="email"
            class="w-full border p-2 rounded"
            required
          />
        </div>

        <button
          type="submit"
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
          :disabled="form.processing"
        >
          Atualizar
        </button>
      </form>
    </div>
  </AppLayout>
</template>
