<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Manufacturer from '@/Components/Manufacturer.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
 
defineProps(['manufacturers']);


const form = useForm({
    name: '',
});
</script>
 
<template>
    <Head title="Manufacturers" />
    
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit="form.post(route('manufacturers.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.name"
                    placeholder="To add a manufacturer, input their name and click submit."
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :name="form.errors.name" class="mt-2" />
                <PrimaryButton class="mt-4">Submit</PrimaryButton>
            </form>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <Manufacturer
                    v-for="manufacturer in manufacturers"
                    :key="manufacturer.id"
                    :manufacturer="manufacturer"
                />
            </div>

        </div>
    </AuthenticatedLayout>
</template>