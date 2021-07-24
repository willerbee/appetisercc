<template>
    <div class="container mx-auto">
        <div class="calendar-create">
            <header>
                <h2>Calendar</h2>
            </header>
            <div class="calendar-panels">
                <calendar-event-details @saveCalendarEvent="saveCalendarEvent" />
                <calendar-view :calendarEvent="calendarEvent" />
            </div>
        </div>
    </div>
</template>

<script>
import CalendarEventDetails from "./calendarEventDetails.vue";
import CalendarView from "./calendarView.vue";

export default {
    components: {
        CalendarEventDetails,
        CalendarView
    },
    data: function() {
        return {
            calendarEvent: {
                name: '',
                from: null,
                to: null,
                days: ''
            }
        }
    },
    methods: {
        setCalendarEvent(data) {
            let calendarEvent = this.calendarEvent;
            for (let prop in calendarEvent)
                calendarEvent[prop] = data[prop];
        },
        saveCalendarEvent(data) {
            axios.post('/api/calendar-event', data)
                .then(response => {
                    this.$toastr.s('Successfully saved!');
                    this.setCalendarEvent(data);
                })
                .catch(error => {
                    this.$toastr.e('Error saving! Please try again later.');
                    console.log({ error });
                });
        },
    },
}
</script>

<style scoped>
.calendar-create {
    @apply m-4 p-4 bg-gray-50 shadow-xl rounded-xl
}

header {
    @apply mb-4
}

header h2 {
    @apply text-xl font-bold
}

.calendar-panels {
    @apply grid grid-cols-1 md:grid-cols-2
}
</style>
