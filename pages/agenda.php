<h1>Agenda</h1>
<br />
<div style="padding:2.5%;background:yellow;border-radius:15px;">
<div id="calendar"></div>
</div>

<script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.ie11.min.js"></script>
<link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />

<script>/* in the browser environment namespace */
const Calendar = tui.Calendar;
const container = document.getElementById('calendar');
const options = {
  defaultView: 'Week',
  timezone: {
    zones: [
      {
        timezoneName: 'Europe/Amsterdam',
        displayLabel: 'Netherlands',
      },
    ],
  },
  calendars: [
    {
      id: '1',
      name: 'Work',
      backgroundColor: '#00a9ff',
    },
  ],
};

const calendar = new Calendar('#calendar', {
  usageStatistics: false
});

calendar.createEvents([
  {
    id: '1',
    calendarId: '1',
    title: 'Weekly meeting',
    start: '2023-10-24',
    end: '2023-10-24',
    isAllday: true,
  },
  {
    id: 'event2',
    calendarId: 'cal1',
    title: 'Lunch appointment',
    start: '2022-06-08T12:00:00',
    end: '2022-06-08T13:00:00',
  },
  {
    id: 'event3',
    calendarId: 'cal2',
    title: 'Vacation',
    start: '2022-06-08',
    end: '2022-06-10',
    isAllday: true,
    category: 'allday',
  },
]);
</script>