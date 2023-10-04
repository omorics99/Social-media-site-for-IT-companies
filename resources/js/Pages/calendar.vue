<template>
  <div class="p-4">
    <div class="col-auto mt-3">
      <div>
        <h2 class="text-2xl mb-4">{{ currentMonth }}</h2>
        <table class="w-full border-collapse">
          <thead>
            <tr>
              <th v-for="day in daysOfWeek" class="border p-2">{{ day }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="week in weeks" :key="week">
              <td v-for="day in week" :key="day" class="border p-2">
                {{ day }}
                <div v-if="hasEvent(day)">
                  <!-- Display events for this day -->
                  <ul class="event-list">
                    <li
                      v-for="event in eventsOnDate(day)"
                      :key="event.id"
                      class="bg-yellow-400 p-1 m-1"
                    >
                      {{ event.title }}
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
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
export default {
  data() {
    return {
      currentDate: new Date(),
      daysOfWeek: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      events: [
        { id: 1, title: 'Event 1', date: '2023-10-07' },
        { id: 2, title: 'Event 2', date: '2023-10-08' },
        { id: 3, title: 'Event 3', date: '2023-10-09' },
      ],
    };
  },
  computed: {
    currentMonth() {
      return this.currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
    },
    weeks() {
      // Calculate the weeks and days for the current month
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
          if (startDate >= firstDayOfMonth && startDate <= lastDayOfMonth) {
            week.push(startDate.toISOString().split('T')[0]);
          } else {
            week.push('');
          }
          startDate.setDate(startDate.getDate() + 1);
        }
        weeks.push(week);
      }

      return weeks;
    },
  },
  methods: {
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
  },
};
</script>