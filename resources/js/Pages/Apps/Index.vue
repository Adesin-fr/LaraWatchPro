<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import LogIcon from "@/Icons/LogIcon.vue";
import CopyIcon from "@/Icons/CopyIcon.vue";

defineProps(['apps']);

const CopyAppTokenToClipboard = async (app) => {
    await navigator.clipboard.writeText(app.api_token);
    alert('API Token copied to clipboard !')
}


</script>

<template>
    <AppLayout>
        <template #header>
            <div class=" flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    My apps
                </h2>
                <NavLink :href="route('apps.create')" class="primary-button">Register an app</NavLink>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                        <tr>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                App name
                            </th>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Last 30 days Errors
                            </th>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Last 30 days Request count
                            </th>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Token
                            </th>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Actions
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <template v-for="app in apps">
                            <tr>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 p-2 text-left ">
                                    {{ app.name }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 p-2 ">
                                    {{ app.app_logs_errors_count }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 p-2 ">
                                    {{ 123456 }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 p-2 ">
                                    <button @click="CopyAppTokenToClipboard(app)">
                                        <copy-icon/>
                                    </button>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 p-2 text-gray-600">
                                    <NavLink :href="route('apps.view_logs', { app_id: app.id})" title="View logs">
                                        <log-icon size="1.5em"/>
                                    </NavLink>
                                </td>
                            </tr>
                        </template>
                        </tbody>

                    </table>


                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
