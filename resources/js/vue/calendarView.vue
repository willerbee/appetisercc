<template>
    <div class="months-container">
        <calendar-view-month v-for="month in months" :key="month.key" :monthData="month" />
    </div>
</template>

<script>
import CalendarViewMonth from "./calendarViewMonth.vue";
import helperMixin from "../helper-mixin";

export default {
    mixins: [helperMixin],
    props: ['calendarEvent'],
    components: {
        CalendarViewMonth
    },
    methods: {
        createMonthData(date) {
            return {
                key: this.formatDate(date),
                title: this.formatDate(date, 'MMMM yyyy'),
                days: []
            }
        },
        isWeekdayBooked(day) {
            return this.cleanedCalendarEvent.simpleWeekdayBookingStatus[day];
        },
        getDayDescription(date, startDate, endDate) {
            return this.isWeekdayBooked(date.getDay()) && (startDate <= date) && (date <= endDate) ? this.cleanedCalendarEvent.name : ''
        },
        getDayData(date) {
            window.fd = this.formatDate;
            return {
                key: this.formatDate(date),
                date: date.getDate(),
                shortDayOfWeek: this.formatDate(date, this.shortDayOfWeekFormat),
                description: this.getDayDescription(date, this.cleanedCalendarEvent.from, this.cleanedCalendarEvent.to)
            }
        },
        getMonthData(year, month) {
            let monthData = this.createMonthData(new Date(year, month, 1)),
                indexDate = new Date(year, month, 1);
            while (indexDate.getMonth() == month) {
                monthData.days.push(this.getDayData(indexDate));
                indexDate = this.getNextDate(indexDate);
            }
            return monthData;
        },
        computeViewData() {
            let monthsData = [],
                startDate = this.cleanedCalendarEvent.from,
                endDate = this.cleanedCalendarEvent.to;

            for (let year = startDate.getFullYear(); year <= endDate.getFullYear(); year++) {
                for (let month = startDate.getMonth(); month <= endDate.getMonth(); month++) {
                    monthsData.push(this.getMonthData(year, month));
                }
            }

            return monthsData;
        }
    },
    computed: {
        months() {
            return this.computeViewData()
        },
        cleanedCalendarEvent() {
            let cleanedData = Object.assign({}, this.calendarEvent);
            cleanedData.from = this.zeroTimeInDate(cleanedData.from ? new Date(cleanedData.from) : new Date());
            cleanedData.to = this.zeroTimeInDate(cleanedData.to ? new Date(cleanedData.to) : new Date());
            cleanedData.simpleWeekdayBookingStatus = this.simpleWeekdayBookingStatus;
            return cleanedData;
        },
        simpleWeekdayBookingStatus() {
            return 'UMTWRFS'.split('').map((dayChar, index) => this.calendarEvent.days.indexOf(dayChar) >= 0);
        }
    },

}
</script>

<style scoped>
.months-container {
    @apply overflow-y-scroll max-h-screen h-screen
}
</style>