<template>
    <div v-if="$page.props.flash && show" class="mb-8">
        <div v-if="$page.props.flash.message" :class="[
            'flex items-center justify-between p-4 rounded',
            flashClasses[$page.props.flash.type] || 'bg-gray-500 text-white'
        ]">
            <div class="flex items-center">
                <svg v-if="$page.props.flash.type === 'success'" xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <svg v-if="$page.props.flash.type === 'error'" xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <div class="text-sm font-medium">{{ $page.props.flash.message }}</div>
            </div>
            <button type="button" @click="show = false" class="text-white hover:text-opacity-75">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: true,
            flashClasses: {
                success: 'bg-green-500 text-white',
                error: 'bg-red-500 text-white',
                info: 'bg-blue-500 text-white',
                warning: 'bg-yellow-500 text-white',
            },
        };
    },
    watch: {
        '$page.props.flash': {
            handler() {
                this.show = true;
            },
            deep: true,
        },
    },
};
</script>