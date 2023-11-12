<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Car from '@/Components/Car.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
 

defineProps(['cars']);

const form = useForm({
    message: '',
});
</script>
 
<template>
    <Head title="Cars" />
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('cars.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="Please input a car"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Submit</PrimaryButton>
            </form>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <Car
                    v-for="car in cars"
                    :key="car.id"
                    :car="car"
                />
            </div>

        </div>
    </AuthenticatedLayout>
</template>