<template>
    <div v-if="isVisible" class="event-popup">
      <div class="event-popup-content">
        <h2>{{ selectedEvent.title }}</h2>
        <p>Date: {{ selectedEvent.date }}</p>
        <p>Description: {{ selectedEvent.description }}</p>
        <button @click="closePopup">Close</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      isVisible: Boolean, 
      selectedEvent: Object, 
    },
    methods: {
      closePopup() {
        
        this.$emit('close');
      },
    },
  };
  </script>
  
<style scoped>
.event-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
.event-popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }
</style>