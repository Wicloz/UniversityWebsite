function initDatetime () {
  var datetime = document.createElement("input");
  datetime.setAttribute("type", "datetime");
  var datetimelocal = document.createElement("input");
  datetimelocal.setAttribute("type", "datetime-local");

  if (datetime.type === "text" && datetimelocal.type === "text") {
    $(function () {
      $('.datetime').datetimepicker({
        widgetPositioning: {
          horizontal: 'auto',
          vertical: 'bottom'
        },
        sideBySide: true,
        format: 'DD-MM-YYYY, HH:mm'
      });
    });
    $(function () {
      $('.datetimesql').datetimepicker({
        widgetPositioning: {
          horizontal: 'auto',
          vertical: 'bottom'
        },
        sideBySide: true,
        format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
  }

  datetime.parent().removeChild(datetime);
  delete(datetime);
  datetimelocal.parent().removeChild(datetimelocal);
  delete(datetimelocal);

  var date = document.createElement("input");
  date.setAttribute("type", "date");

  if (date.type === "text") {
    $(function () {
      $('.date').datetimepicker({
        widgetPositioning: {
          horizontal: 'auto',
          vertical: 'bottom'
        },
        format: 'DD-MM-YYYY'
      });
    });
    $(function () {
      $('.datesql').datetimepicker({
        widgetPositioning: {
          horizontal: 'auto',
          vertical: 'bottom'
        },
        format: 'YYYY-MM-DD'
      });
    });
  }

  date.parent().removeChild(date);
  delete(date);

  var time = document.createElement("input");
  time.setAttribute("type", "time");

  if (time.type === "text") {
    $(function () {
      $('.time').datetimepicker({
        widgetPositioning: {
          horizontal: 'auto',
          vertical: 'bottom'
        },
        format: 'HH:mm:ss'
      });
    });
    $(function () {
      $('.duration').datetimepicker({
        widgetPositioning: {
          horizontal: 'auto',
          vertical: 'bottom'
        },
        defaultDate: 0,
        format: 'HH:mm:ss'
      });
    });
  }

  time.parent().removeChild(time);
  delete(time);
}
