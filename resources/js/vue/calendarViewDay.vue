<template>
    <div class="day-container bg-white" :class="{ 'bg-green-100': description }">
        <span class="date">{{ date }}</span> <span class="day">{{ shortDayOfWeek }}</span> <span class="description">{{ description }}</span>
    </div>
</template>

<script>
export default {
    props: ['date', 'shortDayOfWeek', 'description']
}
</script>

<style scoped>
.day-container {
    @apply p-2 border border-gray-300 rounded my-1 w-full
}

.date {
    @apply font-bold text-xl
}

.description {
    @apply font-bold p-2
}
</style>
