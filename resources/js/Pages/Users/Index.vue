<template>
  <Head title="Usuarios"/>

  <AuthenticatedLayout>
  <template #header>
    Usuarios
  </template>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
      <div class="flex justify-center items-center w-12 bg-blue-500">
        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
          <path
              d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
        </svg>
      </div>

      <div class="px-4 py-2 -mx-3">
        <div class="mx-3">
          <span class="font-semibold text-blue-500">Información</span>
          <p class="text-sm text-gray-600">Usuarios Registrados en el Sistema</p>
        </div>
      </div>
    </div>

    <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
      <div class="overflow-x-auto w-full">
        <table class="w-full whitespace-no-wrap">
          <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-blue-950 border-b">
            <th class="px-4 py-3">Nombre</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Fecha de Registro</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y">
          <tr v-for="user in users.data" :key="user.id" class="text-gray-700">
            <td class="px-4 py-3 text-sm">
              {{ user.name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ user.email }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ user.created_at }}
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div
          class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
        <pagination :links="users.links" />
      </div>
    </div>
  </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    users: Object
})
</script>
