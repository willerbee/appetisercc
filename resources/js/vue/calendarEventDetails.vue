<template>
    <div class="event-details-container">
        <div class="event-details">
            <div class="name">
                <label>Event Name</label>
                <input type="text" v-model="name" required>
            </div>
    
            <div class="from">
                <label>From</label>
                <datepicker v-model="from" :format="shortDateFormat" required></datepicker>
            </div>
            <div class="to">
                <label>To</label>
                <datepicker v-model="to" :format="shortDateFormat" required></datepicker>
            </div>
    
            <div class="days-selector">
                <label><input type="checkbox" v-model="days[1]">Monday</label>
                <label><input type="checkbox" v-model="days[2]">Tuesday</label>
                <label><input type="checkbox" v-model="days[3]">Wednesday</label>
                <label><input type="checkbox" v-model="days[4]">Thursday</label>
                <label><input type="checkbox" v-model="days[5]">Friday</label>
                <label><input type="checkbox" v-model="days[6]">Saturday</label>
                <label><input type="checkbox" v-model="days[0]">Sunday</label>
            </div>
        </div>
        <input type="button" value="Save" class="px-5 py-2 bg-blue-400 my-2 text-white rounded-lg" @click="emitSaveCalendarEvent">
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import helperMixin from '../helper-mixin';

export default {
    mixins: [helperMixin],
    props: ['calendarEvent'],
    components: { Datepicker },
    data: function() {
        return {
            name: '',
            from: null,
            to: null,
            days: [false, false, false, false, false, false, false],
        }
    },
    methods: {
        convertDaysToInitials() {
            let daysInitials = 'UMTWRFS'.split('');
            this.days.forEach((checked, index) => checked ? true : daysInitials[index] = '');
            return daysInitials.join('');
        },
        emitSaveCalendarEvent() {
            this.$emit('saveCalendarEvent', {
                name: this.name,
                from: this.formatDate(this.from),
                to: this.formatDate(this.to),
                days: this.convertDaysToInitials()
            })
        }
    }
}
</script>

<style scoped>
input[type='text'],
.vdp-datepicker input[type='text'] {
    display: block;
    @apply border-gray-200 rounded-md border p-1
}

.event-details {
    @apply grid grid-cols-1 gap-1 sm:grid-cols-2
}

.name,
.days-selector {
    @apply col-span-1 sm:col-span-2
}
</style>