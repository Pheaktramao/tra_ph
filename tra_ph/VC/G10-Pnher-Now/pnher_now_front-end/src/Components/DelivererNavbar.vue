<script setup lang="ts">
import { ref, computed, watchEffect } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const showDropdown = ref(false)
const route = useRoute()
const router = useRouter()
const index = ref<string>('1')

function toggleDropdown() {
  showDropdown.value = !showDropdown.value
}

function closeDropdown() {
  showDropdown.value = false
}

function logOut() {
  localStorage.removeItem('access_token')
  router.push('/login')
}

const tabs = [
  {id: 1, name: 'Dashboard', path: '/deliverer_dashboard' },
  {id: 2, name: 'Feedback', path: '/feedback' },
  {id: 3, name: 'History', path: '/history_deliverer' },
  {id: 4, name: 'Deliverer', path: '/deliverer' },
]

const activeTab = computed(() => {
  return tabs.findIndex(tab => route.path.includes(tab.path))
})

watchEffect(() => {
  if (activeTab.value === -1) {
    router.push(tabs[0].path)
  }
})
</script>

<template>
  <nav class="flex-no-wrap bg-gradient-to-l from-orange-400 to-red-500 relative flex w-full items-center justify-between shadow-lg lg:flex-wrap lg:justify-start lg:py-4">
    <div class="flex w-full items-center justify-between px-4 py-1">
      <!-- Logo -->
      <div class="flex">
        <router-link to="/" class="flex items-center text-white hover:text-gray-300 focus:text-gray-300 lg:mb-0 lg:mt-0">
          <img src="../assets/Phner now LOGO.png" style="height: 80px" alt="TE Logo" loading="lazy" />
        </router-link>
      </div>
      <div class="flex-6 p-4 flex items-center justify-center w-50% h-60px">
        <!-- Tab Navigation -->
        <div class="tab-container">
          <input type="radio" name="tab" id="tab1" class="tab tab--1" :checked="activeTab === 0" />
          <router-link class="tab_label" to="/deliverer_dashboard">Dashboard</router-link>
          
          <input type="radio" name="tab" id="tab2" class="tab tab--2" :checked="activeTab === 1" />
          <router-link class="tab_label" to="/feedback">Feedback</router-link>
          
          <input type="radio" name="tab" id="tab3" class="tab tab--3" :checked="activeTab === 2" />
          <router-link class="tab_label" to="/history_deliverer">History</router-link>

          <input type="radio" name="tab" id="tab4" class="tab tab--4" :checked="activeTab === 3" />
          <router-link class="tab_label" to="/deliverer">Deliverer</router-link>
          
          <div class="indicator" :style="{ left: `${10 + activeTab * 150}px` }"></div>
        </div>
      </div>
      <!-- Right elements -->
      <div class="flex items-center space-x-4">
        <!-- Shopping Cart Icon -->
        <a class="text-white hover:text-gray-300" href="#">
          <span class="w-5 h-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
              <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
            </svg>
          </span>
        </a>
        <!-- Notification Bell Icon -->
        <div class="relative">
          <a class="text-white hover:text-gray-300" href="#">
            <span class="w-5 h-5">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
              </svg>
            </span>
            <span class="absolute -mt-8 ms-3.5 rounded-full bg-danger px-[0.35em] py-[0.15em] text-[0.6rem] font-bold leading-none text-white">1</span>
          </a>
        </div>
        <!-- User Avatar -->
        <div class="relative">
          <a class="flex items-center whitespace-nowrap transition duration-150 ease-in-out" href="#" @click="toggleDropdown" role="button" aria-expanded="false">
            <img src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg" class="rounded-full h-12 w-12 border-2 border-white shadow-lg" alt="" loading="lazy" />
          </a>
          <!-- Dropdown menu -->
          <transition name="fade">
            <div v-if="showDropdown" class="absolute right-0 z-50 mt-2 w-35 rounded-lg bg-white shadow-lg dark:bg-neutral-800">
              <div class="block w-full px-4 py-2 text-sm text-neutral-700 hover:bg-zinc-100 hover:text-red dark:text-white dark:hover:bg-neutral-700 cursor-pointer">
                My profile
              </div>
              <div class="block w-full px-4 py-2 text-sm text-neutral-700 hover:bg-zinc-100 hover:text-red dark:text-white dark:hover:bg-neutral-700 cursor-pointer" @click="logOut">
                Log out
              </div>
            </div>
          </transition>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
  nav {
    padding: 0 20px;
    position: sticky;
    top: 0;
    z-index: 50;
 }
  .tab-container {
    position: relative;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    padding: 10px;
    color: white;
    border-radius: 9px;
    height: 60px;
  }
  
  .indicator {
    content: "";
    width: 150px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    position: absolute;
    top: 10px;
    z-index: 9;
    border: 1px solid rgba(255, 255, 255, 0.4);
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.12), 0px 3px 1px rgba(0, 0, 0, 0.04);
    border-radius: 7px;
    transition: all 0.2s ease-out;
  }
  
  .tab {
    width: 150px;
    height: 40px;
    position: absolute;
    z-index: 99;
    outline: none;
    opacity: 0;
  }
  
  .tab_label {
    width: 150px;
    height: 40px;
    position: relative;
    z-index: 999;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 0;
    font-size: 1rem;
    opacity: 0.8;
    cursor: pointer;
    text-decoration: none;
    color: inherit;
  }
  input {
    color: white;
  }
  a:hover {
    color: #f1f1f1;
  }
</style>
