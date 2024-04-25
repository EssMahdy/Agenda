document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'en',
        plugins: ['interaction', 'dayGrid'],
        editable: true,
        eventLimit: true,
        events: 'list_events.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        // View Event Record
        eventClick: function (info) {
            info.jsEvent.preventDefault();

            $('#visualizar #id').text(info.event.id);
            $('#visualizar #id').val(info.event.id);
            $('#visualizar #start').text(info.event.start.toLocaleString());
            $('#visualizar #start').val(info.event.start.toLocaleString());
            $('#visualizar #end').text(info.event.end.toLocaleString());
            $('#visualizar #end').val(info.event.end.toLocaleString());
            $('#visualizar').modal('show');
        },
        // Event Registration Function
        selectable: true,
        select: function (info) {
            $('#cadastrar #start').val(info.start.toLocaleString()); // Insert date automatically in the start field of the event
            $('#cadastrar #end').val(info.end.toLocaleString()); // Insert date automatically in the end field of the event
            $('#cadastrar').modal('show');
        }
    });

    calendar.render();
});

// Mask for date and time field
function DateTime(event, object) {
    var keypress = (window.event) ? event.keyCode : event.which;
    field = eval(object);
    if (field.value == '00/00/0000 00:00:00') {
        field.value = "";
    }

    characters = '0123456789';  
    separator1 = '/';
    separator2 = ' ';
    separator3 = ':';
    group1 = 2;
    group2 = 5;
    group3 = 10;
    group4 = 13;
    group5 = 16;
    if ((characters.search(String.fromCharCode(keypress)) != -1) && field.value.length < (19)) {
        if (field.value.length == group1)
            field.value = field.value + separator1;
        else if (field.value.length == group2)
            field.value = field.value + separator1;
        else if (field.value.length == group3)
            field.value = field.value + separator2;
        else if (field.value.length == group4)
            field.value = field.value + separator3;
        else if (field.value.length == group5)
            field.value = field.value + separator3;
    } else {
        event.returnValue = false;
    }
}

// Event registration function in the database
$(document).ready(function () {
    $("#add_event").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "add_event.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                if (response['status']) {
                    location.reload();
                } else {
                    $("#msg-cad").html(response['message']);
                }
            }
        });

    });

    // Toggle modal view
    $('.btn-canc-vis').on("click", function () {
        $('.visevent').slideToggle();
        $('.formedit').slideToggle();
    });

    $('.btn-canc-edit').on("click", function () {
        $('.formedit').slideToggle();
        $('.visevent').slideToggle();
    });

    // Edit Event
    $("#edit_event").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "edit_event.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                if (response['status']) {
                    location.reload();
                } else {
                    $("#msg-edit").html(response['message']);
                }
            }
        });
    });
});
