(function ($) {
    //set holiday for calendar
    window.calendar_languages['ja-JP'].holidays = holidays;

    //set display day in week
    window.calendar_languages['ja-JP'].d0 = __('monday');
    window.calendar_languages['ja-JP'].d1 = __('tuesday');
    window.calendar_languages['ja-JP'].d2 = __('wednesday');
    window.calendar_languages['ja-JP'].d3 = __('thursday');
    window.calendar_languages['ja-JP'].d4 = __('friday');
    window.calendar_languages['ja-JP'].d5 = __('saturday');
    window.calendar_languages['ja-JP'].d6 = __('sunday');

    "use strict";
    var options = {
        events_source: function () {
            return [
                {
                    "id": "293",
                    "title": "【継続】This is warning class event with very long title to check how it fits to evet in day view",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-warning",
                    "start": "1362938400000",
                    "end": "1363197686300",
                    "color": "red"
                },
                {
                    "id": "276",
                    "title": "【継続】Short day event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-success",
                    "start": "1363245600000",
                    "end": "1363252200000",
                    "color": "green"
                },
                {
                    "id": "294",
                    "title": "This is information class ",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-info",
                    "start": "1363111200000",
                    "end": "1363284086400",
                    "color": "green"
                },
                {
                    "id": "297",
                    "title": "This is success event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-success",
                    "start": "1363234500000",
                    "end": "1363284062400",
                    "color": "yellow"
                },
                {
                    "id": "297",
                    "title": "【継続】This is success event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-success",
                    "start": "1363234500000",
                    "end": "1363284062400",
                    "color": "blue"
                },
                {
                    "id": "297",
                    "title": "This is success event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-success",
                    "start": "1363234500000",
                    "end": "1363284062400",
                    "color": "blue"
                },
                {
                    "id": "297",
                    "title": "【継続】This is success event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-success",
                    "start": "1363234500000",
                    "end": "1363284062400",
                    "color": "blue"
                },
                {
                    "id": "297",
                    "title": "This is success event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-success",
                    "start": "1363234500000",
                    "end": "1363284062400",
                    "color": "blue"
                },
                {
                    "id": "54",
                    "title": "This is simple event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "",
                    "start": "1363712400000",
                    "end": "1363716086400",
                    "color": "blue"
                },
                {
                    "id": "532",
                    "title": "【継続】This is inverse event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-inverse",
                    "start": "1364407200000",
                    "end": "1364493686400",
                    "color": "red"
                },
                {
                    "id": "548",
                    "title": "This is special event",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-special",
                    "start": "1363197600000",
                    "end": "1363629686400",
                    "color": "red"
                },
                {
                    "id": "295",
                    "title": "【継続】Event 3",
                    "url": "edit-normal-regularly-task.html",
                    "class": "event-important",
                    "start": "1364320800000",
                    "end": "1364407286400",
                    "color": "red"
                }

            ];
        },
        view: 'month',
        views: {
            year: {
                slide_events: 0,
                enable: 0
            },
            month: {
                slide_events: 1,
                enable: 1
            },
            week: {
                enable: 0
            },
            day: {
                enable: 0
            }
        },

        tmpl_path: base_url + 'month_request_aprroval/',
        tmpl_cache: true,
        day: dateSearch,

        onAfterEventsLoad: function (events) {
            if (!events) {
                return;
            }
            var list = $('#eventlist');
            list.html('');

            $.each(events, function (key, val) {
                $(document.createElement('li'))
                        .html('<a href="' + val.url + '">' + moment.unix(val.start).format("hh:mm") + " : " + val.title + '</a>')
                        .appendTo(list);
            });
        },
        onAfterViewLoad: function (view) {
           // $('.page-header label').text(this.getTitle());
            $('.btn-group button').removeClass('active');
            $('button[data-calendar-view="' + view + '"]').addClass('active');
            $('.cal-before-eventlist').each(function () {
                var maxHeight = $(this).height();
                $(this).find('.cal-cell').each(function () {
                    $(this).height(maxHeight);
                    //$(this).find('.tick').css({'position':'absolute', 'bottom':'0', 'width': '100%'});
                });
            });
        },
        classes: {
            months: {
                general: 'label',
                inmonth: 'cal-day-inmonth',
                outmonth: 'cal-day-outmonth',
                saturday: 'cal-satday',
                sunday: 'cal-sunday',
                holidays: 'cal-day-holiday',
                today: 'cal-day-today'
            },
            week: {
                workday: 'cal-day-workday',
                saturday: 'cal-satday',
                sunday: 'cal-sunday',
                holidays: 'cal-day-holiday',
                today: 'cal-day-today'
            }
        },
        language: __('calendar_lang')
    };

    var calendar = $('#calendar').calendar(options);
    calendar.setLanguage('ja-JP');
    calendar.view();
    $('.btn-group button[data-calendar-nav]').each(function () {
        var $this = $(this);
        $this.click(function () {
            calendar.navigate($this.data('calendar-nav'));
        });
    });

    $('.btn-group button[data-calendar-view]').each(function () {
        var $this = $(this);
        $this.click(function () {
            calendar.view($this.data('calendar-view'));
        });
    });

    $('#first_day').change(function () {
        var value = $(this).val();
        value = value.length ? parseInt(value) : null;
        calendar.setOptions({first_day: value});
        calendar.view();
    });



}(jQuery));