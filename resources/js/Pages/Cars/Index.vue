<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Car from '@/Components/Car.vue';
import Manufacturer from '@/Components/Manufacturer.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';


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
                    <label for="car-manufacturerer">Choose a manufacturer:</label>
                        <input list="car-manufacturerer" id="car-manufacturer-choice" name="car-manufacturer-choice" />
        
                    <datalist id="car-manufacturerer">
                        <option v-for="option in options" :value="option">{{option}}</option>
                    </datalist>
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