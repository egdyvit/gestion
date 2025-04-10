<template>

<div class="relative text-gray-900 focus-within:text-purple-600 dark:focus-within:text-blue-400">
    <textarea
        class="appearance-none rounded block w-full px-4 py-3 mt-1 text-sm text-left text-black dark:text-gray-600 dark:border-gray-600 dark:bg-white focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray resize-y min-h-[170px] max-h-[170px]"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
        :placeholder="text"
        :required="required"
        :accept="accept"
        style="overflow-wrap: break-word; white-space: normal;"
        maxlength="500"
    ></textarea>
    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
        <slot></slot>
    </div>
</div>
  </template>

  <script setup>
  import { onMounted, ref } from 'vue';

  defineProps(['modelValue', 'text', 'type', 'required', 'accept']);

  defineEmits(['update:modelValue']);

  const input = ref(null);

  onMounted(() => {
      if (input.value.hasAttribute('autofocus')) {
          input.value.focus();
      }
  });
  </script>
