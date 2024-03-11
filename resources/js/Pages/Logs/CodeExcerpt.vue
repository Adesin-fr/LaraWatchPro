<script setup>
const props = defineProps(['codeBlock', 'failedLine'])
</script>

<template>
    <table class="w-full">
        <template v-for="(line, index) in codeBlock">
            <tr :class="{'bg-red-400': index == failedLine}">
                <td class="border-r px-1 w-8"><code class="whitespace-pre">{{ index }}</code></td>
                <td class="px-1"><code class="whitespace-pre"> {{ line }}</code></td>
            </tr>
        </template>
    </table>
</template>

<style scoped>

</style>
