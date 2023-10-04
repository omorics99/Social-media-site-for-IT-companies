<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
<head>  
<div class="container">

        <h1>Calendar Page</h1>
        <!-- Calendar content goes here -->
    </div>
</head>

    <body>

    <div>
    <h2>{{ currentMonth }}</h2>
    <table>
      <thead>
        <tr>
          <th v-for="day in daysOfWeek" :key="day">{{ day }}</th>
        </tr>
      </thead>
      
      
    </table>
  </div>

    
    <h1>Add New Event</h1>

    <form action="/calendar/new" method="POST"> 
       <!-- CSRF Token for Laravel -->
        
        <label for="title">Event Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="date">Event Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="description">Event Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit">Add Event</button>
    </form>
    
</body>


</template>

<script>
export default {
   data() {
    return {
      currentDate: new Date(),
      daysOfWeek: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      events: [
        { id: 1, title: 'Event 1', date: '2023-10-01' },
        { id: 2, title: 'Event 2', date: '2023-10-02' },
        { id: 3, title: 'Event 3', date: '2023-10-03' },
        // Continue adding events for all 30 dates
      ],
    };
  },


  computed: {
    currentMonth() {
      return this.currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
    },
    weeks() {
      // Calculate the weeks and days for the current month
      // You can implement this logic based on the current date
      // to display the calendar for a specific month.
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

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: center;
}

.today {
  background-color: #f0f0f0;
}

.event {
  background-color: #ffc107;
}

.event-list {
  max-height: 100px;
  overflow-y: auto;
}
</style>