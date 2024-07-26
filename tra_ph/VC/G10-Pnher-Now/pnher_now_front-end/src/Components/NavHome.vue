<template>
<nav class="fixed top-0 left-0 w-full bg-gradient-to-l from-orange-400 to-red-500 shadow-lg z-5 flex  justify-between  items-center py-2 ">
  <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex items-center h-25">
      <!-- Logo Section -->
      <div class="flex items-center">
        <img
          src="../assets/Pnher now LOGO.png"
          style="height: 70px"
          alt="TE Logo"
          loading="lazy"
        />
      </div>
    </div>
  </div>
  <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
        <button type="button" class="btn btn-outline-warning">
          <a href="/login" class="text-gray-800 hover:text-black-600">Login</a> /
          <a href="/register" class="text-gray-800 hover:text-black-600">Sign Up</a>
        </button>
      </div>
</nav>

</template>
<script lang="ts">
export default {
  name: 'NavHome'
}
</script>
<style scoped>
.text-red-500 {
  color: #ef4444;
}
</style>
