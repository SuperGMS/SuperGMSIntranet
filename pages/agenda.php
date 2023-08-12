<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>

<script>
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        eventSources: [{
            url: "<?php echo $site; ?>/includes/json-calendar.php",
            method: 'GET',
            failure: function() {
                alert('There was an error fetching the events!');
            },
            color: 'crimson', // Optionally, set a color for the events from this source
        }]
    });

    calendar.render();
</script>

<div class="padding">
    <div class="row m-b">
        <div id="calendar"></div>
    </div>
</div>