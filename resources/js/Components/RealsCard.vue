<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  title: { type: String, required: true },
  subtitle: { type: String, required: true },
  description: { type: String, required: false }
});


</script>

<template>
    <div>
        <div
            class="card m-auto text-gray-300 w-[clamp(260px,80%,300px)] hover:brightness-90 transition-all cursor-pointer group bg-gradient-to-tl from-gray-700 to-gray-750 hover:from-gray-800 hover:to-gray-750 border-r-2 border-t-2 border-gray-700 rounded-lg overflow-hidden relative">
            <div class="px-8 py-10">
                <img class="w-20 h-full translate-y-[-25%]" src="/images/logo-maior.png" alt="">
                <div class="uppercase font-bold text-xl">
                    {{ $props.title }}
                </div>
                <div class="text-gray-300 uppercase tracking-widest">
                    {{ $props.subtitle }}
                </div>
                <div class="text-gray-400 mt-8">
                    {{ $props.description }}
                </div>
            </div>


            <div
                class="h-2 w-full bg-gradient-to-l via-[#00E59C] group-hover:blur-xl blur-2xl m-auto rounded transition-all absolute bottom-0">
            </div>
            <div
                class="h-0.5 group-hover:w-full bg-gradient-to-l  via-yellow-950 group-hover:via-[#00E59C] w-[70%] m-auto rounded transition-all">
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
