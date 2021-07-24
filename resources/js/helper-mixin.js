export default {
    data: function () {
        return {
            shortDateFormat: 'yyyy-MM-dd',
            shortDayOfWeekFormat: 'ccc'
        }
    },
    methods: {
        formatDate(date = new Date(), format = this.shortDateFormat) {
            return this.$luxon((new Date(date.getFullYear(), date.getMonth(), date.getDate())).toISOString(), format)
        },
        zeroTimeInDate(date) {
            return new Date(date.toDateString())
        },
        getNextDate(date) {
            return new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1)
        },

    }
}