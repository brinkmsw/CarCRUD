<template>
    <form @submit.prevent="submitForm">
        <label for="manufacturer">Manufacturer:</label>
        <select v-model="formData.manufacturer_id" id="manufacturer">
            <option v-for="manufacturer in manufacturers" :key="manufacturer.id" :value="manufacturer.id">{{ manufacturer.name }}</option>
        </select>

        <label for="model">Car Model:</label>
        <input v-model="formData.model" type="text" id="model" required>
        <label for="year">Car year:</label>
        <input v-model="formData.model" type="text" id="year" required>

        <!-- Add other form fields as needed -->

        <button type="submit">Create Car</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                manufacturer_id: null,
                model: '',
                year:'',
            },
            manufacturers: [], // This will be populated with the list of manufacturers
        };
    },
    methods: {
        submitForm() {
            axios.post('/api/cars', this.formData)
        },
    },
    mounted() {
        axios.get('/api/manufacturers').then(response => this.manufacturers = response.data)
    },
};
</script>