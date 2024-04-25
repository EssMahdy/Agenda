(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
    typeof define === 'function' && define.amd ? define(factory) :
    (global = global || self, (global.FullCalendarLocales = global.FullCalendarLocales || {}, global.FullCalendarLocales['pt-br'] = factory()));
}(this, function () { 'use strict';

    var ptBr = {
        code: "pt-br",
        buttonText: {
            prev: "Previous",
            next: "Next",
            today: "Today",
            month: "Month",
            week: "Week",
            day: "Day",
            list: "Agenda"
        },
        weekLabel: "Wk",
        allDayText: "all-day",
        eventLimitText: function (n) {
            return "more +" + n;
        },
        noEventsMessage: "No events to display"
    };

    return ptBr;

}));
