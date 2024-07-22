<template>
    <div>
        <label for="interest-rate" class="label"> Interest rate ({{ interestRate }}%)</label>
        <input type="range" v-model.number="interestRate" id="interest-rate" name="interestRate" min="0.1" max="30" step="0.1" class="slider">

        <label for="duration" class="label"> Duration ({{ duration }} years)</label>
        <input type="range" v-model.number="duration" id="duration" name="duration" min="1" max="30"class="slider">

        <div class="text-gray-600 dark:text-gray-300 mt-2">
            <div class="text-gray-400"> Your monthly payment</div>
            <Price :price="monthlyPayment" class="text-3xl"/>
        </div>

        <div class="mt-2 text-gray-500">
            <div class="flex justify-between">
                <div>Principal Paid</div>
                <div><Price :price="listing.price" class="font-medium"/></div>
            </div>
            <div class="flex justify-between">
                <div>Interest Paid</div>
                <div><Price :price="totalInterest" class="font-medium"/></div>
            </div>
            <div class="flex justify-between font-bold">
                <div>Total Paid</div>
                <div><Price :price="totalPaid"/></div>
            </div>
        </div>
    </div>
</template>
<script setup>
    import Price from "@/Components/UI/Price.vue";
    import {ref} from "vue";
    import {useMonthlyPayment} from "@/Composables/useMonthlyPayment.js";

    const props = defineProps({
        listing: Object,
    });

    const interestRate = ref(2.5);
    const duration = ref(25);
    const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(props.listing.price, interestRate, duration);
</script>
