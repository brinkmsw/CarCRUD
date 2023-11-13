<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Car from '@/Components/Car.vue';
import Vue from 'vue';
import CarForm from '@/Components/CarForm.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

Vue.component('car-form', CarForm);

const app = new Vue({
    el: '#app',
});

export default {
    components: {
        CarForm: () => import('@/components/CarForm.vue'),
    },
};

defineProps(['cars']);

const form = useForm({
    model: '',
    year:'',
    manufacturer:'',
});
</script>
 
<template>
    <Head title="Cars" />
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

                <div>
                    <car-form></car-form>
                    <!-- Add other content as needed -->
                </div>


                <header>Add a Car</header>
                <form @submit.prevent="form.post(route('cars.store'), { onSuccess: () => form.reset() })">
                    <textarea
                        v-model="form.model"
                        placeholder="Enter the car model"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></textarea>
                    <textarea
                        v-model="form.year"
                        placeholder="Enter the manufacturer year"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></textarea>
                    <textarea
                        v-model="form.manufacturer_id"
                        placeholder="Enter the manufacturer id"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></textarea>
                    <InputError :message="form.errors.message" class="mt-2" />
                    <PrimaryButton class="mt-4">Submit</PrimaryButton>
                </form>
            </div>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <header>Car List</header>
                <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                    <Car
                        v-for="car in cars"
                        :key="car.id"
                        :car="car"
                    />
                </div>
            </div>

        </div>
    </AuthenticatedLayout>
</template>