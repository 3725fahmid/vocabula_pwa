// Immediately Invoked Function Expression (IIFE) passing jQuery as parameter
!(function (g) {
    "use strict"; // Enable strict mode for cleaner JavaScript

    function e() {} // Constructor function

    // Define init method on the prototype
    (e.prototype.init = function () {
        var l = g("#event-modal"), // Get modal element
            t = g("#modal-title"), // Get modal title element
            a = g("#form-event"), // Get form element
            i = null, // Variable to store selected event (for edit)
            r = null, // Variable to store selected date (for add)
            s = document.getElementsByClassName("needs-validation"), // Bootstrap validation element(s)
            i = null, // Duplicate declaration of i (same as above)
            r = null, // Duplicate declaration of r (same as above)
            e = new Date(), // Get current date
            n = e.getDate(), // Get current day
            d = e.getMonth(), // Get current month
            o = e.getFullYear(); // Get current year

        // Initialize FullCalendar draggable functionality
        new FullCalendarInteraction.Draggable(
            document.getElementById("external-events"), // Element containing external events
            {
                itemSelector: ".external-event", // Select draggable items
                eventData: function (e) {
                    return {
                        title: e.innerText, // Use inner text as event title
                        className: g(e).data("class"), // Use data-class as event class
                    };
                },
            }
        );

        // Define preset events for calendar
        var c = [
                { title: "All Day Event", start: new Date(o, d, 1) },
                {
                    title: "Long Event",
                    start: new Date(o, d, n - 5),
                    end: new Date(o, d, n - 2),
                    className: "bg-warning",
                },
                {
                    id: 999,
                    title: "Repeating Event",
                    start: new Date(o, d, n - 3, 16, 0),
                    allDay: !1,
                    className: "bg-info",
                },
                {
                    id: 999,
                    title: "Repeating Event",
                    start: new Date(o, d, n + 4, 16, 0),
                    allDay: !1,
                    className: "bg-primary",
                },
                {
                    title: "Meeting",
                    start: new Date(o, d, n, 10, 30),
                    allDay: !1,
                    className: "bg-success",
                },
                {
                    title: "Lunch",
                    start: new Date(o, d, n, 12, 0),
                    end: new Date(o, d, n, 14, 0),
                    allDay: !1,
                    className: "bg-danger",
                },
                {
                    title: "Birthday Party",
                    start: new Date(o, d, n + 1, 19, 0),
                    end: new Date(o, d, n + 1, 22, 30),
                    allDay: !1,
                    className: "bg-success",
                },
                {
                    title: "Click for Google",
                    start: new Date(o, d, 28),
                    end: new Date(o, d, 29),
                    url: "http://google.com/",
                    className: "bg-dark",
                },
            ],
            v =
                (document.getElementById("external-events"), // Executes but result unused
                document.getElementById("calendar")); // Get calendar element

        // Function to show modal and prepare for adding new event
        function u(e) {
            l.modal("show"), // Show the modal
                a.removeClass("was-validated"), // Remove validation class
                a[0].reset(), // Reset form fields
                g("#event-title").val(), // Clear title input
                g("#event-category").val(), // Clear category input
                t.text("Add Event"), // Set modal title
                (r = e); // Store clicked date
        }

        // Initialize FullCalendar
        var m = new FullCalendar.Calendar(v, {
            plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid"], // Load plugins
            editable: !0, // Allow event editing
            droppable: !0, // Allow external drag-and-drop
            selectable: !0, // Allow date selection
            defaultView: "dayGridMonth", // Set default view
            themeSystem: "bootstrap", // Use Bootstrap theme
            header: {
                left: "prev,next today", // Set left header buttons
                center: "title", // Set center header (title)
                right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth", // Set right header buttons
            },
            eventClick: function (e) {
                l.modal("show"), // Show modal
                    a[0].reset(), // Reset form
                    (i = e.event), // Store selected event
                    g("#event-title").val(i.title), // Fill title input
                    g("#event-category").val(i.classNames[0]), // Fill category input
                    (r = null), // Reset date variable
                    t.text("Edit Event"), // Change modal title
                    (r = null); // Reset date variable again
            },
            dateClick: function (e) {
                u(e); // Open modal with selected date
            },
            events: c, // Load predefined events
        });

        m.render(), // Render calendar

            // Handle event form submission
            g(a).on("submit", function (e) {
                e.preventDefault(); // Prevent default form action
                g("#form-event :input"); // Select form inputs (not used)

                var t,
                    a = g("#event-title").val(), // Get event title from input
                    n = g("#event-category").val(); // Get category/class

                // Validate form
                !1 === s[0].checkValidity()
                    ? (event.preventDefault(), // Prevent form submission
                      event.stopPropagation(), // Stop event bubbling
                      s[0].classList.add("was-validated")) // Add validation style
                    : (i // If editing existing event
                          ? (i.setProp("title", a), // Update title
                            i.setProp("classNames", [n])) // Update class
                          : ((t = {
                                title: a, // New event title
                                start: r.date, // Date from click
                                allDay: r.allDay, // All-day flag
                                className: n, // Class/category
                            }),
                            m.addEvent(t)), // Add new event to calendar
                      l.modal("hide")); // Hide modal after submit
            }),

            // Handle delete event button
            g("#btn-delete-event").on("click", function (e) {
                i && (i.remove(), (i = null), l.modal("hide")); // If event selected, remove it
            }),

            // Handle "New Event" button click
            g("#btn-new-event").on("click", function (e) {
                u({ date: new Date(), allDay: !0 }); // Open modal with today's date
            });
    }),

    // Instantiate CalendarPage object
    (g.CalendarPage = new e()),

    // Set constructor reference
    (g.CalendarPage.Constructor = e);

})(window.jQuery), // Pass jQuery to the IIFE

// Auto-run calendar init when DOM is ready
(function () {
    "use strict"; // Strict mode
    window.jQuery.CalendarPage.init(); // Call init function
})();
