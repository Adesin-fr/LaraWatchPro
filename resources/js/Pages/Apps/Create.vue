<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/vue3";

const createAppForm = useForm({
    name: '',
});

const saveApp = () => {
    createAppForm.post(route('apps.store'))
}



</script>

<template>
    <AppLayout>
        <template #header>
            <div class=" flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    My apps
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4 grid gap-4">

                    <div class="">
                        <InputLabel for="name" value="Application Name" />
                        <TextInput
                                id="name"
                                v-model="createAppForm.name"
                                type="text"
                                class="mt-1 block w-full"
                                autofocus
                        />
                        <InputError :message="createAppForm.errors.name" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <primary-button @click="saveApp">Save</primary-button>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
