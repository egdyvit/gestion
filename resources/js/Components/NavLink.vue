<template>
  <span v-show="active" class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
  <div class="flex">
    <slot name="icon" />
    <Link :href="href" class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-400">
      <span class="ml-4">
        <slot />
      </span>
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);
</script>
