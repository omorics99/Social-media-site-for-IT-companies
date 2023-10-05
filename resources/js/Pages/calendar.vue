<template>
 <div class="container m-5"> 
  <div class="p-4">
    <div class="col-auto mt-3">
      <h2 class="text-2xl mb-4">{{ currentMonth }}</h2>
      <!-- Add Month and Year Selects -->
      <div class="mb-4">
        <label for="selectMonth" class="block">Select Month:</label>
        <select id="selectMonth" v-model="selectedMonth" @change="updateCalendar">
          <option v-for="(month, index) in months" :key="index" :value="index">{{ month }}</option>
        </select>
      </div>
      <div class="mb-4">
        <label for="selectYear" class="block">Select Year:</label>
        <select id="selectYear" v-model="selectedYear" @change="updateCalendar">
          <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
        </select>
      </div>
      <div class="col-auto mt-3">      
        <h2 class="text-2xl mb-4">{{ currentMonth }}</h2>
        <table class="w-full border-collapse">
          <thead>
            <tr>
              <th v-for="day in daysOfWeek" class="border p-2">{{ day }}</th>
            </tr>
          </thead>
            <tbody>
            <tr v-for="week in weeks" :key="week">
              <td v-for="day in week" :key="day.date" class="border p-2">
                <span @click="openEventPopup(day.date)">
                  {{ day.date }}
                  <div v-if="hasEvent(day.date)">
                    <!-- Display events for this day -->
                    <ul class="event-list">
                      <li
                        v-for="event in eventsOnDate(day.date)"
                        :key="event.id"
                        class="bg-blue-500 p-1 m-1"
                      >
                        {{ event.title }}
                        <button @click="openEventPopup(event)">View Details</button>
                      </li>
                    </ul>
                  </div>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="mt-4">
      <h1 class="text-xl mb-2">Add New Event</h1>
      <form action="/company/create/event" method="POST" class="mb-4">
        <div class="mb-4">
          <label for="title" class="block">Event Title:</label>
          <input type="text" class="w-full border p-2" id="title" name="title" required>
        </div>
        <div class="mb-4">
          <label for="date" class="block">Event Date:</label>
          <input type="date" id="date" name="date" required class="w-full border p-2">
        </div>
        <div class="mb-4">
          <label for="description" class="block">Event Description:</label>
          <textarea
            id="description"
            class="w-full border p-2"
            name="description"
            rows="4"
            required
          ></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2">Add Event</button>
      </form>
    </div>

    <h1 class="text-xl">Add New Post</h1>
    <form action="/company/create/post" method="POST">
      <div class="mb-4">
        <label for="title" class="block">Post Title:</label>
        <input type="text" id="title" name="title" required class="w-full border p-2">
      </div>
      <div class="mb-4">
        <label for="description" class="block">Post Description:</label>
        <textarea id="description" name="description" rows="4" required class="w-full border p-2"></textarea>
      </div>
      <button type="submit" class="bg-blue-500 text-white p-2">Add Post</button>
    </form>
  
  </div>
</template>

<script>
import EventPopup from '/resources/js/Components/EventPopup.vue';

export default {
  components: {
    EventPopup,
  },
  data() {
    return {
      selectedDay: null,
      currentDate: new Date(),
      selectedMonth: new Date().getMonth(),
      selectedYear: new Date().getFullYear(),
      daysOfWeek: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      events: [
        { id: 1, title: 'Event 1', date: '2023-10-07', description: 'Description for Event 1 Description for Event 1Description for Event 1Description for Event 1Description for Event 1Description for Event 1Description for Event 1Description for Event 1' },
        { id: 2, title: 'Event 2', date: '2023-10-08', description: 'Description for Event 2' },
        { id: 3, title: 'Event 3', date: '2023-10-09', description: 'Description for Event 3' },
      ],
      isEventPopupVisible: false,
      selectedEvent: null,
    };
  },
  computed: {
    currentMonth() {
      return this.currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
    },
    months() {
      return [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
      ];
    },
    weeks() {
      const year = this.currentDate.getFullYear();
      const month = this.currentDate.getMonth();
      const firstDayOfMonth = new Date(year, month, 1);
      const lastDayOfMonth = new Date(year, month + 1, 0);
      const startDate = new Date(firstDayOfMonth);
      const endDate = new Date(lastDayOfMonth);
      const weeks = [];

      while (startDate <= endDate) {
        const week = [];
        for (let i = 0; i < 7; i++) {
          const dateStr = startDate.toISOString().split('T')[0];
          const isCurrentMonth = startDate >= firstDayOfMonth && startDate <= lastDayOfMonth;
          const isSelected = dateStr === this.selectedDay;

          week.push({
            date: dateStr,
            isCurrentMonth,
            isSelected,
          });

          startDate.setDate(startDate.getDate() + 1);
        }
        weeks.push(week);
      }

      return weeks;
    },
    years() {
      const currentYear = new Date().getFullYear();
      return [currentYear, currentYear + 1];
    },
  },
  methods: {
    selectDay(date) {
      this.selectedDay = date;
    },
    openEventPopup(event) {
      this.selectedEvent = event;
      this.isEventPopupVisible = true;
    },
    closeEventPopup() {
      this.isEventPopupVisible = false;
      this.selectedEvent = null;
    },
    isToday(date) {
      const today = new Date();
      return date === today.toISOString().split('T')[0];
    },
    hasEvent(date) {
      return this.events.some((event) => event.date === date);
    },
    eventsOnDate(date) {
      return this.events.filter((event) => event.date === date);
    },
    updateCalendar() {
      const newDate = new Date(this.selectedYear, this.selectedMonth, 1);
      this.currentDate = newDate;
    },
  },
};
</script>