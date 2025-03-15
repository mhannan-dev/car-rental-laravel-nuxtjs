<template>
    <nav class="bg-[#EB5A3C] text-white p-4 shadow-lg">
      <div class="container mx-auto flex justify-between items-center">
        <a
          href="/"
          class="text-2xl font-extrabold tracking-wide drop-shadow-lg text-white"
        >
          Car Rental
        </a>
        <button
          data-collapse-toggle="navbar-default"
          type="button"
          class="md:hidden text-white focus:outline-none"
          @click="toggleMenu"
          aria-controls="navbar-default"
          aria-expanded="false"
        >
          ☰
        </button>
        <div
          :class="{ hidden: !menuOpen, block: menuOpen }"
          class="w-full md:block md:w-auto"
          id="navbar-default"
        >
          <ul
            class="flex flex-col md:flex-row md:space-x-6 mt-4 md:mt-0 text-white"
          >
            <li><a href="/cars" class="nav-link">Cars</a></li>
            <li><a href="/deals" class="nav-link">Deals</a></li>
            <li><a href="/locations" class="nav-link">Locations</a></li>
            <li><a href="/about" class="nav-link">About Us</a></li>
            <li><a href="/contact" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
</template>

<script>

import "flowbite";
export default {
  data() {
    return {
      menuOpen: false,
    };
  },
  methods: {
    toggleMenu() {
      this.menuOpen = !this.menuOpen;
    },
  },
};
</script>

<style>
nav {
  background-color: #eb5a3c;
}

.nav-link {
  font-weight: bold;
  font-size: 1.1rem;
  padding: 8px 12px;
  transition: all 0.3s ease;
  color: white;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.nav-link:hover {
  color: #333333;
  background-color: #e0e0e0;
  border-radius: 5px;
}
</style>
