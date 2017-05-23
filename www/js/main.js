function toTimeZone(time) {
    var originalFormat = 'YYYY-MM-DD hh:mm:ss';
    var dateFormat = 'MMMM D, YYYY';
	var timeFormat = 'h:mm A';
	var newTime = moment.utc(time, originalFormat).local();
	var date = newTime.format(dateFormat);
	var time = newTime.format(timeFormat);
    return date + " at " + time;
}