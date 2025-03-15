<template>
  <section class="hero-section">
    <div class="overlay"></div>
    <div class="content">
      <h1>Find Your Perfect Ride</h1>
      <p>Book a car for your next journey in just a few clicks.</p>

      <!-- Search Bar -->
      <div
        class="search-bar grid grid-cols-1 md:grid-cols-2 gap-4 p-4 rounded-lg shadow-lg"
      >
        <div>
          <label for="pickup-location" class="text-white font-semibold"
            >Pick-up Location</label
          >
          <select id="pickup-location" class="w-full p-2 border rounded">
            <option value="">Select Pick-up Location</option>
            <option value="NYC">New York</option>
            <option value="LA">Los Angeles</option>
            <option value="CHI">Chicago</option>
          </select>
        </div>
        <div>
          <label for="pickup-date" class="text-white font-semibold"
            >Pick-up Date & Time</label
          >
          <input
            id="pickup-date"
            type="datetime-local"
            class="w-full p-2 border rounded"
          />
        </div>
        <div>
          <label for="dropoff-location" class="text-white font-semibold"
            >Drop-off Location</label
          >
          <select id="dropoff-location" class="w-full p-2 border rounded">
            <option value="">Select Drop-off Location</option>
            <option value="NYC">New York</option>
            <option value="LA">Los Angeles</option>
            <option value="CHI">Chicago</option>
          </select>
        </div>
        <div>
          <label for="dropoff-date" class="text-white font-semibold"
            >Drop-off Date & Time</label
          >
          <input
            id="dropoff-date"
            type="datetime-local"
            class="w-full p-2 border rounded"
          />
        </div>
        <button
          class="col-span-full bg-[#EB5A3C] hover:bg-[#D9472B] text-white font-bold py-2 px-4 rounded-lg w-full"
        >
          Search
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import "flowbite";
export default {};
</script>

<style>
.hero-section {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
  height: 500px;
  background-image: url("~/assets/images/hero-bg.webp");
}

.hero-section .overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
}

.hero-section .content {
  position: relative;
  z-index: 10;
  text-align: center;
  padding: 0 20px;
  color: white;
}

.hero-section h1 {
  font-size: 3rem;
  font-weight: 800;
  margin-bottom: 10px;
}

.hero-section p {
  font-size: 1.25rem;
  margin-bottom: 20px;
  opacity: 0.9;
}

.hero-section .search-bar {
  background-color: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  padding: 1rem;
  border-radius: 10px;
  display: grid;
  gap: 1rem;
  max-width: 800px;
  margin: 0 auto;
}
.hero-section .search-bar select {
  padding: 12px;
  font-size: 1rem;
  border: 2px solid #eb5a3c;
  border-radius: 8px;
  outline: none;
  width: 100%;
  box-sizing: border-box;
  background: white;
  color: #333;
  appearance: none;
  cursor: pointer;
  font-weight: 500;
  transition: all 0.3s ease;
}

.hero-section .search-bar select:focus {
  border-color: #d9472b;
  box-shadow: 0 0 8px rgba(235, 90, 60, 0.5);
}

.hero-section .search-bar select:hover {
  background-color: #f8f8f8;
}

.hero-section .search-bar input {
  padding: 12px;
  font-size: 1rem;
  border: 2px solid #eb5a3c;
  border-radius: 8px;
  outline: none;
  width: 100%;
  box-sizing: border-box;
  background: white;
  color: #333;
  font-weight: 500;
}

.hero-section .search-bar input:focus {
  border-color: #d9472b;
  box-shadow: 0 0 8px rgba(235, 90, 60, 0.5);
}

.hero-section .search-bar button {
  padding: 12px;
  font-size: 1rem;
  font-weight: bold;
  border-radius: 8px;
  background-color: #eb5a3c;
  border: 2px solid #eb5a3c;
  color: white;
  cursor: pointer;
  transition: all 0.3s ease;
}

.hero-section .search-bar button:hover {
  background-color: #d9472b;
  border-color: #d9472b;
  box-shadow: 0 0 8px rgba(217, 71, 43, 0.5);
}

@media (min-width: 768px) {
  .hero-section h1 {
    font-size: 4rem;
  }

  .hero-section p {
    font-size: 1.5rem;
  }

  .hero-section .search-bar {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>
