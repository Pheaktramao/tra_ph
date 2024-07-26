<script setup lang="ts">
import { ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const showDropdown = ref(false)

function toggleDropdown() {
  showDropdown.value = !showDropdown.value
}

function closeDropdown() {
  showDropdown.value = false
}
</script>

<template>
  <nav
    class="flex-no-wrap relative flex w-full items-center justify-between bg-gray-500 py-2 shadow-dark-mild dark:bg-neutral-700 lg:flex-wrap lg:justify-start lg:py-4 size-25"
  >
    <div class="flex w-full flex-wrap items-center justify-between px-3">
      <!-- Logo -->
      <router-link
        to="/"
        class="flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
      >
        <img src="../assets/Pnher now LOGO.png" style="height: 50px" alt="TE Logo" loading="lazy" />
      </router-link>
      <!-- Left navigation links -->
      <div class="flex-grow">
        <div class="flex space-x-3 justify-center gap-x-3">
          <router-link
            to="/user/dashboard"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            Dashboard
          </router-link>
          <router-link
            to="/about"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            About
          </router-link>
          <router-link
            to="/history"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            HISTORY
          </router-link>
          <router-link
            to="/deliverer"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            DELIVER
          </router-link>
          <router-link
            to="/feedback"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            FEEDBACK
          </router-link>
          <router-link
            to="/history_deliverer"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            HISTORY-DELIVERER
          </router-link>
          <router-link
            to="/process"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            PROCESS
          </router-link>
          <router-link
            to="/request"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            REQUEST
          </router-link>
          <router-link
            to="/average"
            class="text-black/60 transition duration-200 hover:text-red/80 dark:text-white/60 dark:hover:text-white/80"
            active-class="text-red-500"
          >
            AVERAGE
          </router-link>
        </div>
      </div>
      <!-- Right elements -->
      <div class="flex items-center space-x-4 mx-3">
        <!-- Shopping Cart Icon -->
        <a class="text-neutral-600 dark:text-white" href="#">
          <span class="w-5 h-5">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-7 h-7"
            >
              <path
                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
              />
            </svg>
          </span>
        </a>
        <!-- Notification Bell Icon -->
        <div class="relative">
          <a class="text-neutral-600 dark:text-white" href="#">
            <span class="w-5 h-5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-7 h-7"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                  clip-rule="evenodd"
                />
              </svg>
            </span>
            <span
              class="absolute -mt-4 ms-2.5 rounded-full bg-danger px-[0.35em] py-[0.15em] text-[0.6rem] font-bold leading-none text-white"
              >1</span
            >
          </a>
        </div>
        <!-- User Avatar -->
        <div class="relative">
          <a
            class="flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
            href="#"
            @click="toggleDropdown"
            role="button"
            aria-expanded="false"
          >
            <img
              src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
              class="rounded-full h-10 w-10"
              alt=""
              loading="lazy"
            />
          </a>
          <!-- Dropdown menu -->
          <transition name="fade">
            <div
              v-if="showDropdown"
              class="absolute right-0 z-50 mt-2 w-35 rounded-lg bg-white shadow-lg dark:bg-neutral-800"
            >
              <div
                class="block w-full px-4 py-2 text-sm text-neutral-700 hover:bg-zinc-100 hover:text-red dark:text-white dark:hover:bg-neutral-700 cursor-pointer"
              >
                My profile
              </div>
              <div
                class="block w-full px-4 py-2 text-sm text-neutral-700 hover:bg-zinc-100 hover:text-red dark:text-white dark:hover:bg-neutral-700 cursor-pointer"
              >
                Log out
              </div>
            </div>
          </transition>
        </div>
      </div>
    </div>
  </nav>
</template>


<script>

</script>

<style scoped>
.text-red-500 {
  color: #ef4444;
}
</style>