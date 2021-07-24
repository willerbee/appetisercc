<template>
    <div class="month-container">
        <h3 class="title">{{ monthData.title }}</h3>
        <calendar-view-day v-for="day in monthData.days" :key="day.key" :date="day.date" :shortDayOfWeek="day.shortDayOfWeek" :description="day.description" />
    </div>
</template>

<script>
import CalendarViewDay from './calendarViewDay.vue'


export default {
    props: ['monthData'],
    components: {
        CalendarViewDay
    },
    methods: {},
    computed: {}
}
</script>

<style scoped>
.title {
    @apply text-4xl mb-4
}

.month-container {
    @apply w-full p-3 mb-4
}
</style>
