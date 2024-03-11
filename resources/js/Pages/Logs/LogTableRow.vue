<script setup>
import {formatDateTime} from "@/Utils/formatUtils.js";
import {computed, ref} from "vue";
import CodeExcerpt from "@/Pages/Logs/CodeExcerpt.vue";

const props = defineProps(['log'])

const show_details = ref(false)

const lineColor = computed(() => {
    const colors = {
        info: 'bg-green-500',
        debug: 'bg-gray-500',
        warning: 'bg-orange-500',
        error: 'bg-red-500',
    }
    return colors[props.log.level];
})

const canShowDetails  = computed(()=> {
    return props.log.trace || props.log.codeExcerpt;
})

const toggleDetails = () => {
    if ( canShowDetails.value ){
        show_details.value = !show_details.value
    }
}


</script>

<template>
    <tr class="border-t" :class="{'cursor-pointer':canShowDetails}" @click="toggleDetails">
        <td>
            <div class="py-2 flex justify-between items-center">
                <div class="w-2 h-8 rounded-r-lg -px-1 mx-0" :class="lineColor"></div>
                <span class="whitespace-nowrap">{{ log.monitored_app?.name }}</span>
            </div>
        </td>
        <td class="px-6 align-middle p-2 ">
            {{ log.level }}
        </td>
        <td class="px-6 align-middle p-2 whitespace-nowrap">
            {{ formatDateTime(log.created_at) }}
        </td>
        <td class="px-6 align-middle p-2 ">
            {{ log.message }}
        </td>
    </tr>
    <tr v-show="show_details">
        <td colspan="100%" class="p-4">
            <div class="border p-1">
                <div class="w-full border m-2 p-1" v-if="log.codeExcerpt">
                    <code-excerpt :code-block="log.codeExcerpt" :failed-line="log.line"/>
                </div>
                <div class="!w-full max-w-6xl border m-2 p-1" v-if="log.trace">
                    <pre class="overflow-x-auto !w-full !max-w-full">{{ log.trace }}</pre>
                </div>
            </div>
        </td>
    </tr>
</template>
