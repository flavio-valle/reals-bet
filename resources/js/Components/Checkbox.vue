<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        type: String,
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>


<template>
    <input
        v-model="proxyChecked"
        type="checkbox"
        :value="value"
        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-[#00E59C] shadow-sm focus:ring-[#00E59C] dark:focus:ring-[#00E59C] dark:focus:ring-offset-gray-800"
    >
</template>
