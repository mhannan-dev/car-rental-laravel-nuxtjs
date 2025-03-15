<template>
    <section class="bg-[#fbf5f4] p-5">
      <div class="container mx-auto">
        <!-- Create a flex container with wrapping for multiple rows -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 justify-center">
        <!-- Loop through each car in the array -->
        <div
          v-for="(car, index) in cars"
          :key="car.id"
          class="car-card bg-white shadow-lg rounded-lg overflow-hidden"
        >
          <div class="car-item bg-[#E7D283] p-4 flex flex-col lg:flex-row">
            <!-- Car Photo -->
            <div class="car-photo w-full lg:w-1/2 pr-4 mb-4 lg:mb-0">
              <img :src="carImage" alt="Car Image" class="car-image" />
            </div>
      
            <!-- Car Info -->
            <div class="car-info w-full lg:w-1/2">
              <h3 class="text-xl font-bold text-gray-800">{{ car.name }}</h3>
              <p class="text-gray-500">{{ car.type }}</p>
              <div class="flex justify-between items-center mt-3">
                <span class="text-lg font-bold text-[#EB5A3C]">${{ car.price }}/day</span>
              </div>
              <button
                class="bg-[#EB5A3C] hover:bg-[#DF9755] text-white font-bold py-2 px-4 rounded-lg mt-4"
              >
                Book Now
              </button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </template>
    
  <script>
  import carImage from "../assets/images/car.jpg";
  
  export default {
    data() {
      return {
        cars: [
          {
            id: 1,
            name: "Tesla Model S",
            type: "Electric",
            price: 199,
          },
          {
            id: 2,
            name: "BMW M5",
            type: "Sedan",
            price: 150,
          },
          {
            id: 3,
            name: "Audi A6",
            type: "Luxury",
            price: 180,
          },
          {
            id: 4,
            name: "Mercedes-Benz S-Class",
            type: "Luxury",
            price: 250,
          },
        ],
        carImage,
      };
    },
  };
  </script>
  
  <style scoped>
  .car-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .car-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
  }
  
  .car-image {
    width: 100%;
    height: auto;
    object-fit: cover;
    object-position: center;
  }
  
  .car-photo {
    max-width: 100%;
  }
  
  .car-info {
    padding-left: 20px;
  }
  
  .car-item {
    background-color: #E7D283;
  }
  
  /* Responsive improvements */
  @media (max-width: 640px) {
    .car-info {
      padding-left: 0;
      text-align: center;
    }
    .car-photo {
      max-width: 100%;
    }
  }
  </style>
  